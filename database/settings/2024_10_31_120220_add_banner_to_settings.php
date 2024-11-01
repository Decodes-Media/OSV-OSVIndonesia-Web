<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contactUs.banner', 'static/header-contact.jpg');
        $this->migrator->add('factory.banner', 'static/header-factory.jpg');
        $this->migrator->add('project.banner', 'static/header-projects.jpg');
    }
};
