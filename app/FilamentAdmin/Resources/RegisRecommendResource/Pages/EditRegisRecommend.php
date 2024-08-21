<?php

namespace App\FilamentAdmin\Resources\RegisRecommendResource\Pages;

use App\FilamentAdmin\Resources\RegisRecommendResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegisRecommend extends EditRecord
{
    protected static string $resource = RegisRecommendResource::class;

    protected function getActions(): array
    {
        return [Actions\ViewAction::make()];
    }
}
