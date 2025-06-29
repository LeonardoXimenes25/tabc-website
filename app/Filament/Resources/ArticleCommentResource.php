<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ArticleComment;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArticleCommentResource\Pages;
use App\Filament\Resources\ArticleCommentResource\RelationManagers;

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

            Forms\Components\Select::make('parent_id')
                ->relationship('parent', 'body')
                ->label('Balasan Untuk')
                ->searchable()
                ->preload()
                ->helperText('Kosongkan jika ini komentar utama'),

            

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('Nu.'),
                Tables\Columns\TextColumn::make('user.name')->label('Autor'),
                Tables\Columns\TextColumn::make('body')->limit(50)->label('Komentariu'),
                Tables\Columns\TextColumn::make('parent.body')
                    ->limit(30)
                    ->label('Balasan Dari')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')->since()->label('Kria husi'),
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
            RelationManagers\RepliesRelationManager::class,
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


    public static function canAccess(): bool
    {
        return Filament::auth()?->user()?->role === 'admin';
    }
}
