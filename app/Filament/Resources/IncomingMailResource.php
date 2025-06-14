<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\IncomingMail;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\IncomingMailResource\Pages;
use Filament\Tables\Actions\Action; // ✅ Ditambahkan

class IncomingMailResource extends Resource
{
    public static function getNavigationGroup(): ?string
    {
        return 'Karta';
    }

    protected static ?string $model = IncomingMail::class;
    protected static ?string $navigationIcon = 'heroicon-o-inbox';
    protected static ?string $modelLabel = 'Karta tama';
    protected static ?string $pluralModelLabel = 'Karta tama';
    protected static ?string $navigationLabel = 'Karta tama';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        DatePicker::make('received_date')->label('Data simu')->required(),
                        TextInput::make('letter_number')->label('No. Karta')->required(),
                        TextInput::make('sender')->label('Mandador')->required(),
                        TextInput::make('subject')->label('Asuntu')->required(),
                        FileUpload::make('attachment')->label('Anexu')->disk('public')->directory('surat_masuk')->nullable(),
                        TextInput::make('receiver')->label('Simudor')->required(),
                        
                        // ✅ Kolom status disembunyikan dari form
                        Select::make('status')->label('Estatus')
                            ->options([
                                'draft' => 'Draf',
                                'pending_review' => 'Pending',
                                'approved' => 'Aprova',
                                'rejected' => 'Rejeita',
                            ])
                            ->default('draft')
                            ->hidden(), // ✅ Kolom disembunyikan
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('No.')->sortable()->searchable(),
                TextColumn::make('received_date')->label('Data simu')->date('d/m/y')->sortable()->searchable(),
                TextColumn::make('letter_number')->label('No. Karta')->sortable()->searchable(),
                TextColumn::make('sender')->label('Mandador')->sortable()->searchable(),
                TextColumn::make('subject')->label('Asuntu')->sortable()->searchable(),
                TextColumn::make('attachment')->label('Anexu')->sortable()->searchable(),
                TextColumn::make('receiver')->label('Simudor')->sortable()->searchable(),

                // ✅ Badge status yang sudah diperbaiki
                BadgeColumn::make('status')->label('Estatus')
                    ->colors([
                        'gray' => 'draft',
                        'warning' => 'pending_review',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ])
                    ->formatStateUsing(fn ($state) => match($state) {
                        'draft' => 'Draf',
                        'pending_review' => 'Pending',
                        'approved' => 'Aprova',
                        'rejected' => 'Rejeita',
                        default => ucfirst($state),
                    })
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->emptyStateHeading('Dadus mamuk')
            ->actions([
                Tables\Actions\EditAction::make()->label('Edita'),
                Tables\Actions\DeleteAction::make()->label('Apaga'),

                // ✅ Tombol Aprova untuk mengubah status
                Action::make('Aprova')
                    ->label('Aprova')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn ($record) => $record->status !== 'approved')
                    ->action(fn ($record) => $record->update(['status' => 'approved'])),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListIncomingMails::route('/'),
            'create' => Pages\CreateIncomingMail::route('/create'),
            'edit' => Pages\EditIncomingMail::route('/{record}/edit'),
        ];
    }
}
