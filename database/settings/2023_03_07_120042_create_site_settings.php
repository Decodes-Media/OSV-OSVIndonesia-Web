<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $fnNoSpaces = fn ($x) => preg_replace('/\s+/', ' ', $x);

        // Basic Info

        $this->migrator->add(
            'site.name',
            config('app.name'),
        );
    }
};
