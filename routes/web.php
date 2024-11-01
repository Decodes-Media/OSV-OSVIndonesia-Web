<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\SpecialitiesController;
use App\Http\Controllers\DownloadDocumentController;
use Illuminate\Support\Facades\Route;

//Home Page
Route::get('/', [HomeController::class, 'index'])
    ->name('index');

//About Us Page
Route::get('/about-us', [AboutUsController::class, 'index'])
    ->name('about-us');

//Contact Us Page
Route::controller(ContactUsController::class)->prefix('contact-us')->group(function () {
    Route::get('/', 'index')->name('contact-us');
    Route::post('/store', 'store')->name('contact-us.store');
});

Route::post('/download-document/store', [DownloadDocumentController::class, 'store'])->name('company-document-downloads');

//Project Page
Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects');

//Factory Page
Route::get('/factory', [FactoryController::class, 'index'])
    ->name('factory');

//Specialities Page
Route::get('/specialities', [SpecialitiesController::class, 'index'])
    ->name('specialities');