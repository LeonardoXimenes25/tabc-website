<?php

namespace App\Filament\Resources\SongsLyricResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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

        $data['author_id'] = Auth::id();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        // arahkan ke halaman index setelah create sukses
        return $this->getResource()::getUrl('index');
    }
}
