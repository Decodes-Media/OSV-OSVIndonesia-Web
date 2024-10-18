<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\SpecialitiesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Home Page
Route::get('/', [HomeController::class, 'index'])
    ->name('index');

//About Us Page
Route::get('/about-us', [AboutUsController::class, 'index'])
    ->name('about-us');

//Contact Us Page
Route::get('/contact-us', [ContactUsController::class, 'index'])
    ->name('contact-us');

//Project Page
Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects');

//Factory Page
Route::get('/factory', [FactoryController::class, 'index'])
    ->name('factory');

//Specialities Page
Route::get('/specialities', [SpecialitiesController::class, 'index'])
    ->name('specialities');