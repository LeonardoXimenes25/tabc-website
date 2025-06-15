<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArticles extends ListRecords
{
    protected static string $resource = ArticleResource::class;

    protected function getCreateButtonLabel(): string
    {
        return 'Aumenta Dadus';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
