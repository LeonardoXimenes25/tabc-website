<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Fellowship;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FellowshipResource\Pages;
use App\Filament\Resources\FellowshipResource\RelationManagers;

class FellowshipResource extends Resource
{
    protected static ?string $model = Fellowship::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Orariu Misa';
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Kultu';
    protected static ?string $pluralModelLabel = 'Kultu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('date')
                ->label('Data Kultu')
                ->required(),

                Select::make('fellowship_type')
                    ->label('Tipu Kultu')
                    ->options([
                        'prayer_fellowship' => 'Kultu Orasaun',
                        'youth_fellowship' => 'Kultu Jovem',
                        'family_fellowship' => 'Kultu Familia',
                        'sunday_school' => 'Eskola Dominika',
                    ])
                    ->required(),

                TextInput::make('theme')->label('Tema')->required(),
                TextInput::make('bible_verse')->label('Versu Biblia')->required(),
                TextInput::make('preacher')->label('Pregador')->required(),
                TextInput::make('mc')->label('MC')->required(),
                TextInput::make('musician')->label('Tokador')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->label('Data kultu')->date()->sortable()->searchable(),
                TextColumn::make('fellowship_type')->label('Tipu Kultu')->formatStateUsing(fn ($state) => match ($state) {
                    'prayer_fellowship' => 'Kultu Orasaun',
                    'youth_fellowship' => 'Kultu Jovem',
                    'family_fellowship' => 'Kultu Familia',
                    'sunday_school' => 'Eskola Dominika',
                    default => $state,
                })->sortable(),
                TextColumn::make('theme')->label('Tema'),
                TextColumn::make('bible_verse')->label('Versu Biblia'),
                TextColumn::make('preacher')->label('Pregador'),
                TextColumn::make('mc')->label('MC'),
                TextColumn::make('musician')->label('Tokador'),
            ])
            ->defaultSort('date', 'desc')
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
            'index' => Pages\ListFellowships::route('/'),
            'create' => Pages\CreateFellowship::route('/create'),
            'edit' => Pages\EditFellowship::route('/{record}/edit'),
        ];
    }
}
