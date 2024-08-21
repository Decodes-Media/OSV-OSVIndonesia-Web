<?php

namespace App\FilamentAdmin\Resources\RegisPersonalResource\Pages;

use App\FilamentAdmin\Resources\RegisPersonalResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRegisPersonal extends ViewRecord
{
    protected static string $resource = RegisPersonalResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
