<?php

namespace App\Filament\MyFilters;

use Filament\Tables\Filters\TernaryFilter;

class TernaryActiveStatusFilter
{
    public static function make(): TernaryFilter
    {
        return TernaryFilter::make('f-active-status')
            ->label(__('Active status'))
            ->attribute('is_active')
            ->trueLabel(__('Active'))
            ->falseLabel(__('Inactive'));
    }
}
