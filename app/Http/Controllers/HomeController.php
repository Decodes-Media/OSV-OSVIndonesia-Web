<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Client;

class HomeController extends Controller
{
    public function index(): View
    {
        $clients = Client::orderBy('order')->get();

        return view('client.pages.index', ['clients' => $clients]);
    }
}
