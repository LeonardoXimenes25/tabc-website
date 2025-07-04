<?php

namespace App\Filament\Resources\WorshipResource\Pages;

use App\Filament\Resources\WorshipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorships extends ListRecords
{
    protected static string $resource = WorshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Aumenta Dadus'),
        ];
    }
}
