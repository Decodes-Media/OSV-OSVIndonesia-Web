<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $contentData = [
            [
                "content_type" => "thumbnail",
                "content_youtube_url" => null,
                "content_thumbnail" => "static/AAK_4052.jpg",
                "content_title" => "CNC Machine",
                "content_desc" => "<p>We utilize advanced CNC (Computer Numerical Control) machines to achieve exceptional precision and efficiency in our production process. This cutting-edge technology ensures intricate detailing and consistent quality across all our furniture pieces. CNC machines enhance our ability to handle complex designs, speed up production, and maintain uniformity, allowing us to deliver innovative and high-quality furniture solutions tailored to our clients' needs</p>",
            ],
            [
                "content_type" => "thumbnail",
                "content_youtube_url" => null,
                "content_thumbnail" => "static/AAK_4362.jpg",
                "content_title" => "Quality Control",
                "content_desc" => "<p>OSV always keep in mind that all products furnished is qualified the global standard and make sure to to it's product is save without any repairs needed.</p>",
            ],
        ];
        $statsData = [
            [
                "stat_thumb" => "static/Factory.jpg",
                "stat_title" => "5,000 sqm",
                "state_desc" => "Factory spaces equipped with top-notch standards"
            ],
            [
                "stat_thumb" => "static/Containers.jpg",
                "stat_title" => "30+ Containers",
                "state_desc" => "Export containers annualy for hospitality project, custom made exported to project owners around the world"
            ],
            [
                "stat_thumb" => "static/Experts.jpg",
                "stat_title" => "100+ experts",
                "state_desc" => "We are continually enhancing our craftsmanship and dedicating our teams to deliver world-class quality."
            ]
        ];
        $this->migrator->add('factory.title', "We are commited to delivering global solutions to our clients");
        $this->migrator->add('factory.desc', "<p>Our furniture factory, located in Jepara—a renowned global hub for high-quality furniture materials—boasts state-of-the-art facilities designed to support our expert craftsmanship. We are committed to maintaining a top-notch factory environment that enables our skilled craftsmanship to create perfect furniture products tailored to our client's specifications</p>");
        $this->migrator->add('factory.content_data', $contentData);
        $this->migrator->add('factory.statistic_data', $statsData);
        $this->migrator->add('factory.cert_title', "Certifications");
        $this->migrator->add('factory.cert_desc', "<p>Our furniture manufacturing company proudly holds a legal wood certification, which guarantees that we source our raw materials responsibly and ethically. This certification not only signifies that we use high-quality wood but also ensures that all our materials are sourced legally and sustainably.</p>");
        $this->migrator->add('factory.cert_image1', "static/logo-svlk.png");
        $this->migrator->add('factory.cert_image2', null);
        $this->migrator->add('factory.cert_image3', null);
        $this->migrator->add('factory.cert_image4', null);
        $this->migrator->add('factory.cert_image5', null);
    }
};
