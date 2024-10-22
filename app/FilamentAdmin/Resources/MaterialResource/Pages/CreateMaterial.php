<?php

namespace App\FilamentAdmin\Resources\MaterialResource\Pages;

use App\FilamentAdmin\Resources\MaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMaterial extends CreateRecord
{
    protected static string $resource = MaterialResource::class;
    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
