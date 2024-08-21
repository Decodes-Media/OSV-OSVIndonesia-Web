<?php

namespace App\Filament\MyColumns;

use Filament\Tables\Columns\TextColumn;

class UpdatedAt
{
    public static function make(): TextColumn
    {
        return TextColumn::make('updated_at')
            ->label(__('Updated at date'))
            ->formatStateUsing(fn ($state) => $state->translatedFormat('d M Y H:i'))
            ->sortable()
            ->toggleable(true, true);
    }
}
