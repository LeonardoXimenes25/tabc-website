<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Gallery;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GalleryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GalleryResource\RelationManagers;
use Filament\Facades\Filament;

class GalleryResource extends Resource
{
    public static function getNavigationGroup(): ?string
    {
        return 'Galleri Foto';
    }
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Galleria Foto';
    protected static ?string $pluralModelLabel = 'Galleria Foto';
    protected static ?string $navigationLabel = 'Galeria Foto';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Naran Aktividae')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsaun')
                    ->nullable(),

                DatePicker::make('event_date')
                    ->label('Data Aktividade')
                    ->required(),

                FileUpload::make('image_urls')
                    ->multiple()
                    ->directory('gallery')
                    ->image()
                    ->disk('public')
                    ->label('Upload Imajen')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable()->label('Naran Aktividade'),
                TextColumn::make('event_date')->label('Data Aktidade')->date('d/m/y')->sortable()->searchable(),
                TextColumn::make('description')->limit(50)->label('Deskripsaun'),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
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
