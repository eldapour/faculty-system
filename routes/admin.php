<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\LanguageController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your Admin Panel. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::POST('login', [AuthController::class, 'login'])->name('admin.login');
    });

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        // Admin Route
        Route::resource('admin/', AdminController::class);

        #### roles ####
        Route::group(['middleware' => 'permission:الادوار و الصلاحيات'], function () {
            Route::resource('roles', RoleController::class);
            Route::POST('delete_roles', [RoleController::class, 'delete'])->name('delete_roles');
        });
    });
});
