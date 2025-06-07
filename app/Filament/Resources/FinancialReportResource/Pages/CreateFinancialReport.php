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
        $data['status'] = 'draft';
        $data['author_id'] = Auth::id();

        return $data;
    }

    protected function afterSave(): void
    {
        if (method_exists($this->record, 'calculateSummary')) {
            $this->record->calculateSummary();
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
