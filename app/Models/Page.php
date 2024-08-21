<?php

namespace App\Models;

use App\Concerns\ModelDefaultActivityLogOptions;
use App\Concerns\ModelHasActiveState;
use App\Concerns\ModelHasCreatorEditor;
use App\Concerns\ModelHasSlug;
use App\Contracts\ModelWithLogActivity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Parental\HasChildren;
use Spatie\Activitylog\Traits\LogsActivity;

class Page extends Model implements ModelWithLogActivity
{
    use HasChildren;
    use HasUlids;
    use LogsActivity;
    use ModelDefaultActivityLogOptions;
    use ModelHasActiveState;
    use ModelHasCreatorEditor;
    use ModelHasSlug;

    public const STATUSES = [
        'Draft',
        'Published',
    ];

    protected $fillable = [
        'type',
        'title',
        'slug',
        'category',
        'status',
        'cover_path',
        'body',
        'excerpt',
        'is_published',
        'published_at',
        'published_by',
        'metadata',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'metadata' => 'json',
    ];

    public static string $type = Page::class;

    public function getIdentifiableAttribute(): string
    {
        return $this->title;
    }

    public function getLoggableAttributes(): array
    {
        return $this->fillable;
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)->where('status', 'Published');
    }

    public function getPreviousPublished(): ?Page
    {
        return static::published()->orderBy('published_at', 'desc')
            ->where('published_at', '<', $this->published_at)->first();
    }

    public function getNextPublished(): ?Page
    {
        return static::published()->orderBy('published_at', 'asc')
            ->where('published_at', '>', $this->published_at)->first();
    }

    public function getCoverUrlAttribute(): string
    {
        return empty($this->cover_path)
            ? url('static/banner-3.webp')
            : public_url($this->cover_path);
    }

    public function getPublicUrlAttribute(): string
    {
        return $this->is_master && @$this->metadata['route']
            ? route($this->metadata['route'])
            : route('page.view', ['slug' => $this->slug]);
    }

    public function getCreatorNameAttribute(): string
    {
        return $this->creator?->name ?: config('app.name');
    }

    public function getViewsCountStrAttribute(): string
    {
        return ribuan($this->views_count);
    }
}
