<?php

namespace App\FilamentAdmin\Resources\AspirationResource\Pages;

use App\FilamentAdmin\Resources\AspirationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAspiration extends EditRecord
{
    protected static string $resource = AspirationResource::class;

    protected function getActions(): array
    {
        return [Actions\ViewAction::make()];
    }
}
