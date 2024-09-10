<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index'])
//     ->name('index');

Route::view('/', 'client.pages.index')
    ->name('home');

Route::view('/about-us', 'client.pages.about-us')
    ->name('about-us');

Route::get('halaman/{slug}', [PageController::class, 'view'])
    ->name('page.view');