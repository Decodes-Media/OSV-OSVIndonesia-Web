<?php

namespace App\FilamentAdmin\Resources\NewsResource\Pages;

use App\FilamentAdmin\Resources\NewsResource;
use App\FilamentAdmin\Resources\PageResource\Pages\CreatePage;
use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class CreateNews extends CreatePage
{
    protected static string $resource = NewsResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $user = filament_user();

        $page = Page::create([
            'type' => $data['type'],
            'title' => $data['title'],
            'slug' => $data['slug'],
            'status' => $data['status'],
            'cover_path' => $data['cover_path'],
            'body' => $data['body'],
            'is_published' => $data['status'] == 'Published',
            'published_at' => $data['status'] == 'Published' ? now() : null,
            'published_by' => $data['status'] == 'Published' ? $user->id : null,
            'created_by_id' => $user->id,
            'updated_by_id' => null,
            'metadata' => [
                'publisher_name' => @$data['metadata']['publisher_name'],
                'seo_cover_path' => @$data['metadata']['seo_cover_path'],
                'seo_author' => @$data['metadata']['seo_author'],
                'seo_description' => @$data['metadata']['seo_description'],
                'seo_keywords' => @$data['metadata']['seo_keywords'],
            ],
        ]);

        return $page;
    }
}
