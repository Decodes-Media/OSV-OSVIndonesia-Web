<?php

namespace App\FilamentAdmin\Resources\NewsResource\Pages;

use App\FilamentAdmin\Resources\NewsResource;
use App\FilamentAdmin\Resources\PageResource\Pages\EditPage;
use Illuminate\Database\Eloquent\Model;

class EditNews extends EditPage
{
    protected static string $resource = NewsResource::class;

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
                'publisher_name' => @$data['metadata']['publisher_name'],
                'seo_cover_path' => @$data['metadata']['seo_cover_path'],
                'seo_author' => @$data['metadata']['seo_author'],
                'seo_description' => @$data['metadata']['seo_description'],
                'seo_keywords' => @$data['metadata']['seo_keywords'],
            ],
        ]);

        return $record;
    }
}
