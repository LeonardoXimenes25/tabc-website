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
        return 'Jadwal Ibadah';
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Persekutuan';
    protected static ?string $pluralModelLabel = 'Persekutuan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('date')
                ->label('Tanggal')
                ->required(),

                Select::make('fellowship_type')
                    ->label('Jenis Persekutuan')
                    ->options([
                        'prayer_fellowship' => 'Persekutuan Doa',
                        'youth_fellowship' => 'Persekutuan Remaja',
                        'family_fellowship' => 'Persekutuan Keluarga',
                        'sunday_school' => 'Sekolah Minggu',
                    ])
                    ->required(),

                TextInput::make('theme')->label('Tema')->required(),
                TextInput::make('bible_verse')->label('Ayat Alkitab')->required(),
                TextInput::make('preacher')->label('Pengkhotbah')->required(),
                TextInput::make('mc')->label('MC')->required(),
                TextInput::make('musician')->label('Pemusik')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->label('Tanggal')->date()->sortable()->searchable(),
                TextColumn::make('fellowship_type')->label('Jenis Persekutuan')->formatStateUsing(fn ($state) => match ($state) {
                    'prayer_fellowship' => 'Persekutuan Doa',
                    'youth_fellowship' => 'Persekutuan Remaja',
                    'family_fellowship' => 'Persekutuan Keluarga',
                    'sunday_school' => 'Sekolah Minggu',
                    default => $state,
                })->sortable(),
                TextColumn::make('theme')->label('Tema'),
                TextColumn::make('bible_verse')->label('Ayat Alkitab'),
                TextColumn::make('preacher')->label('Pengkhotbah'),
                TextColumn::make('mc')->label('MC'),
                TextColumn::make('musician')->label('Pemusik'),
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
