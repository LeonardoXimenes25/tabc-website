<?php

namespace App\Filament\Resources\OutcomingMailResource\Pages;

use App\Filament\Resources\OutcomingMailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOutcomingMail extends CreateRecord
{
    protected static string $resource = OutcomingMailResource::class;

     protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Saat create, set default status jadi draft
        $data['status'] = 'draft';
        return $data;
    }

    protected function afterCreate(): void
    {
        // Opsional: bisa kirim notifikasi, log, dll di sini
    }

    protected function getRedirectUrl(): string
    {
        // arahkan ke halaman index setelah create sukses
        return $this->getResource()::getUrl('index');
    }
}
