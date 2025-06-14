<?php

namespace App\Filament\Resources\OutcomingMailResource\Pages;

use App\Filament\Resources\OutcomingMailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOutcomingMail extends EditRecord
{
    protected static string $resource = OutcomingMailResource::class;

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
