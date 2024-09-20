<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AboutUsSetting extends Settings
{
    public string $banner;
    public string $banner_title;
    public string $banner_desc;
    public string $fb_thumbnail1;
    public string $fb_title1;
    public string $fb_desc1;
    public string $fb_thumbnail2;
    public string $fb_title2;
    public string $fb_desc2;
    public string $fb_thumbnail3;
    public string $fb_title3;
    public string $fb_desc3;
    public string $fb_thumbnail4;
    public string $fb_title4;
    public string $fb_desc4;
    public string $sect1_thumbnail;
    public string $sect1_title;
    public string $sect1_desc;
    public string $sect2_thumbnail;
    public string $sect2_title;
    public string $sect2_desc;

    public static function group(): string
    {
        return 'aboutUs';
    }
}