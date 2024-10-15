<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Settings\ContactUsSetting;

class ContactUsController extends Controller
{
    public function index(): View
    {
        /** @var ContactUsSetting $setting */
        $setting = app(ContactUsSetting::class);

        return view('client.pages.contact-us', ['setting' => $setting]);
    }
}
