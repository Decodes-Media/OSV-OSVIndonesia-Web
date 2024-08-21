<?php

namespace App\FilamentAdmin\Resources\MailingListResource\Pages;

use App\FilamentAdmin\Resources\MailingListResource;
use Filament\Resources\Pages\ListRecords;

class ListMailingLists extends ListRecords
{
    protected static string $resource = MailingListResource::class;
}
