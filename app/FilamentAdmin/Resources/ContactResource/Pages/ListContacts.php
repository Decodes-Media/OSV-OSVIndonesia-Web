<?php

namespace App\FilamentAdmin\Resources\ContactResource\Pages;

use App\FilamentAdmin\Resources\ContactResource;
use Filament\Resources\Pages\ListRecords;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;
}
