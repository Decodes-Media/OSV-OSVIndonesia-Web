<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class FactorySetting extends Settings
{
    public string $title;
    public string $desc;
    // public string $sect1_thumbnail;
    // public string $sect1_title;
    // public string $sect1_desc;
    // public string $sect2_thumbnail;
    // public string $sect2_title;
    // public string $sect2_desc;
    public array $content_data;
    public array $statistic_data;
    public string $cert_title;
    public string $cert_desc;
    public string $cert_image1;
    public mixed $cert_image2;
    public mixed $cert_image3;
    public mixed $cert_image4;
    public mixed $cert_image5;

    public static function group(): string
    {
        return 'factory';
    }
}
