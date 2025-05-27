<?php

namespace App\Filament\Resources\FinancialReportResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\FinancialReportResource;

class CreateFinancialReport extends CreateRecord
{
    protected static string $resource = FinancialReportResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
      $data['author_id'] = Auth::id();
        return $data;
    }
}
