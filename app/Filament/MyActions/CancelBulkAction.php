<?php

namespace App\Filament\MyActions;

use Filament\Tables\Actions\BulkAction;

class CancelBulkAction
{
    public static function make(): BulkAction
    {
        return BulkAction::make('cancel-bulk-action')
            ->label(__('Cancel all selection'))
            ->icon('heroicon-o-x-circle')
            ->action(fn () => null)
            ->deselectRecordsAfterCompletion();
    }
}
