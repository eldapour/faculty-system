<?php

use App\Http\Controllers\Admin\DeadlineController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\UserController;

<<<<<<< HEAD


//--------------------------------------------------------------------------
// Web routes
//--------------------------------------------------------------------------
=======
// start web routes
Route::get('/', function (){
    return view('welcome');
});


>>>>>>> 997268bca6eff765d939bd26174ec5026ca54708
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
<<<<<<< HEAD
=======

    Route::get('/admin/', function () {
        return view('admin.layouts.master');
    });

    #### Deadline ####
    Route::resource('deadlines', DeadlineController::class);

    #### Setting ####
    Route::resource('settings', SettingController::class);


    //Auth controller
//    Route::group([
//        'middleware' => ['check:student','auth']
//    ], function () {
    Route::resource('users',AuthController::class)->except(['show']);
    Route::post('users.delete',[AuthController::class,'delete'])->name('users.delete');
//    });


>>>>>>> 997268bca6eff765d939bd26174ec5026ca54708
});













//--------------------------------------------------------------------------
// Admin routes
//--------------------------------------------------------------------------

require __DIR__ . '/admin.php';
