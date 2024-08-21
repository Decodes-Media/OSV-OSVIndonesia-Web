<?php

namespace App\FilamentAdmin\Resources\MailingListResource\Pages;

use App\FilamentAdmin\Resources\MailingListResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMailingList extends ViewRecord
{
    protected static string $resource = MailingListResource::class;

    protected function getActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
