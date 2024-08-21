<?php

namespace App\FilamentAdmin\Resources\NewsResource\Pages;

use App\FilamentAdmin\Resources\NewsResource;
use App\FilamentAdmin\Resources\PageResource\Pages\ViewPage;
use App\Models\News;
use Filament\Actions;
use Filament\Notifications\Notification;

class ViewNews extends ViewPage
{
    protected static string $resource = NewsResource::class;

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
                    /** @var News $record */
                    $record = $this->record;

                    if ($record->status == 'Published') {
                        $msg = 'Tidak bisa hapus berita yang berstatus Published.';
                        Notification::make()->danger()->title($msg)->send();
                        $action->cancel();
                    }

                    $record->delete();
                    $action->success();
                }),
        ];
    }
}
