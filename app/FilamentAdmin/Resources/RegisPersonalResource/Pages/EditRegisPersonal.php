<?php

namespace App\FilamentAdmin\Resources\RegisPersonalResource\Pages;

use App\FilamentAdmin\Resources\RegisPersonalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegisPersonal extends EditRecord
{
    protected static string $resource = RegisPersonalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
