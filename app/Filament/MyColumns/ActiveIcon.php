<?php

namespace App\Filament\MyColumns;

use Filament\Tables\Columns\IconColumn;

class ActiveIcon
{
    public static function make(): IconColumn
    {
        return CheckIcon::make('is_active', __('Active'));
    }
}
