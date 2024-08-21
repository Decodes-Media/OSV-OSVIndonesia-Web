<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;
    use HasUlids;

    public const STATUSES = [
        'Draft',
        'Published',
    ];

    protected $fillable = [
        'name',
        'title',
        'photo_path',
        'about',
        'status',
        'is_published',
        'published_at',
        'published_by',
        'views_count',
        'internal_note',
        'metadata',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'metadata' => 'json',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'published_by');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->where('status', 'Published');
    }

    public function getPhotoUrlAttribute(): string
    {
        return empty($this->photo_path)
            ? url('static/logo.webp') // TODO: change me
            : public_url($this->photo_path);
    }

    public function getPublicUrlAttribute(): string
    {
        return route('profile.view', ['slug' => $this->slug]);
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
