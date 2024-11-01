<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.factory_text', "Factory");
        $this->migrator->add('site.factory_location_text', "Jepara - Indonesia");
        $this->migrator->add('site.factory_link', url('contact-us'));
        $this->migrator->add('site.office_text', "Office");
        $this->migrator->add('site.office_location_text', "Semarang - Indonesia");
        $this->migrator->add('site.office_link', url('contact-us'));
        $this->migrator->add('site.copyright', "©Copyright 2024. PT OSV Maju Bersama | All rights reserved.");
    }
};
