<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('home.cta_background', 'static/CTA-banner-visit-factory.jpg');
        $this->migrator->add('home.cta_title', 'ARRANGE A VISIT TO THE OSV FACTORY');
        $this->migrator->add('home.cta_desc', '<p>Ready to see how we can bring your vision to life? Contact us to schedule a personalized tour.</p>');
        $this->migrator->add('home.cta_link_text', 'Get in Touch');
        $this->migrator->add('home.cta_link_url', url('contact-us'));
    }
};
