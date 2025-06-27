<?php

namespace App\Filament\Resources\IncomingMailResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\IncomingMailResource;

class ListIncomingMails extends ListRecords
{
    protected static string $resource = IncomingMailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Aumenta Dadus')
        ];
    }
}
