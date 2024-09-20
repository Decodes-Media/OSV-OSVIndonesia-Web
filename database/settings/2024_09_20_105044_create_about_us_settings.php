<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('aboutUs.banner', '/img/AAK_5650.jpg');
        $this->migrator->add('aboutUs.banner_title', 'Background Behind OSV');
        $this->migrator->add('aboutUs.banner_desc', '<p>Start the dream in Bali, the founder was a client for the hospitality project in some regions. 
           20 years more in this furniture manufacturing industries we really know how prestige this industries should be.</p>
           <p>Looking the real potential to bring all the ideas come alive there, we want to have the Indonesian furniture factory that having world class standard with perfectionist team that can direct all the unique designs becomes real.</p>');
        $this->migrator->add('aboutUs.fb_thumbnail1', '/img/service/service-1.png');
        $this->migrator->add('aboutUs.fb_title1', 'Timeless Design');
        $this->migrator->add('aboutUs.fb_desc1', 'We always keep up with the trend and Partner with designers around the world');
        $this->migrator->add('aboutUs.fb_thumbnail2', '/img/service/service-1.png');
        $this->migrator->add('aboutUs.fb_title2', 'Unique Techniques');
        $this->migrator->add('aboutUs.fb_desc2', 'We always keep up with the trend and Partner with designers around the world');
        $this->migrator->add('aboutUs.fb_thumbnail3', '/img/service/service-1.png');
        $this->migrator->add('aboutUs.fb_title3', 'Precious Materials');
        $this->migrator->add('aboutUs.fb_desc3', 'We always keep up with the trend and Partner with designers around the world');
        $this->migrator->add('aboutUs.fb_thumbnail4', '/img/service/service-1.png');
        $this->migrator->add('aboutUs.fb_title4', 'Expert Talents');
        $this->migrator->add('aboutUs.fb_desc4', 'We always keep up with the trend and Partner with designers around the world');
        $this->migrator->add('aboutUs.sect1_thumbnail', '/img/AAK_4383.jpg');
        $this->migrator->add('aboutUs.sect1_title', 'Our Own Factory');
        $this->migrator->add('aboutUs.sect1_desc', '<p>OSV established its first furniture factory in Jepara. We adhere to the highest standards of craftsmanship and source prestigious materials in Indonesia, which are renowned worldwide for their excellence in furniture.</p>');
        $this->migrator->add('aboutUs.sect2_thumbnail', '/img/AAK_4052.jpg');
        $this->migrator->add('aboutUs.sect2_title', "What's Next");
        $this->migrator->add('aboutUs.sect2_desc', '<p>As we expand, we have grown our team and opened a second office in Semarang. We are also developing a new showroom and look forward to showcasing it to you soon.</p>');      
    }
};
