<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\UserController;



//--------------------------------------------------------------------------
// Web routes
//--------------------------------------------------------------------------
// start web routes

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});










//--------------------------------------------------------------------------
// Admin routes
//--------------------------------------------------------------------------

require __DIR__ . '/admin.php';
