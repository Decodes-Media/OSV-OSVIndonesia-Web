<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('home.highlight_text1', 'Indonesian Heritage, Worldwide Vision.');
        $this->migrator->add('home.highlight_text2', '20 Years of Furniture Industry Experience.');
        $this->migrator->add('home.highlight_text3', 'Committed to Delivering Global Solutions.');
        $this->migrator->add('home.highlight_text4', 'Skilled Craftsmanship, High Quality Material.');
    }
};
