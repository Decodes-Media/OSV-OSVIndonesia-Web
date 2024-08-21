<?php

namespace App\FilamentAdmin\Resources\ProfileResource\Pages;

use App\FilamentAdmin\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfiles extends ListRecords
{
    protected static string $resource = ProfileResource::class;

    protected function getActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
