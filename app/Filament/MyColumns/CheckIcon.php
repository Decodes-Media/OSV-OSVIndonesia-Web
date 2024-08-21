<?php

namespace App\Filament\MyColumns;

use Filament\Tables\Columns\IconColumn;

class CheckIcon
{
    public static function make(string $name, string $label): IconColumn
    {
        return IconColumn::make($name)
            ->label($label)
            ->boolean()
            ->trueColor('primary')
            ->sortable()
            ->extraHeaderAttributes(['style' => 'width:48px']);
    }
}
