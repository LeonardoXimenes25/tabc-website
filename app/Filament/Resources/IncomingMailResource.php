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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\IncomingMailResource\Pages;
use App\Filament\Resources\IncomingMailResource\RelationManagers;

class IncomingMailResource extends Resource
{
    protected static ?string $model = IncomingMail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Surat Masuk';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Surat Masuk';
    }

    public static function getNavigationLabel(): string
    {
        return 'Surat Masuk';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('letter_number')
                        ->label('No. Surat')
                        ->required(),
                        DatePicker::make('received_date')
                        ->label('Tanggal Diterima')
                        ->required()
                        ->displayFormat('d/m/Y')
                        ->native(false),
                        TextInput::make('sender')
                        ->label('Pengirim')
                        ->required(),
                        TextInput::make('subject')
                        ->label('Perihal')
                        ->required(),
                        TextInput::make('attachment')
                        ->label('Lampiran'),
                        TextInput::make('receiver')
                        ->label('Penerima')
                        ->required(),
                        Select::make('status')
                                ->label('Status')
                                ->options([
                                    'accepted' => 'Diterima',
                                    'in progress' => 'Dalam Proses',
                                    'pending' => 'Belum',
                                ])
                                ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('No. ')->sortable()->searchable(),
                TextColumn::make('letter_number')->label('No. Surat')->sortable()->searchable(),
                TextColumn::make('received_date')->label('Tanggal Diterima')->date('d/m/y')->sortable()->searchable(),
                TextColumn::make('sender')->label('Pengirim')->sortable()->searchable(),
                TextColumn::make('subject')->label('Perihal')->sortable()->searchable(),
                TextColumn::make('attachment')->label('Lampiran')->sortable()->searchable(),
                TextColumn::make('status')->label('Status'),
                
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
            'index' => Pages\ListIncomingMails::route('/'),
            'create' => Pages\CreateIncomingMail::route('/create'),
            'edit' => Pages\EditIncomingMail::route('/{record}/edit'),
        ];
    }
}
