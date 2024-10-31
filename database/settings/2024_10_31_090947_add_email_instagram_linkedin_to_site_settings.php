<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.email','sambas@osventuresindo.com');
        $this->migrator->add('site.social_instagram_name','@osvindonesia');
        $this->migrator->add('site.social_instagram_url','https://www.instagram.com/osvinternational');
        $this->migrator->add('site.social_linkedin_name','OSV Indonesia');
        $this->migrator->add('site.social_linkedin_url','https://www.linkedin.com/company/osvinternational/');
    }
};
