<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Client;
use App\Settings\HomeSetting;

class HomeController extends Controller
{
    public function index(): View
    {
        $clients = Client::orderBy('order')->get();

        /** @var HomeSetting $setting */
        $setting = app(HomeSetting::class);

        return view('client.pages.index', ['clients' => $clients, 'setting' => $setting]);
    }
}
