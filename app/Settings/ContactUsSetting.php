<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ContactUsSetting extends Settings
{
    public string $banner;
    public string $catalog_cover;
    public string $company_document;
    public string $maps_title;
    public string $maps_desc;
    public string $maps_link;
    public string $maps_bottom_text;

    public static function group(): string
    {
        return 'contactUs';
    }
}