<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $bannerData = [
            [
                'banner' => 'static/banner/banner-1.jpeg',
                'alt' => 'banner 1',
            ],
            [
                'banner' => 'static/banner/banner-2.png',
                'alt' => 'banner 2',
            ],
            [
                'banner' => 'static/banner/banner-3.png',
                'alt' => 'banner 3',
            ],
            [
                'banner' => 'static/banner/banner-4.png',
                'alt' => 'banner 4',
            ],
            [
                'banner' => 'static/banner/banner-5.png',
                'alt' => 'banner 5',
            ],
            [
                'banner' => 'static/banner/banner-6.jpg',
                'alt' => 'banner 6',
            ],
            [
                'banner' => 'static/banner/banner-7.jpg',
                'alt' => 'banner 7',
            ],
        ];
        
        $this->migrator->add('home.banner_data', $bannerData);
        $this->migrator->add('home.title', 'Bespoke Furniture Factory');
        $this->migrator->add('home.desc', 'Tailored to perfection, brought to life with us.');
        $this->migrator->add('home.video', 'static/videoplayback2.mp4');
        $this->migrator->add('home.manufacture_thumb1', 'static/OSV-Bespoke-Project.jpg');
        $this->migrator->add('home.manufacture_title1', 'Hospitality Project');
        $this->migrator->add('home.manufacture_desc1', 'Create unforgettable guest experiences with our bespoke furniture solutions. Benefit from our extensive experience in crafting premium furniture that complements your hospitality projects, anywhere in the world.');
        $this->migrator->add('home.manufacture_link1', '#');
        $this->migrator->add('home.manufacture_thumb2', 'static/OSV-OEM-Product.jpg');
        $this->migrator->add('home.manufacture_title2', 'OEM Manufacturer');
        $this->migrator->add('home.manufacture_desc2', 'Experience the power of OEM manufacturing with our commitment to delivering exceptional quality and unparalleled customization.');
        $this->migrator->add('home.manufacture_link2', '#');
        $this->migrator->add('home.manufacture_thumb3', 'static/OSV-Luxury-Furniture.jpg');
        $this->migrator->add('home.manufacture_title3', 'White Label, ODM Products');
        $this->migrator->add('home.manufacture_desc3', 'Benefit from our extensive manufacturing capabilities and global reach, delivering exceptional products that enhance your brand identity');
        $this->migrator->add('home.manufacture_link3', '#');

        $this->migrator->add('home.marquee_title', 'Crafting, Bespoked, Excellence');
        $this->migrator->add('home.marquee_bg_text', 'We will help you create luxury furniture and scale your future projects •');

        $this->migrator->add('home.factory_type', 'thumbnail');
        $this->migrator->add('home.factory_youtube_url', null);
        $this->migrator->add('home.factory_thumbnail', 'static/section-furniture-factory.png');
        $this->migrator->add('home.factory_title', 'Our Furniture Manufacturing Factory');
        $this->migrator->add('home.factory_desc', 'Having started as a client ourselves, we do understand the expectations. We craft high-quality furniture and ensure timely delivery with the expertise of our team.');
        $this->migrator->add('home.factory_link', '#');

        $supportImg = [
            [
                "img" => "static/product/chair-wood.jpg",
                "alt" => "Chair Wood",
            ],
            [
                "img" => "static/product/dining-chair-outdoor.jpg",
                "alt" => "Dining Chair Outdoor",
            ],
            [
                "img" => "static/product/dining-chair-rattan.jpg",
                "alt" => "Dining Chair Rattan",
            ],
            [
                "img" => "static/product/outdoor-sofa-mix.jpg",
                "alt" => "Outdoor Sofa Mix",
            ],
            [
                "img" => "static/product/round-table-stone.jpg",
                "alt" => "Round Table Stone",
            ],
            [
                "img" => "static/product/round-table-wood.jpg",
                "alt" => "Round Table Wood",
            ],
            [
                "img" => "static/product/side-table-wood.jpg",
                "alt" => "Side Table Wood",
            ],
        ];

        $this->migrator->add('home.support_image', $supportImg);
    }
};
