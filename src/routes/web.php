<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});


// Frontend Routes  Start Here

Route::get('/', [UrlController::class, 'index'])->name('index');
Route::post('/submit-urls', [UrlController::class, 'store'])->name('submit.urls');
