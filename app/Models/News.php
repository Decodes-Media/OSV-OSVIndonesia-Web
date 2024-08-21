<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Parental\HasParent;

class News extends Page
{
    use HasFactory;
    use HasParent;

    public static string $type = News::class;

    public function getPublicUrlAttribute(): string
    {
        return route('news.view', ['slug' => urlencode($this->slug)]);
    }

    public function getCoverUrlAttribute(): string
    {
        return empty($this->cover_path)
            ? url('static/banner-3.webp')
            : public_url($this->cover_path);
    }
}
