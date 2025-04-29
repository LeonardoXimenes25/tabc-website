<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ArticleResource;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        return $data;
    }
}
