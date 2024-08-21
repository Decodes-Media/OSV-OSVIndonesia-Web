<?php

namespace App\Filament\MyForms;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;

class CreatorEditorPlaceholder
{
    public static function make(): Section
    {
        return Section::make()
            ->columns(4)
            ->visibleOn(['view'])
            ->extraAttributes(['class' => 'bg-gray-100'])
            ->schema([
                Placeholder::make(__('Created at'))
                    ->content(fn ($record) => $record->created_at),
                Placeholder::make(__('Created by'))
                    ->content(fn ($record) => $record->creator?->name ?: '-'),
                Placeholder::make(__('Updated at'))
                    ->content(fn ($record) => $record->updated_at),
                Placeholder::make(__('Updated by'))
                    ->content(fn ($record) => $record->editor?->name ?: '-'),
            ]);
    }
}
