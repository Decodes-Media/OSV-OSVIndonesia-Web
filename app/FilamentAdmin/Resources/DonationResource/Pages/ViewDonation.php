<?php

namespace App\FilamentAdmin\Resources\DonationResource\Pages;

use App\FilamentAdmin\Resources\DonationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDonation extends ViewRecord
{
    protected static string $resource = DonationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
