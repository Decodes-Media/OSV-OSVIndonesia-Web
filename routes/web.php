<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\ProjectController;
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

//Project Page
Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects');

//Factory Page
Route::get('/factory', [FactoryController::class, 'index'])
    ->name('factory');

Route::view('/specialities', 'client.pages.specialities')
    ->name('specialities');