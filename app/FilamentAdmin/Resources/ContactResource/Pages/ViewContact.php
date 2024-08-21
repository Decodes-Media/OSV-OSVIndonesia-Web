<?php

namespace App\FilamentAdmin\Resources\ContactResource\Pages;

use App\FilamentAdmin\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
