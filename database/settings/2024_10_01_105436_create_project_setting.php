<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('project.title', "Background Behind OSV");
        $this->migrator->add('project.desc', "<p>Start the dream in Bali, the founder was a client for the hospitality project in some regions. 20 years more in this furniture 
                    manufacturing industries we really know how prestige this industries should be.</p><p>Looking the real potential to bring all the ideas come alive there, we want to have the Indonesian furniture factory that having world class 
                    standard with perfectionist team that can direct all the unique designs becomes real.</p>");
    }
};
