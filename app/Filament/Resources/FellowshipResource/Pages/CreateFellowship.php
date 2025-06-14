<?php

namespace App\Filament\Resources\FellowshipResource\Pages;

use App\Filament\Resources\FellowshipResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFellowship extends CreateRecord
{
    protected static string $resource = FellowshipResource::class;

    protected function getRedirectUrl(): string
    {
        // arahkan ke halaman index setelah create sukses
        return $this->getResource()::getUrl('index');
    }
}
