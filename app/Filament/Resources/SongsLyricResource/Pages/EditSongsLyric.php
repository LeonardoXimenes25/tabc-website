<?php

namespace App\Filament\Resources\SongsLyricResource\Pages;

use App\Filament\Resources\SongsLyricResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSongsLyric extends EditRecord
{
    protected static string $resource = SongsLyricResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
