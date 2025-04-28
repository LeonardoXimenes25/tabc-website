<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Article;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ArticleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArticleResource\RelationManagers;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->label('Penulis')
                    ->searchable()
                    ->required(),

                    Select::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Category')
                    ->options([
                        1 => 'Renungan Harian',
                        2 => 'Pengajaran Alkitab',
                        3 => 'Sejarah Gereja dan Tokoh Iman',
                    ])
                    ->required()
                    ->searchable(),

                FileUpload::make('image_url')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('articles'),

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
                    ]) ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable()->wrap(),
                TextColumn::make('author.name')->label('Penulis')->sortable(),
                BadgeColumn::make('category.name')
                    ->label('Category')
                    ->color(function (Article $record) {
                        return $record->category->getCategoryColor();
                    })
                    ->sortable()
                    ->searchable(),
                TextColumn::make('body')->label('Konten')->sortable()->limit(30),
                ImageColumn::make('image_url')->label('Gambar')->height(50)->disk('public'),
                TextColumn::make('created_at')->dateTime('d M Y')->label('Tanggal Dibuat')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
