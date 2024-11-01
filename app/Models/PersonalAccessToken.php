<?php

namespace App\Models;

use Laravel\Sanctum\PersonalAccessToken as Model;

class PersonalAccessToken extends Model
{
    public function isExpired(): bool
    {
        return (bool) $this->expires_at?->lessThan(now());
    }
}
