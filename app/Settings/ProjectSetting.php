<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ProjectSetting extends Settings
{
    public string $title;
    public string $desc;

    public static function group(): string
    {
        return 'project';
    }
}