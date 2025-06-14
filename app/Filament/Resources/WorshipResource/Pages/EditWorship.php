<?php

namespace App\Filament\Resources\WorshipResource\Pages;

use App\Filament\Resources\WorshipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorship extends EditRecord
{
    protected static string $resource = WorshipResource::class;

    protected function getRedirectUrl(): string
    {
        // arahkan ke halaman index setelah create sukses
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
