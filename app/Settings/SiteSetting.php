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

    public string $social_tiktok_name;

    public string $social_tiktok_url;

    // Page: Home

    public string $home_banner_title;

    public string $home_banner_subtitle;

    public string $home_banner_path;

    public array $home_features;

    public string $home_aspiration_title;

    public string $home_register_title;

    public string $home_register_subtitle;

    public string $home_register_btn_left;

    public string $home_register_btn_right;

    public string $home_survey_banner_path;

    public string $home_survey_text;

    public string $home_survey_cta_url;

    public string $home_survey_cta_title;

    public bool $home_survey_cta_newtab;

    // Page: Register

    public string $register_personal_title;

    public string $register_personal_subtitle;

    public string $register_recommend_title;

    public string $register_recommend_subtitle;

    public array $register_recommend_affiliations;

    // Page: About

    public string $about_intro_title;

    public string $about_intro_content;

    public string $about_feat_title;

    public array $about_feat_sections;

    public string $about_vision;

    public string $about_mission;

    // Page: Profile

    public string $profile_title;

    public array $profile_featured_ids;

    // Page: Program

    public string $program_register_title;

    public string $program_register_subtitle;

    public string $program_register_btn_left;

    public string $program_register_btn_right;

    // Page: Partnership

    public string $partner_main_title;

    public string $partner_main_subtitle;

    // Page: Article

    public int $article_perpage;

    // Page: Donation

    public string $donation_main_title;

    public string $donation_main_subtitle;

    // Global: Forms

    public array $form_regis_personal_occupancies;

    public array $form_regis_personal_affiliations;

    public array $form_regis_recommend_affiliations;

    // Global: Donation

    public string $section_donate_title;

    public array $section_donate_options;

    // Global: Mailing List

    public string $section_mailing_title;

    public string $section_mailing_subtitle;

    public string $section_mailing_terms;

    // Default SEO

    public array $seo_default;

    public static function group(): string
    {
        return 'site';
    }
}
