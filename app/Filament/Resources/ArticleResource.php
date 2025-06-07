<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Article;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
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

    public static function getNavigationGroup(): ?string
    {
        return 'Artigu Espiritual';
    }

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $modelLabel = 'Artigu Espiritual';
    protected static ?string $pluralModelLabel = 'Artigu Espiritual';

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

                 Select::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Category')
                    ->options([
                        1 => 'Devosaun loro-loron',
                        2 => 'Ensinu biblia',
                        3 => 'Historia igreja no figura fe',
                    ])
                    ->required()
                    ->searchable(),

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
                ->label('Konteudu')
                ->required(),

                 FileUpload::make('image_url')
                ->label('Gambar')
                ->image()
                ->disk('public')
                ->directory('articles')
                ->label('Upload imajen'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable()->wrap()->label('Titulu'),
                BadgeColumn::make('category.name')
                    ->label('Kategoria')
                    ->color(function (Article $record) {
                        return $record->category->getCategoryColor();
                    })
                    ->sortable()
                    ->searchable(),
                TextColumn::make('body')->label('Kontendu')->sortable()->limit(30),
                ImageColumn::make('image_url')->label('Imajen')->height(50)->disk('public'),
                TextColumn::make('created_at')->dateTime('d M Y')->label('Data')->sortable(),
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
}
