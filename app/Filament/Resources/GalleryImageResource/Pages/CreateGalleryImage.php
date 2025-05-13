<?php

namespace App\Filament\Resources\GalleryImageResource\Pages;

use Filament\Actions;
use App\Models\GalleryImage;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\GalleryImageResource;

class CreateGalleryImage extends CreateRecord
{
    protected static string $resource = GalleryImageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $images = $data['image_path'];
    unset($data['image_path']);

    foreach ($images as $image) {
        GalleryImage::create([
            'gallery_id' => $data['gallery_id'],
            'image_path' => $image,
        ]);
    }

    // Menghentikan simpan default (karena sudah kita simpan manual)
    $this->halt();

    return [];
}
}
