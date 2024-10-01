<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contactUs.catalog_cover', '/img/AAK_4059.jpg');
        $this->migrator->add('contactUs.company_document', '/img/AAK_4059.jpg');
        $this->migrator->add('contactUs.maps_title', 'OSV Indonesia Factory');
        $this->migrator->add('contactUs.maps_desc', '<p>Jalan Drago RT 08, RW 02,<br>
                Desa/Kelurahan Sinanggul, Kecamatan Mlonggo<br>
                Lab. Jepara - Jawa Tengah<br> 
                59452 - Indonesia
            </p>');
        $this->migrator->add('contactUs.maps_link', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1328.2803796507471!2d110.71430371934889!3d-6.540174947424431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7123dde697c459%3A0x43913a6fc8cca4a6!2sOSV%20Indonesia!5e0!3m2!1sen!2sid!4v1725967356547!5m2!1sen!2sid');
    }
};
