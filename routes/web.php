<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('index');

// Route::view('/', 'client.pages.index')
//     ->name('home');

Route::view('/about-us', 'client.pages.about-us')
    ->name('about-us');

Route::view('/contact-us', 'client.pages.contact-us')
    ->name('contact-us');

Route::view('/projects', 'client.pages.projects')
    ->name('projects');

Route::view('/factory', 'client.pages.factory')
    ->name('factory');

Route::view('/specialities', 'client.pages.specialities')
    ->name('specialities');