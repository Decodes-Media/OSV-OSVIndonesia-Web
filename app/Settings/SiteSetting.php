<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSetting extends Settings
{
    // Basic Info

    public string $name;

    public static function group(): string
    {
        return 'site';
    }
}
