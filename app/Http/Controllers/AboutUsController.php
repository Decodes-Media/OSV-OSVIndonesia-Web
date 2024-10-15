<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Settings\AboutUsSetting;

class AboutUsController extends Controller
{
    public function index(): View
    {
        /** @var AboutUsSetting $setting */
        $setting = app(AboutUsSetting::class);

        return view('client.pages.about-us', ['setting' => $setting]);
    }
}
