<?php

namespace App\FilamentAdmin\Resources\DonationResource\Pages;

use App\FilamentAdmin\Resources\DonationResource;
use Filament\Resources\Pages\ListRecords;

class ListDonations extends ListRecords
{
    protected static string $resource = DonationResource::class;
}
