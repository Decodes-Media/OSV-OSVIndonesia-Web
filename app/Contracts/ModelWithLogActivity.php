<?php

namespace App\Contracts;

use Spatie\Activitylog\LogOptions;

interface ModelWithLogActivity
{
    public function getActivitylogOptions(): LogOptions;

    public function getIdentifiableAttribute(): string;

    public function getLoggableAttributes(): array;
}
