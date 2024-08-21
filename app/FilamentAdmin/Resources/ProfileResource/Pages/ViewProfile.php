<?php

namespace App\FilamentAdmin\Resources\ProfileResource\Pages;

use App\FilamentAdmin\Resources\ProfileResource;
use App\Models\Profile;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewProfile extends ViewRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\ViewAction::make()
                ->label('Kunjungi')
                ->url(fn ($livewire) => $livewire->record->public_url)
                ->openUrlInNewTab(),
            Actions\DeleteAction::make()
                ->outlined()
                ->action(function (Actions\DeleteAction $action) {
                    //
                    /** @var Profile $record */
                    $record = $this->record;

                    if ($record->status == 'Published') {
                        $msg = 'Tidak bisa hapus profil yang berstatus Published.';
                        Notification::make()->danger()->title($msg)->send();
                        $action->cancel();
                    }

                    $record->delete();
                    $action->success();
                }),
        ];
    }
}
