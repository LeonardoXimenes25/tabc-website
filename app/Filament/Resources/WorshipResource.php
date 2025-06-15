<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Worship;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\WorshipResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WorshipResource\RelationManagers;

class WorshipResource extends Resource
{
    protected static ?string $model = Worship::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Orariu Misa';
    }


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Misa';
    protected static ?string $pluralModelLabel = 'Misa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    DatePicker::make('date')->label('Data Misa'),
                    Select::make('worship_type')
                        ->label('Tipu Misa')
                        ->options([
                            'sunday_service' => 'Misa Domingu',
                            'good_friday' => 'Misa Sexta-Feira Santa',
                            'christmas' => 'Misa Natal',
                            'easter' => 'Misa Paskua',
                        ])
                        ->required(),
                ]),
                TextInput::make('theme')->label('Tema')->required(),
                TextInput::make('bible_verse')->label('Versu Biblia')->required(),
                Grid::make(2)->schema([
                    TextInput::make('preacher')->label('Pregador'),
                    TextInput::make('liturgist')->label('Liturgia'),
                    TextInput::make('singer')->label('Kantador'),
                    TextInput::make('musician')->label('Tokador'),
                    TextInput::make('greeter')->label('Simu Tamu'),
                    TextInput::make('collector')->label('Ofertor'),
                    TextInput::make('offering_prayer')->label('Orasaun Ofertor'),
                    TextInput::make('lcd_operator')->label('Operador LCD'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->label('Data Misa')->date()->sortable(),
                TextColumn::make('worship_type')->label('Tipu Misa')->formatStateUsing(fn ($state) => match ($state) {
                    'sunday_service' => 'Misa Domingu',
                    'good_friday' => 'Misa Sexta-Feira Santa',
                    'christmas' => 'Misa Natal',
                    'easter' => 'Paskua',
                    default => $state,
                })->sortable(),
                TextColumn::make('theme')->label('Tema'),
                TextColumn::make('bible_verse')->label('Versu Biblia'),
                TextColumn::make('preacher')->label('Pregador'),
                TextColumn::make('liturgist')->label('Liturgia'),
                TextColumn::make('singer')->label('Kantor'),
                TextColumn::make('musician')->label('Tokador'),
                TextColumn::make('greeter')->label('Simu Tamu'),
                TextColumn::make('collector')->label('Ofertor'),
                TextColumn::make('offering_prayer')->label('Orasaun Ofertoriu'),
                TextColumn::make('lcd_operator')->label('Operador LCD'),
        ])
        ->defaultSort('date', 'desc')
            ->filters([
                SelectFilter::make('worship_type')
                ->options([
                    'sunday_service' => 'Misa Domingu',
                    'good_friday' => 'Misa Sexta-Feira Santa',
                    'christmas' => 'Misa Natal',
                    'easter' => 'Paskua',
                ]),
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
            'index' => Pages\ListWorships::route('/'),
            'create' => Pages\CreateWorship::route('/create'),
            'edit' => Pages\EditWorship::route('/{record}/edit'),
        ];
    }
}
