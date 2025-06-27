<?php

namespace App\Filament\Resources\IncomingMailResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\IncomingMailResource;

class CreateIncomingMail extends CreateRecord
{
    protected static string $resource = IncomingMailResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set author_id otomatis dari user yang login
        $data['author_id'] = Auth::id();
        $data['status'] = 'draft';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        // arahkan ke halaman index setelah create sukses
        return $this->getResource()::getUrl('index');
    }
}
