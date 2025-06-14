<?php

namespace App\Filament\Resources\IncomingMailResource\Pages;

use App\Filament\Resources\IncomingMailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIncomingMail extends CreateRecord
{
    protected static string $resource = IncomingMailResource::class;

     protected function mutateFormDataBeforeCreate(array $data): array
    {
        // ✅ Ubah status dari 'draft' menjadi 'pending_review' secara otomatis saat dibuat
        $data['status'] = 'pending_review';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        // arahkan ke halaman index setelah create sukses
        return $this->getResource()::getUrl('index');
    }
}
