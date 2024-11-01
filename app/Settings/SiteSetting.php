<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSetting extends Settings
{
    // Basic Info

    public string $name;
    public string $logo_white_path;
    public string $logo_black_path;
    public string $email;
    public string $social_instagram_name;
    public string $social_instagram_url;
    public string $social_linkedin_name;
    public string $social_linkedin_url;
    public string $privacy_policy;
    public string $term_conditions;
    public string $factory_text;
    public string $factory_location_text;
    public string $factory_link;
    public string $office_text;
    public string $office_location_text;
    public string $office_link;
    public string $copyright;

    public static function group(): string
    {
        return 'site';
    }
}
