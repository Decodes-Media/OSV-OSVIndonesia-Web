<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ContactUsSetting extends Settings
{
    public string $catalog_cover;
    public string $company_document;
    public string $maps_title;
    public string $maps_desc;
    public string $maps_link;

    public static function group(): string
    {
        return 'contactUs';
    }
}