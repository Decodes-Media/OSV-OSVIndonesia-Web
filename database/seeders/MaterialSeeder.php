<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Material::create([
            'name' => 'Elegance Joinery',
            'image_path' => 'static/project_top_img3.avif',
        ]);

        Material::create([
            'name' => 'Precision Fit',
            'image_path' => 'static/project_top_img1.JPG',
        ]);

        Material::create([
            'name' => 'Soft Fabric',
            'image_path' => 'static/project_top_img2.png',
        ]);

        Material::create([
            'name' => 'Solid Teak Wood',
            'image_path' => 'static/project_top_img3.avif',
        ]);
    }
}
