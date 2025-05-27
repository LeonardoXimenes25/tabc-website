<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Transaction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\TransactionResource\Pages;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Relatoriu Orsamentu';
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('financialreport_id')
    ->label('Laporan Keuangan')
    ->relationship('financialReport', 'id') // gunakan kolom 'id'
    ->getOptionLabelFromRecordUsing(fn ($record) => $record->display_name)
    ->required()
    ->searchable(),


            DatePicker::make('date')
                ->required()
                ->label('Data'),

            Select::make('type')
                ->required()
                ->options([
                    'income' => 'Osan Tama',
                    'expense' => 'Osan Sai',
                ])
                ->label('Tipu Transasaun'),

            TextInput::make('category')
                ->required()
                ->label('Kategori'),

            TextInput::make('amount')
                ->required()
                ->numeric()
                ->label('Jumlah'),

            Textarea::make('description')
                ->label('Keterangan'),

            Select::make('account')
                ->required()
                ->options([
                    'cash' => 'Tunai',
                    'bank' => 'Bank',
                ])
                ->label('Rekening'),

            // Tampilkan pembuat (opsional - hanya dibaca)
            Select::make('author_id')
                ->relationship('author', 'name')
                ->label('Dibuat Oleh')
                ->disabled()
                ->visibleOn('edit'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->label('Tanggal')->date(),
                TextColumn::make('type')->label('Jenis')->badge(),
                TextColumn::make('category')->label('Kategori'),
                TextColumn::make('amount')->label('Jumlah')->money('USD'),
                TextColumn::make('account')->label('Rekening'),
                TextColumn::make('author.name')->label('Dibuat Oleh'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
