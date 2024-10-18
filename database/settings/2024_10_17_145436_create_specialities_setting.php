<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('specialities.banner', 'static/AAK_4061.jpg');
        $this->migrator->add('specialities.banner_title', 'We are commited to delivering global solutions to our clients');
        $this->migrator->add('specialities.banner_desc', '<p>Furniture brands, luxury villas, resorts, and urban living spaces, while fostering long-term partnerships.</p>');
        $this->migrator->add('specialities.project_title', 'Bespoke Hospitality Project');
        $this->migrator->add('specialities.project_desc', '<p>Our dreams are big, as big our capacity in furniture manufacturing your dream designs.</p><p>Just give us a brief with all the requirement needed for the product, and we would love to help You produce perfect furniture with your standard.</p>');
        $this->migrator->add('specialities.project_top_img1', 'static/product/chair-wood.jpg');
        $this->migrator->add('specialities.project_top_img2', 'static/product/chair-wood.jpg');
        $this->migrator->add('specialities.project_top_img3', 'static/product/chair-wood.jpg');
        $this->migrator->add('specialities.project_side_img1', 'static/product-1.jpg');
        $this->migrator->add('specialities.project_side_img2', 'static/product/chair-wood.jpg');
        $this->migrator->add('specialities.project_side_img3', 'static/product-1.jpg');
        $this->migrator->add('specialities.project_side_img4', 'static/product/chair-wood.jpg');
        $this->migrator->add('specialities.project_thumbnail1', 'static/AAK_4052.jpg');
        $this->migrator->add('specialities.project_thumbnail2', 'static/product/chair-wood.jpg');
        $this->migrator->add('specialities.product_title', 'White Label or ODM Products');
        $this->migrator->add('specialities.product_desc', '<p>See our collection with expert designers, choose and make it as your brand collections To keep the exclusivity of the product and your brand privacy, our collection can only seen offline in our factory.</p><p>We will pick you up And bring you down to see All the precious materials we have also see how Our craftsmanship make timeless furniture designs.</p>');
        $this->migrator->add('specialities.product_img1', 'static/product-1.jpg');
        $this->migrator->add('specialities.product_img2', 'static/product/chair-wood.jpg');
        $this->migrator->add('specialities.product_img3', 'static/AAK_4406.jpg');
        $this->migrator->add('specialities.product_img4', 'static/AAK_4392.jpg');
        $this->migrator->add('specialities.manufacture_title', 'OEM Manufacturer');
        $this->migrator->add('specialities.manufacture_desc', '<p>Our dreams are big, as big our capacity in furniture manufacturing your dream designs.</p><p>Just give us a brief with all the requirement needed for the product, and we would love to help You produce perfect furniture with your standard.</p>');
        $this->migrator->add('specialities.manufacture_img1', 'static/product-1.jpg');
        $this->migrator->add('specialities.manufacture_img2', 'static/product/chair-wood.jpg');
        $this->migrator->add('specialities.manufacture_thumbnail', 'static/AAK_4383.jpg');
        $this->migrator->add('specialities.manufacture_metadata', null);
    }
};
