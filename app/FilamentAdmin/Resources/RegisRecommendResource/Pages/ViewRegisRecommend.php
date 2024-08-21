<?php

namespace App\FilamentAdmin\Resources\RegisRecommendResource\Pages;

use App\FilamentAdmin\Resources\RegisRecommendResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRegisRecommend extends ViewRecord
{
    protected static string $resource = RegisRecommendResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
