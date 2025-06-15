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
use Illuminate\Support\Facades\Auth;
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
    protected static ?string $modelLabel = 'Letra musika';
    protected static ?string $pluralModelLabel = 'Letra musika';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->label('Titulu')
                ->live(onBlur: true)
                ->afterStateUpdated(function ($state, $get, $set) {
                    if (!$get('slug')) {
                        $set('slug', Str::slug($state));
                    }
                })
                ->required()
                ->maxLength(255),

                TextInput::make('artist')
                        ->label('Artista')
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
                    ->label('Letra Musika')
                    ->required(),

                Select::make('categorysong_id')
                    ->relationship('categorysong', 'name')
                    ->label('Kategoria')
                    ->placeholder('Hili opsaun')
                    ->searchable()
                    ->required(),

                FileUpload::make('image_url')
                    ->label('Upload imajen')
                    ->image()
                    ->directory('songs')
                    ->maxSize(1024),

                TextInput::make('youtube_embed')
                    ->label('YouTube Video URL')
                    ->placeholder('https://www.youtube.com/watch?v=oXNn1fIXir8')
                    ->url()
                    ->nullable()
                    ->helperText('Hatama link YouTube iha nee'),

                    
                TextInput::make('album')
                    ->label('Album')
                    ->maxLength(255),

                TextInput::make('year')
                    ->label('Tinan')
                    ->maxLength(255),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable()->wrap()->label('Titulu'),
                TextColumn::make('artist')->searchable()->sortable()->label('Artista'),
                TextColumn::make('categorysong.name')->label('Kategoria')->sortable(),
                TextColumn::make('body')->label('Kontendu')->sortable()->wrap()->formatStateUsing(fn ($state) => \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($state)), 30)),
                ImageColumn::make('image_url')
                    ->label('Imajen')
                    ->size(50)
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->image_url))
                    ->extraAttributes(['style' => 'border-radius:50%; object-fit: cover;']),
                TextColumn::make('author.name')->label('Autor')->sortable(),
                TextColumn::make('created_at')->dateTime('d M Y')->label('Data')->sortable(),
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
            'index' => Pages\ListSongsLyrics::route('/'),
            'create' => Pages\CreateSongsLyric::route('/create'),
            'edit' => Pages\EditSongsLyric::route('/{record}/edit'),
        ];
    }

     public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = Auth::id();
        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['author_id'] = Auth::id();
        return $data;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->orderBy('created_at', 'desc');
    }
}
