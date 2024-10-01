<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('home.banner1', '/img/AAK_5650.jpg');
        $this->migrator->add('home.banner2', '/img/AAK_5650.jpg');
        $this->migrator->add('home.banner3', '/img/AAK_5650.jpg');
        $this->migrator->add('home.title', 'Bespoke Furniture Factory');
        $this->migrator->add('home.desc', '<p>Tailored to perfection, <br> brought to life with us.</p>');
        $this->migrator->add('home.video', '/img/AAK_5650.jpg');
        $this->migrator->add('home.manufacture_thumb1', '/img/AAK_5650.jpg');
        $this->migrator->add('home.manufacture_title1', 'Hospitality Project');
        $this->migrator->add('home.manufacture_desc1', 'Create unforgettable guest experiences with our bespoke furniture solutions. Benefit from our extensive experience in crafting premium furniture that complements your hospitality projects, anywhere in the world.');
        $this->migrator->add('home.manufacture_link1', '#');
        $this->migrator->add('home.manufacture_thumb2', '/img/AAK_5650.jpg');
        $this->migrator->add('home.manufacture_title2', 'OEM Manufacturer');
        $this->migrator->add('home.manufacture_desc2', 'Experience the power of OEM manufacturing with our commitment to delivering exceptional quality and unparalleled customization.');
        $this->migrator->add('home.manufacture_link2', '#');
        $this->migrator->add('home.manufacture_thumb3', '/img/AAK_5650.jpg');
        $this->migrator->add('home.manufacture_title3', 'White Label, ODM Products');
        $this->migrator->add('home.manufacture_desc3', 'Benefit from our extensive manufacturing capabilities and global reach, delivering exceptional products that enhance your brand identity');
        $this->migrator->add('home.manufacture_link3', '#');

        $this->migrator->add('home.marquee_title', 'Crafting, Bespoked, Excellence');
        $this->migrator->add('home.marquee_bg_text', 'We will help you create luxury furniture and scale your future projects •');

        $this->migrator->add('home.factory_thumb', '/img/AAK_5650.jpg');
        $this->migrator->add('home.factory_desc', 'Having started as a client ourselves, we do understand the expectations. We craft high-quality furniture and ensure timely delivery with the expertise of our team.');
        $this->migrator->add('home.factory_link', '#');

        $supportImg = [
            [
                "img" => "public/66fbb79c144f28z49OwkjDtk4VfphDIz9Vm7EzqIZg8OE3j6dOaY4.jpg",
                "alt" => "Alt 1",
            ],
            [
                "img" => "public/66fbb79c144f28z49OwkjDtk4VfphDIz9Vm7EzqIZg8OE3j6dOaY4.jpg",
                "alt" => "Alt 2",
            ],
        ];

        $this->migrator->add('home.support_image', $supportImg);
    }
};
