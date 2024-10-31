<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.logo_white_path', 'static/logo-white.png');
        $this->migrator->add('site.logo_black_path', 'static/logo-black.png');
    }
};
