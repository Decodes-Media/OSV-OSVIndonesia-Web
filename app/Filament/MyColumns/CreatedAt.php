<?php

namespace App\Filament\MyColumns;

use Filament\Tables\Columns\TextColumn;

class CreatedAt
{
    public static function make(): TextColumn
    {
        return TextColumn::make('created_at')
            ->label(__('Created at date'))
            ->formatStateUsing(fn ($state) => $state->translatedFormat('d M Y H:i'))
            ->sortable()
            ->toggleable(true, true);
    }
}
