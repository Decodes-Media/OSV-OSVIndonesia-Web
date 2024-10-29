<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Settings\AboutUsSetting;
use App\Settings\HomeSetting;

class AboutUsController extends Controller
{
    public function index(): View
    {
        /** @var AboutUsSetting $setting */
        $setting = app(AboutUsSetting::class);
        $homesetting = app(HomeSetting::class);

        return view('client.pages.about-us', ['setting' => $setting], ['homesetting' => $homesetting]);
    }
}
