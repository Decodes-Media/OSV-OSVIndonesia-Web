<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Settings\FactorySetting;

class FactoryController extends Controller
{
    public function index(): View
    {
        /** @var FactorySetting $setting */
        $setting = app(FactorySetting::class);

        return view('client.pages.factory', ['setting' => $setting]);
    }
}
