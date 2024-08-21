<?php

namespace App\FilamentAdmin\Resources\ProfileResource\Pages;

use App\FilamentAdmin\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getActions(): array
    {
        return [Actions\ViewAction::make()];
    }
}
