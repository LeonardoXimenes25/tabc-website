<?php

namespace App\Filament\Resources\WorshipResource\Pages;

use App\Filament\Resources\WorshipResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWorship extends CreateRecord
{
    protected static string $resource = WorshipResource::class;

    protected function getRedirectUrl(): string
    {
        // arahkan ke halaman index setelah create sukses
        return $this->getResource()::getUrl('index');
    }
}
