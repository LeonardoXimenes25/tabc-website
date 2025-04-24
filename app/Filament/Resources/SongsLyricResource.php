<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Song;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\SongsLyric;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SongsLyricResource\Pages;
use App\Filament\Resources\SongsLyricResource\RelationManagers;

class SongsLyricResource extends Resource
{
    protected static ?string $model = Song::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->label('Judul')
                ->required()
                ->maxLength(255),

            TextInput::make('artist')
                ->label('Penyanyi')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            Select::make('category_id')
                ->relationship('categorysong', 'name')
                ->label('Genre')
                ->searchable()
                ->required(),

            FileUpload::make('image_url')
                ->label('Gambar')
                ->image()
                ->disk('public')
                ->directory('articles'),

            Textarea::make('body')
                ->label('Lirik Lagu')
                ->rows(10)
                ->required(),

            Select::make('author_id')
                ->relationship('author', 'name')
                ->label('Penulis')
                ->searchable()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable()->wrap()->label('Judul'),
                TextColumn::make('artist')->searchable()->sortable()->wrap()->label('artist'),
                TextColumn::make('categorysong.name')->label('Genre')->sortable(),
                TextColumn::make('body')->label('Lirik Lagu')->sortable()->limit(30),
                ImageColumn::make('image_url')->label('Gambar')->height(50)->disk('public'),
                TextColumn::make('author.name')->label('Penulis')->sortable(),
                TextColumn::make('created_at')->dateTime('d M Y')->label('Tanggal Dibuat')->sortable(),
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
            'index' => Pages\ListSongsLyrics::route('/'),
            'create' => Pages\CreateSongsLyric::route('/create'),
            'edit' => Pages\EditSongsLyric::route('/{record}/edit'),
        ];
    }
}
