<?php

// use Illuminate\Http\Request;
use App\Settings\SpecialitiesSetting;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('specialities/material-tags', function () {
    /** @var SpecialitiesSetting $setting */
    $setting = app(SpecialitiesSetting::class);
    return $setting->manufacture_metadata['material_tags_w3c_anotation'] ?: [];
})->name('api.specialities.material_tags_w3c_anotation');
