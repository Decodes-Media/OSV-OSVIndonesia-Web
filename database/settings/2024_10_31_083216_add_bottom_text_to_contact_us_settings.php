<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contactUs.maps_bottom_text', '<p>
                Please schedule an appointment to visit our factory: <br>
                <a href="mailto:info@osvindonesia.com" target="_blank">info@osvindonesia.com</a>
            </p>');
    }
};
