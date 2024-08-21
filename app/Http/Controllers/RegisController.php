<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RegisController extends Controller
{
    public function personal(): View
    {
        return view('client.pages.regis-personal');
    }
}
