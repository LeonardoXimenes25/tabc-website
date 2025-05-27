<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\GalleryResource;

class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;

     protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = Auth::id(); // Ambil user yang login di Filament
        return $data;
    }

     protected function getRedirectUrl(): string
    {
        // arahkan ke halaman index setelah create sukses
        return $this->getResource()::getUrl('index');
    }
}
