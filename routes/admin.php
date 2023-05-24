<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeadlineController;
use App\Http\Controllers\Admin\InternalAdController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/do-login', [LoginController::class, 'login'])->name('login');
});

Route::group([
    'prefix' => LaravelLocalization::setLocale() . '/admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
], function () {

    ###################### Category #############################
    Route::resource('categories', CategoryController::class);

    Route::get('/', function () {
        return view('admin.layouts.master');
    })->name('admin.home');


    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::resource('users', UserController::class)->except(['show']);
    Route::post('users.delete', [UserController::class, 'delete'])->name('users.delete');




    #### Deadline ####
    Route::resource('deadlines', DeadlineController::class);

    #### Setting ####
    Route::resource('settings', SettingController::class);

    #### Service ####
    Route::resource('services', ServiceController::class);

    #### Internal Ads ####
    Route::resource('internal_ads', InternalAdController::class);


  
});
