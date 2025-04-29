<?php

namespace App\Filament\Resources\SongsLyricResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\SongsLyricResource;

class CreateSongsLyric extends CreateRecord
{
    protected static string $resource = SongsLyricResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        return $data;
    }
}
