<?php

namespace App\FilamentAdmin\Resources\PageResource\Pages;

use App\FilamentAdmin\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\ViewAction::make('view-x')
                ->outlined()
                ->label('Kunjungi')
                ->url(fn ($livewire) => $livewire->record->public_url)
                ->openUrlInNewTab(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $user = filament_user();

        $record->update([
            'type' => $data['type'],
            'title' => $data['title'],
            'slug' => $data['slug'],
            'status' => $data['status'],
            'cover_path' => $data['cover_path'],
            'body' => $data['body'],
            'is_published' => $data['status'] == 'Published',
            'published_at' => $data['published_at'],
            'published_by' => $data['status'] == 'Published'
                ? $user->id : $record->published_by,
            'updated_by_id' => $user->id,
            'metadata' => [
                'seo_cover_path' => @$data['metadata']['seo_cover_path'],
                'seo_author' => @$data['metadata']['seo_author'],
                'seo_description' => @$data['metadata']['seo_description'],
                'seo_keywords' => @$data['metadata']['seo_keywords'],
            ],
        ]);

        return $record;
    }
}
