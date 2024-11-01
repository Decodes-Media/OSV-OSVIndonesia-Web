<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomeSetting extends Settings
{
    public array $banner_data;
    public string $title;
    public string $desc;
    public string $video;
    public string $highlight_text1;
    public string $highlight_text2;
    public string $highlight_text3;
    public string $highlight_text4;
    public string $manufacture_thumb1;
    public string $manufacture_title1;
    public string $manufacture_desc1;
    public string $manufacture_link1;
    public string $manufacture_thumb2;
    public string $manufacture_title2;
    public string $manufacture_desc2;
    public string $manufacture_link2;
    public string $manufacture_thumb3;
    public string $manufacture_title3;
    public string $manufacture_desc3;
    public string $manufacture_link3;
    public string $marquee_title;
    public string $marquee_bg_text;
    public string $factory_type;
    public mixed $factory_thumbnail;
    public mixed $factory_youtube_url;
    public string $factory_title;
    public string $factory_desc;
    public string $factory_link;
    public array $support_image;
    public string $cta_background;
    public string $cta_title;
    public string $cta_desc;
    public string $cta_link_text;
    public string $cta_link_url;

    public static function group(): string
    {
        return 'home';
    }
}
