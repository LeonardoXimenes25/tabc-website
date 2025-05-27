<?php

namespace App\Filament\Resources\OutcomingMailResource\Pages;

use App\Filament\Resources\OutcomingMailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOutcomingMails extends ListRecords
{
    protected static string $resource = OutcomingMailResource::class;

    protected function getCreateButtonLabel(): string
    {
        return 'Aumenta Dadus';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label($this->getCreateButtonLabel()),
        ];
    }
}
