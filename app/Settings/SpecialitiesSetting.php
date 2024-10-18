<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SpecialitiesSetting extends Settings
{
    public string $banner;
    public string $banner_title;
    public string $banner_desc;
    public string $project_title;
    public string $project_desc;
    public string $project_top_img1;
    public string $project_top_img2;
    public string $project_top_img3;
    public string $project_side_img1;
    public string $project_side_img2;
    public string $project_side_img3;
    public string $project_side_img4;
    public string $project_thumbnail1;
    public string $project_thumbnail2;
    public string $product_title;
    public string $product_desc;
    public string $product_img1;
    public string $product_img2;
    public string $product_img3;
    public string $product_img4;
    public string $manufacture_title;
    public string $manufacture_desc;
    public string $manufacture_img1;
    public string $manufacture_img2;
    public string $manufacture_thumbnail;
    public mixed $manufacture_metadata;

    public static function group(): string
    {
        return 'specialities';
    }
}