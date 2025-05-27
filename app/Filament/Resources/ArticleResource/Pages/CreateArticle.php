<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ArticleResource;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
        {
            // Set slug kalau kosong
            if (empty($data['slug'])) {
                $data['slug'] = Str::slug($data['title']);
            }

            // Set author_id otomatis dari user yang login
            $data['author_id'] = Auth::id();

            return $data;
        }

     protected function getRedirectUrl(): string
    {
        // arahkan ke halaman index setelah create sukses
        return $this->getResource()::getUrl('index');
    }
    
}
