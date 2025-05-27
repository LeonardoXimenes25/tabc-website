<?php

namespace App\Filament\Resources\SongsLyricResource\Pages;

use App\Filament\Resources\SongsLyricResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSongsLyrics extends ListRecords
{
    protected static string $resource = SongsLyricResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getCreateButtonLabel(): string
    {
        return 'Aumenta Dadus';
    }
}
