<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Settings\SpecialitiesSetting;

class SpecialitiesController extends Controller
{
    public function index(): View
    {
        /** @var SpecialitiesSetting $setting */
        $setting = app(SpecialitiesSetting::class);

        return view('client.pages.specialities', ['setting' => $setting]);
    }
}
