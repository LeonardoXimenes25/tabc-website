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
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\WorshipResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WorshipResource\RelationManagers;

class WorshipResource extends Resource
{
    protected static ?string $model = Worship::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Jadwal Ibadah';
    }


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Ibadah';
    protected static ?string $pluralModelLabel = 'Ibadah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    DatePicker::make('date')->label('Tanggal'),
                    Select::make('worship_type')
                        ->label('Jenis Ibadah')
                        ->options([
                            'sunday_service' => 'Ibadah Minggu',
                            'good_friday' => 'Jumat Agung',
                            'christmas' => 'Natal',
                            'easter' => 'Paskah',
                        ])
                        ->required(),
                ]),
                TextInput::make('theme')->label('Tema')->required(),
                TextInput::make('bible_verse')->label('Ayat Alkitab')->required(),
                Grid::make(2)->schema([
                    TextInput::make('preacher')->label('Pengkhotbah'),
                    TextInput::make('liturgist')->label('Liturgis'),
                    TextInput::make('singer')->label('Singer'),
                    TextInput::make('musician')->label('Pemusik'),
                    TextInput::make('greeter')->label('Penyambut'),
                    TextInput::make('collector')->label('Kolektan'),
                    TextInput::make('offering_prayer')->label('Doa Persembahan'),
                    TextInput::make('lcd_operator')->label('Operator LCD'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->label('Tanggal')->date()->sortable(),
                TextColumn::make('worship_type')->label('Jenis Ibadah')->formatStateUsing(fn ($state) => match ($state) {
                    'sunday_service' => 'Ibadah Minggu',
                    'good_friday' => 'Jumat Agung',
                    'christmas' => 'Natal',
                    'easter' => 'Paskah',
                    default => $state,
                })->sortable(),
                TextColumn::make('theme')->label('Tema'),
                TextColumn::make('bible_verse')->label('Ayat Alkitab'),
                TextColumn::make('preacher')->label('Pengkhotbah'),
                TextColumn::make('liturgist')->label('Liturgis'),
                TextColumn::make('singer')->label('Singer'),
                TextColumn::make('musician')->label('Pemusik'),
                TextColumn::make('greeter')->label('Penyambut'),
                TextColumn::make('collector')->label('Kolektan'),
                TextColumn::make('offering_prayer')->label('Doa Persembahan'),
                TextColumn::make('lcd_operator')->label('Operator LCD'),
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
            'index' => Pages\ListWorships::route('/'),
            'create' => Pages\CreateWorship::route('/create'),
            'edit' => Pages\EditWorship::route('/{record}/edit'),
        ];
    }
}
