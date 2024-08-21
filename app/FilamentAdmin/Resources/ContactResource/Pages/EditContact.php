<?php

namespace App\FilamentAdmin\Resources\ContactResource\Pages;

use App\FilamentAdmin\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;

    protected function getActions(): array
    {
        return [Actions\ViewAction::make()];
    }
}
