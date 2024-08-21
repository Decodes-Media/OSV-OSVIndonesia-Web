<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use KodePandai\Indonesia\IndonesiaDatabaseSeeder as Seeder;

class IndonesiaDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->seedProvinces();
        $this->seedCities();
        $this->seedDistricts();
        // $this->seedVillages();

        Schema::enableForeignKeyConstraints();
    }
}
