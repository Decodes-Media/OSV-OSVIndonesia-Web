<?php

namespace App\FilamentAdmin\Resources\PageResource\Pages;

use App\FilamentAdmin\Resources\PageResource;
use App\Models\Page;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewPage extends ViewRecord
{
    protected static string $resource = PageResource::class;

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
                    /** @var Page $record */
                    $record = $this->record;

                    if ($record->status == 'Published') {
                        $msg = 'Tidak bisa hapus halaman yang berstatus Published.';
                        Notification::make()->danger()->title($msg)->send();
                        $action->cancel();
                    }

                    if ($record->is_master) {
                        $msg = 'Tidak bisa hapus halaman master, diperlukan untuk web.';
                        Notification::make()->danger()->title($msg)->send();
                        $action->cancel();
                    }

                    $record->delete();
                    $action->success();
                }),
        ];
    }
}
