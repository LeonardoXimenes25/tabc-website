<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\OutcomingMail;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OutcomingMailResource\Pages;
use App\Filament\Resources\OutcomingMailResource\RelationManagers;

class OutcomingMailResource extends Resource
{

    public static function getNavigationGroup(): ?string
    {
        return 'Surat';
    }

    protected static ?string $model = OutcomingMail::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Surat Keluar';
    protected static ?string $pluralModelLabel = 'Surat Keluar';
    protected static ?string $navigationLabel = 'Surat Keluar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Card::make()
                        ->schema([
                            DatePicker::make('received_date')
                            ->label('Tanggal Diterima')
                            ->required()
                            ->displayFormat('d/m/Y')
                            ->native(false)
                            ->extraAttributes(['autocomplete' => 'off']),
                            TextInput::make('letter_number')
                            ->label('No. Surat')
                            ->required()
                            ->extraAttributes(['autocomplete' => 'off']),
                            TextInput::make('recepient')
                            ->label('Kepada')
                            ->required()
                            ->extraAttributes(['autocomplete' => 'off']),
                            TextInput::make('subject')
                            ->label('Perihal')
                            ->required()
                            ->extraAttributes(['autocomplete' => 'off']),
                            FileUpload::make('attachment')
                            ->label('Lampiran')
                            ->disk('public')
                            ->directory('surat_lampiran')
                            ->nullable(),
                            TextInput::make('responsible_person')
                            ->label('Penangun Jawab')
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
                TextColumn::make('received_date')->label('Tanggal Diterima')->date('d/m/y')->sortable()->searchable(),
                TextColumn::make('letter_number')->label('No. Surat')->sortable()->searchable(),
                TextColumn::make('recepient')->label('Kepada')->sortable()->searchable(),
                TextColumn::make('subject')->label('Perihal')->sortable()->searchable(),
                TextColumn::make('attachment')->label('Lampiran')->sortable()->searchable(),
                TextColumn::make('responsible_person')->label('Penanggun Jawab')->sortable()->searchable(),
                BadgeColumn::make('status')
                ->label('Status')
                ->colors([
                    'success' => 'accepted',
                    'warning' => 'in progress',
                    'secondary' => 'pending',
                ])
                ->formatStateUsing(function ($state) {
                    return match ($state) {
                        'accepted' => 'Diterima',
                        'in progress' => 'Dalam Proses',
                        'pending' => 'Belum',
                        default => $state,
                    };
                }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListOutcomingMails::route('/'),
            'create' => Pages\CreateOutcomingMail::route('/create'),
            'edit' => Pages\EditOutcomingMail::route('/{record}/edit'),
        ];
    }
}
