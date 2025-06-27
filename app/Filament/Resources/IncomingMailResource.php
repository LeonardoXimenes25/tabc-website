<?php

namespace App\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\IncomingMail;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\IncomingMailResource\Pages;

class IncomingMailResource extends Resource
{
    protected static ?string $model = IncomingMail::class;
    protected static ?string $navigationIcon = 'heroicon-o-inbox';
    protected static ?string $modelLabel = 'Karta tama';
    protected static ?string $pluralModelLabel = 'Karta tama';
    protected static ?string $navigationLabel = 'Karta tama';

    public static function getNavigationGroup(): ?string
    {
        return 'Karta';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasaun Karta')
                    ->schema([
                        DatePicker::make('received_date')->label('Data simu')->date('d-m-Y')->required(),
                        TextInput::make('letter_number')->label('No. Karta')->required(),
                        TextInput::make('sender')->label('Mandador')->required(),
                        TextInput::make('subject')->label('Asuntu')->required(),
                        FileUpload::make('attachment')->label('Anexu')->disk('public')->directory('surat_masuk')->nullable(),
                        TextInput::make('receiver')->label('Simudor')->required(),
                        Select::make('status')
                            ->label('Estatus')
                            ->options([
                                'draft' => 'Draf',
                                'pending_review' => 'Pending',
                                'approved' => 'Aprova',
                                'rejected' => 'Rejeita',
                            ])
                            ->default('draft')
                            ->hidden(),
                        Textarea::make('rejection_note')
                            ->label('Razaun rejeita')
                            ->disabled()
                            ->visible(fn ($get) => $get('status') === 'rejected'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'asc')
            ->filters([
                SelectFilter::make('month')
                    ->label('Fulan')
                    ->options([
                        '1' => 'Janeiru',
                        '2' => 'Fevereiru',
                        '3' => 'Marsu',
                        '4' => 'Abril',
                        '5' => 'Maiu',
                        '6' => 'Junhu',
                        '7' => 'Jullu',
                        '8' => 'Agustu',
                        '9' => 'Setembru',
                        '10' => 'Outubru',
                        '11' => 'Novembru',
                        '12' => 'Desembru',
                    ])
                    ->query(function ($query, $data) {
                        if (!empty($data['value'])) {
                            $query->whereMonth('received_date', (int) $data['value']);
                        }
                    }),

                SelectFilter::make('year')
                    ->label('Tinan')
                    ->options(function () {
                        return IncomingMail::selectRaw('YEAR(received_date) as year')
                            ->distinct()
                            ->orderBy('year', 'desc')
                            ->pluck('year', 'year')
                            ->toArray();
                    })
                    ->query(function ($query, $data) {
                        if (!empty($data['value'])) {
                            $query->whereYear('received_date', (int) $data['value']);
                        }
                    }),
            ])
            ->headerActions([
    Action::make('laporanPdf')
        ->label('Imprimir')
        ->icon('heroicon-o-document-text')
        ->color('success')
        ->url(function ($livewire) {
            $filters = $livewire->tableFilters ?? [];

            $month = $filters['month']['value'] ?? null; // null jika tidak ada filter
            $year = $filters['year']['value'] ?? null;   // null jika tidak ada filter

            $params = [];
            if ($month) {
                $params['month'] = $month;
            }
            if ($year) {
                $params['year'] = $year;
            }

            return route('reports.incoming-mails.pdf', $params);
        })
        ->openUrlInNewTab()
        ->visible(fn () => Auth::check() && Auth::user()->role === 'admin'),
])

            ->columns([
                TextColumn::make('id')->label('No.')->sortable()->searchable(),
                TextColumn::make('received_date')->label('Data simu')->date('d/m/Y')->sortable()->searchable(),
                TextColumn::make('letter_number')->label('No. Karta')->sortable()->searchable(),
                TextColumn::make('sender')->label('Mandador')->sortable()->searchable(),
                TextColumn::make('subject')->label('Asuntu')->sortable()->searchable(),
                TextColumn::make('receiver')->label('Simudor')->sortable()->searchable(),
                TextColumn::make('attachment')
                    ->label('Anexu')
                    ->formatStateUsing(fn ($state) => $state ? 'Iha' : 'Lae')
                    ->icon(fn ($state) => $state ? 'heroicon-o-paper-clip' : null)
                    ->color(fn ($state) => $state ? 'primary' : 'gray'),
                TextColumn::make('status')
                    ->label('Estatus')
                    ->badge()
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'draft' => 'Draf',
                        'pending_review' => 'Pending',
                        'approved' => 'Aprova',
                        'rejected' => 'Rejeita',
                        default => ucfirst($state),
                    })
                    ->color(fn ($state) => match ($state) {
                        'draft' => 'gray',
                        'pending_review' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'primary',
                    }),
                TextColumn::make('rejection_note')
                    ->label('Razaun rejeita')
                    ->visible(fn ($record) => $record && $record->status === 'rejected')
                    ->wrap(),
            ])
            ->emptyStateHeading('Dadus mamuk')
            ->actions([
                EditAction::make()->label('Edita'),
                DeleteAction::make()->label('Apaga'),

                Action::make('submit')
                    ->label('Submete')
                    ->color('warning')
                    ->icon('heroicon-o-paper-airplane')
                    ->visible(fn ($record) =>
                        Auth::check() &&
                        Auth::user()->role === 'admin' &&
                        $record->status === 'draft'
                    )
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['status' => 'pending_review'])),

                Action::make('approve')
                    ->label('Aprova')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn ($record) =>
                        Auth::check() &&
                        Auth::user()->role === 'majelis' &&
                        $record->status === 'pending_review'
                    )
                    ->action(fn ($record) => $record->update(['status' => 'approved'])),

                Action::make('reject')
                    ->label('Rejeita')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->visible(fn ($record) =>
                        Auth::check() &&
                        Auth::user()->role === 'majelis' &&
                        $record->status === 'pending_review'
                    )
                    ->form([
                        Textarea::make('rejection_note')->label('Razaun Rejeita')->required(),
                    ])
                    ->action(function ($record, array $data) {
                        $record->update([
                            'status' => 'rejected',
                            'rejection_note' => $data['rejection_note'],
                        ]);
                    }),
            ])
            ->bulkActions([
                DeleteBulkAction::make()->label('Apaga'),

                BulkAction::make('submit')
                    ->label('Submete Karta')
                    ->action(function (\Illuminate\Support\Collection $records) {
                        $records->each(function ($record) {
                            if ($record->status === 'draft') {
                                $record->update(['status' => 'pending_review']);
                            }
                        });
                    })
                    ->requiresConfirmation()
                    ->color('warning')
                    ->icon('heroicon-o-paper-airplane')
                    ->visible(fn () =>
                        Auth::check() && Auth::user()->role === 'admin'
                    ),

                BulkAction::make('approve')
                    ->label('Aprova Karta')
                    ->action(function (\Illuminate\Support\Collection $records) {
                        $records->each(function ($record) {
                            if ($record->status === 'pending_review') {
                                $record->update(['status' => 'approved']);
                            }
                        });
                    })
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn () =>
                        Auth::check() && Auth::user()->role === 'majelis'
                    ),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIncomingMails::route('/'),
            'create' => Pages\CreateIncomingMail::route('/create'),
            'edit' => Pages\EditIncomingMail::route('/{record}/edit'),
        ];
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = Auth::id();
        return $data;
    }
}
