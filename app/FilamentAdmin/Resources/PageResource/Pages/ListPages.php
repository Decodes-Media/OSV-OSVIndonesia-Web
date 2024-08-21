<?php

namespace App\FilamentAdmin\Resources\PageResource\Pages;

use App\FilamentAdmin\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    protected function getActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
