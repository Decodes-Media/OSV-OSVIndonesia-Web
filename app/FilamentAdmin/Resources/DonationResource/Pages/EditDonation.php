<?php

namespace App\FilamentAdmin\Resources\DonationResource\Pages;

use App\FilamentAdmin\Resources\DonationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDonation extends EditRecord
{
    protected static string $resource = DonationResource::class;

    protected function getActions(): array
    {
        return [Actions\ViewAction::make()];
    }
}
