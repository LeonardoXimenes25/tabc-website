<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FinancialReportResource\Pages;
use App\Models\FinancialReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;


class FinancialReportResource extends Resource
{
    protected static ?string $model = FinancialReport::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Relatoriu Orsamentu';
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Relatoriu Orsamentu';
    protected static ?string $pluralModelLabel = 'Relatoriu Orsamentu';
    protected static ?string $navigationLabel = 'Relatoriu Orsamentu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('month')
                    ->options([
                        'January' => 'January',
                        'February' => 'February',
                        'March' => 'March',
                        'April' => 'April',
                        'May' => 'May',
                        'June' => 'June',
                        'July' => 'July',
                        'August' => 'August',
                        'September' => 'September',
                        'October' => 'October',
                        'November' => 'November',
                        'December' => 'December',
                    ])
                    ->required()
                    ->label('Fulan'),

                Forms\Components\TextInput::make('year')
                    ->numeric()
                    ->required()
                    ->label('Tinan'),

                Forms\Components\TextInput::make('total_income')
                    ->numeric()
                    ->disabled() // biasanya di-calc otomatis
                    ->label('Total osan sai'),

                Forms\Components\TextInput::make('total_expense')
                    ->numeric()
                    ->disabled()
                    ->label('Total osan sai'),

                Forms\Components\TextInput::make('final_balance')
                    ->numeric()
                    ->disabled()
                    ->label('Total Balansu'),

                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'submitted' => 'Submitted',
                        'approved' => 'Approved',
                    ])
                    ->disabled(), // status tidak bisa diedit manual lewat form

                Forms\Components\Select::make('author_id')
                    ->relationship('author', 'name')
                    ->disabled()
                    ->label('Kria husi'),

                Forms\Components\Select::make('approved_by')
                    ->relationship('approver', 'name')
                    ->disabled()
                    ->label('Aprova husi'),

                Forms\Components\DateTimePicker::make('approved_at')
                    ->disabled()
                    ->label('Data Aprova'),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('month')->label('Month'),
            Tables\Columns\TextColumn::make('year')->label('Year'),
            Tables\Columns\TextColumn::make('total_income')->money('usd')->label('Osan tama'),
            Tables\Columns\TextColumn::make('total_expense')->money('usd')->label('Osan sai'),
            Tables\Columns\TextColumn::make('final_balance')->money('usd')->label('Balansu'),
            Tables\Columns\BadgeColumn::make('status')->colors([
                'gray' => 'draft',
                'warning' => 'submitted',
                'success' => 'approved',
            ]),
            Tables\Columns\TextColumn::make('author.name')->label('Kria husi'),
            Tables\Columns\TextColumn::make('approved_at')->dateTime()->label('Aprova husi'),
        ])
        ->emptyStateHeading('Dadus mamuk')
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'draft' => 'Draft',
                    'submitted' => 'Submitted',
                    'approved' => 'Approved',
                ]),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\Action::make('submit')
                ->label('Ajukan ke Ketua Majelis')
                ->icon('heroicon-o-paper-airplane')
                ->color('warning')
                ->visible(fn (FinancialReport $record) => $record->status === 'draft')
                ->requiresConfirmation()
                ->action(fn (FinancialReport $record) => $record->update(['status' => 'submitted'])),

            Tables\Actions\Action::make('approve')
                ->label('Setujui Laporan')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->visible(fn (FinancialReport $record) => $record->status === 'submitted')
                ->requiresConfirmation()
                ->action(function (FinancialReport $record) {
                    $record->calculateSummary();
                    $record->update([
                        'status' => 'approved',
                        'approved_by' => auth::id(),
                        'approved_at' => now(),
                    ]);
                }),

            Tables\Actions\Action::make('print')
                ->label('Print Laporan')
                ->icon('heroicon-o-printer')
                ->color('primary')
                ->visible(fn (FinancialReport $record) => $record->status === 'approved')
                ->url(fn (FinancialReport $record) => route('report.print', $record))
                ->openUrlInNewTab(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFinancialReports::route('/'),
            'create' => Pages\CreateFinancialReport::route('/create'),
            'edit' => Pages\EditFinancialReport::route('/{record}/edit'),
        ];
    }
}
