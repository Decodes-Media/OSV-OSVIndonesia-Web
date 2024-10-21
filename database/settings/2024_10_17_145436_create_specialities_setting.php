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
        $this->migrator->add('specialities.project_desc', '<p>At OSV, we specialize in bespoke furniture manufacturing, turning your vision into reality with precision and care. Our passion is creating custom furniture that reflects your unique ideas, blending functionality with design excellence. With a seamless process and a commitment to craftsmanship, we can bring even the most complex designs to life.</p><p>Simply provide us with a brief detailing your product requirements, including materials, dimensions, and design preferences. From there, our expert team will collaborate with you every step of the way to ensure the final product aligns perfectly with your expectations. Whether for hotels, resorts, residences, or commercial spaces, we are dedicated to producing furniture that meets your standards—down to the finest detail. At OSV, your dream designs are in capable hands.</p>');
        $this->migrator->add('specialities.project_top_img1', 'static/project_top_img1.JPG');
        $this->migrator->add('specialities.project_top_img2', 'static/project_top_img2.png');
        $this->migrator->add('specialities.project_top_img3', 'static/project_top_img3.avif');
        $this->migrator->add('specialities.project_side_img1', 'static/project_side_img1.JPG');
        $this->migrator->add('specialities.project_side_img2', 'static/project_side_img2.JPG');
        $this->migrator->add('specialities.project_side_img3', 'static/project_side_img3.JPG');
        $this->migrator->add('specialities.project_side_img4', 'static/project_side_img4.JPG');
        $this->migrator->add('specialities.project_thumbnail1', 'static/project_thumbnail1.jpg');
        $this->migrator->add('specialities.project_thumbnail2', 'static/project_thumbnail2.JPG');
        $this->migrator->add('specialities.product_title', 'White Label or ODM Products');
        $this->migrator->add('specialities.product_desc', '<p>We offer a curated collection of our own furniture products, including dining chairs, tables, and more. Designed by expert craftsmen and inspired by timeless aesthetics, these pieces are perfect for businesses looking to enhance their brand with exclusive furniture collections. Our products reflect the same high standards of quality and design that define everything we create. You can choose from our designs and make them part of your own brand collections, allowing you to offer beautiful, ready-made products under your own name.</p><p>To maintain the exclusivity of both our designs and your brand privacy, our full collection is available to view only offline at our showroom or factory in Jepara. We invite you to visit us for a closer look at our materials and see firsthand how our skilled craftsmen bring each piece to life. At OSV, we aim to offer not just furniture but a truly immersive and exclusive design experience.</p>');
        $this->migrator->add('specialities.product_img1', 'static/product_img1.jpg');
        $this->migrator->add('specialities.product_img2', 'static/product_img2.jpg');
        $this->migrator->add('specialities.product_img3', 'static/product_img3.jpeg');
        $this->migrator->add('specialities.product_img4', 'static/product_img4.jpeg');
        $this->migrator->add('specialities.manufacture_title', 'OEM Manufacturer');
        $this->migrator->add('specialities.manufacture_desc', '<p>We take pride in being a trusted OEM (Original Equipment Manufacturer) partner, turning your designs into high-quality furniture products. With our extensive production capacity and expertise, we are equipped to meet the demands of various industries, including hospitality, residential, and commercial sectors. Our goal is to bring your dream designs to life with precision, delivering products that align perfectly with your brand’s vision and standards.</p><p>Just provide us with a detailed brief, including product specifications, materials, and design preferences, and our skilled team will handle the rest, from prototyping to large-scale production. Whether you need a single product line or a full furniture collection, we’re committed to producing pieces that reflect your brand’s identity and meet your expectations for quality and craftsmanship. At OSV, we don’t just manufacture furniture; we manufacture your vision, delivering tailor-made solutions with excellence at every stage.</p>');
        $this->migrator->add('specialities.manufacture_img1', 'static/manufacture_guideline.png');
        $this->migrator->add('specialities.manufacture_img2', 'static/manufacture_material.png');
        $this->migrator->add('specialities.manufacture_thumbnail', 'static/manufacture_thumbnail.png');
        $this->migrator->add('specialities.manufacture_metadata', null);
    }
};
