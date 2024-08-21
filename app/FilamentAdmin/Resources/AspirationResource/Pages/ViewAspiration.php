<?php

namespace App\FilamentAdmin\Resources\AspirationResource\Pages;

use App\FilamentAdmin\Resources\AspirationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAspiration extends ViewRecord
{
    protected static string $resource = AspirationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
