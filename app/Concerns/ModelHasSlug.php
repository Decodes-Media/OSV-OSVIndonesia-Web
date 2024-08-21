<?php

namespace App\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait ModelHasSlug
{
    public static function bootModelHasSlug(): void
    {
        self::creating(fn (Model $record) => $record->slug = $record->slug ?: Str::slug($record));
    }
}
