<?php

namespace App\FilamentAdmin\Resources\CompanyDocumentDownloadResource\Pages;

use App\FilamentAdmin\Resources\CompanyDocumentDownloadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyDocumentDownload extends EditRecord
{
    protected static string $resource = CompanyDocumentDownloadResource::class;

    protected function getActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
