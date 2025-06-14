<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleCommentResource\Pages;
use App\Filament\Resources\ArticleCommentResource\RelationManagers;
use App\Models\ArticleComment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleCommentResource extends Resource
{
    protected static ?string $model = ArticleComment::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Artigu Espiritual';
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Komentar';
    protected static ?string $pluralModelLabel = 'Komentar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('article_id')
                ->relationship('article', 'title')
                ->required()
                ->label('Tema Artigu Espiritual'),

            Forms\Components\Select::make('author_id')
                ->relationship('user', 'name')
                ->required()
                ->label('Autor Komentariu'),

            Forms\Components\Textarea::make('body')
                ->required()
                ->label('Konteudu Komentariu')
                ->rows(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('article.title')->label('Artikel'),
                Tables\Columns\TextColumn::make('author.name')->label('Penulis'),
                Tables\Columns\TextColumn::make('body')->limit(50)->label('Komentar'),
                Tables\Columns\TextColumn::make('created_at')->since()->label('Dibuat'),
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
            'index' => Pages\ListArticleComments::route('/'),
            'create' => Pages\CreateArticleComment::route('/create'),
            'edit' => Pages\EditArticleComment::route('/{record}/edit'),
        ];
    }
}
