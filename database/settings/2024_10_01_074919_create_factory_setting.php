<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $statsData = [
            [
                "stat_thumb" => "public/66fbb79c144f28z49OwkjDtk4VfphDIz9Vm7EzqIZg8OE3j6dOaY4.jpg",
                "stat_title" => "5,000 sqm",
                "state_desc" => "Factory spaces equipped with top-notch standards"
            ],
            [
                "stat_thumb" => "public/66fbb79c144f28z49OwkjDtk4VfphDIz9Vm7EzqIZg8OE3j6dOaY4.jpg",
                "stat_title" => "30+ Containers",
                "state_desc" => "Export containers annualy for hospitality project, custom made exported to project owners around the world"
            ],
            [
                "stat_thumb" => "public/66fbb79c144f28z49OwkjDtk4VfphDIz9Vm7EzqIZg8OE3j6dOaY4.jpg",
                "stat_title" => "100+ experts",
                "state_desc" => "We are continually enhancing our craftsmanship and dedicating our teams to deliver world-class quality."
            ]
        ];
        $this->migrator->add('factory.title', "We are commited to delivering global solutions to our clients");
        $this->migrator->add('factory.desc', "<p>Our furniture factory, located in Jepara—a renowned global hub for high-quality furniture materials—boasts state-of-the-art facilities designed to support our expert craftsmanship. We are committed to maintaining a top-notch factory environment that enables our skilled craftsmanship to create perfect furniture products tailored to our client's specifications</p>");
        $this->migrator->add('factory.sect1_thumbnail', "/img/AAK_4383.jpg");
        $this->migrator->add('factory.sect1_title', "CNC Machine");
        $this->migrator->add('factory.sect1_desc', "<p>We utilize advanced CNC (Computer Numerical Control) machines to achieve exceptional precision and efficiency in our production process. This cutting-edge technology ensures intricate detailing and consistent quality across all our furniture pieces. CNC machines enhance our ability to handle complex designs, speed up production, and maintain uniformity, allowing us to deliver innovative and high-quality furniture solutions tailored to our clients' needs</p>");
        $this->migrator->add('factory.sect2_thumbnail', "/img/AAK_4383.jpg");
        $this->migrator->add('factory.sect2_title', "Quality Control");
        $this->migrator->add('factory.sect2_desc', "<p>OSV always keep in mind that all products furnished is qualified the global standard and make sure to to it's product is save without any repairs needed.</p>");
        $this->migrator->add('factory.statistic_data', $statsData);
        $this->migrator->add('factory.cert_title', "Certifications");
        $this->migrator->add('factory.cert_desc', "<p>Our furniture manufacturing company proudly holds a legal wood certification, which guarantees that we source our raw materials responsibly and ethically. This certification not only signifies that we use high-quality wood but also ensures that all our materials are sourced legally and sustainably.</p>");
        $this->migrator->add('factory.cert_image1', "/img/AAK_4383.jpg");
        $this->migrator->add('factory.cert_image2', "/img/AAK_4383.jpg");
        $this->migrator->add('factory.cert_image3', "/img/AAK_4383.jpg");
        $this->migrator->add('factory.cert_image4', "/img/AAK_4383.jpg");
        $this->migrator->add('factory.cert_image5', "/img/AAK_4383.jpg");
    }
};
