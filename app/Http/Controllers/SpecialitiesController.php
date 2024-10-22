<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Settings\SpecialitiesSetting;
use App\Models\Material;

class SpecialitiesController extends Controller
{
    public function index(): View
    {
        /** @var SpecialitiesSetting $setting */
        $setting = app(SpecialitiesSetting::class);

        $materialData = Material::all()->map(fn ($material) => [
            'name' => $material->name,
            'image' => public_url($material->image_path),
        ])->pluck('image', 'name')->toArray();

        return view('client.pages.specialities', ['setting' => $setting, 'material' => $materialData]);
    }
}
