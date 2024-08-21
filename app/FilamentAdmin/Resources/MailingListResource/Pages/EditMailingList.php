<?php

namespace App\FilamentAdmin\Resources\MailingListResource\Pages;

use App\FilamentAdmin\Resources\MailingListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMailingList extends EditRecord
{
    protected static string $resource = MailingListResource::class;

    protected function getActions(): array
    {
        return [Actions\ViewAction::make()];
    }
}
