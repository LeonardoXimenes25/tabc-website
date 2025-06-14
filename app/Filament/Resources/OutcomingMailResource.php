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
use App\Filament\Resources\OutcomingMailResource\Pages;

class OutcomingMailResource extends Resource
{

    public static function getNavigationGroup(): ?string
    {
        return 'Karta';
    }

    protected static ?string $model = OutcomingMail::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Karta sai';
    protected static ?string $pluralModelLabel = 'Karta sai';
    protected static ?string $navigationLabel = 'Karta sai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        DatePicker::make('sent_date')
                            ->label('Data simu')
                            ->required(),

                        TextInput::make('letter_number')
                            ->label('No. Karta')
                            ->required()
                            ->extraAttributes(['autocomplete' => 'off']),

                        TextInput::make('recepient')
                            ->label('Simudor')
                            ->required()
                            ->extraAttributes(['autocomplete' => 'off']),

                        TextInput::make('subject')
                            ->label('Asuntu')
                            ->required()
                            ->extraAttributes(['autocomplete' => 'off']),

                        FileUpload::make('attachment')
                            ->label('Anexu')
                            ->disk('public')
                            ->directory('surat_lampiran')
                            ->nullable(),

                        TextInput::make('responsible_person')
                            ->label('Penangun Jawab')
                            ->required(),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draf',
                                'pending_review' => 'Pending',
                                'approved' => 'Aprova',
                                'rejected' => 'Rejeita',
                            ])
                            ->default('draft')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('No.')->sortable()->searchable(),
                TextColumn::make('sent_date')->label('Data Sai')->date('d/m/y')->sortable()->searchable(),
                TextColumn::make('letter_number')->label('No. Karta')->sortable()->searchable(),
                TextColumn::make('recepient')->label('Ba')->sortable()->searchable(),
                TextColumn::make('subject')->label('Asuntu')->sortable()->searchable(),
                TextColumn::make('attachment')->label('Anexu')->sortable()->searchable(),
                TextColumn::make('responsible_person')->label('Responsabiliza')->sortable()->searchable(),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'approved',
                        'warning' => 'pending_review',
                        'secondary' => 'draft',
                        'danger' => 'rejected',
                    ])
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'approved' => 'Aprova',
                        'pending_review' => 'Pending',
                        'draft' => 'Draf',
                        'rejected' => 'Rejeita',
                        default => $state,
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
            'index' => Pages\ListOutcomingMails::route('/'),
            'create' => Pages\CreateOutcomingMail::route('/create'),
            'edit' => Pages\EditOutcomingMail::route('/{record}/edit'),
        ];
    }
}
