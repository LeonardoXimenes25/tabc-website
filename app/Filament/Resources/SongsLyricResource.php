<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Song;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\SongsLyric;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SongsLyricResource\Pages;
use App\Filament\Resources\SongsLyricResource\RelationManagers;

class SongsLyricResource extends Resource
{
    protected static ?string $model = Song::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Lirik Lagu';
    protected static ?string $pluralModelLabel = 'Lirik Lagu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->label('Judul')
                ->live(onBlur: true)
                ->afterStateUpdated(function ($state, $get, $set) {
                    if (!$get('slug')) {
                        $set('slug', Str::slug($state));
                    }
                })
                ->required()
                ->maxLength(255),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique('songs', 'slug', ignoreRecord: true)
                    ->disabled(),

                TextInput::make('artist')
                        ->label('Penyanyi')
                        ->required()
                        ->maxLength(255),

                RichEditor::make('body')
                    ->toolbarButtons([
                        'attachFiles',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                        'html',
                    ])
                    ->columns(2)
                    ->label('Lirik Lagu')
                    ->required(),

                Select::make('categorysong_id')
                    ->relationship('categorysong', 'name')
                    ->label('Tema')
                    ->searchable()
                    ->required(),

                FileUpload::make('image_url')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('songs'),

                    TextInput::make('youtube_embed')
                    ->label('YouTube Video URL')
                    ->placeholder('https://www.youtube.com/watch?v=oXNn1fIXir8')
                    ->url()
                    ->nullable()
                    ->helperText('Masukkan link YouTube'),

                    
                TextInput::make('album')
                ->label('Album')
                ->required()
                ->maxLength(255),

                TextInput::make('year')
                ->label('Tahun')
                ->required()
                ->maxLength(255),

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
                TextColumn::make('categorysong.name')->label('Tema')->sortable(),
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
