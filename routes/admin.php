<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepartmentBranchController;
use App\Http\Controllers\Admin\DepartmentBranchStudentController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeadlineController;
use App\Http\Controllers\Admin\InternalAdController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WordController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\GroupController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\ServiceController;
//use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\UnitController;
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


    Route::get('logout', [LoginController::class, 'logout'])->name('logout');



    #### Users ####
    Route::resource('users', UserController::class)->except(['show']);
    Route::post('users.delete', [UserController::class, 'delete'])->name('users.delete');


    #### Admins ####
    Route::resource('admins', AdminController::class)->except(['show']);
    Route::post('admins.delete', [AdminController::class, 'delete'])->name('admins.delete');

    #### Deadline ####
    Route::resource('deadlines', DeadlineController::class);

    #### Setting ####
    Route::resource('settings', SettingController::class);

    #### Service ####
    Route::resource('services', ServiceController::class);

    #### departments ####
    Route::resource('departments', DepartmentController::class);

    #### sliders ####
    Route::resource('sliders', SliderController::class);

    #### pages ####
    Route::resource('pages', PageController::class);

    #### word ####
    Route::resource('word', WordController::class);

    #### branches ####
    Route::resource('branches', DepartmentBranchController::class);

    #### user branches ####
    Route::resource('userBranches', DepartmentBranchStudentController::class);
    Route::get('getBranches', [DepartmentBranchStudentController::class,'getBranches'])->name('getBranches');

    #### Internal Ads ####
    Route::resource('internal_ads', InternalAdController::class);
    Route::post('active_status', [InternalAdController::class, 'makeActive'])->name('makeActive');

    #### Video ####
    Route::resource('video', VideoController::class);

    #### Advertisement ####
    Route::resource('advertisements', AdvertisementController::class);

    #### Presentation ####
    Route::resource("presentations", PresentationController::class);

    #### Slider ####
    Route::resource('slider', SliderController::class);

    #### Group ####
    Route::resource('group', GroupController::class);

    ### Subject ####
    Route::resource('subject', SubjectController::class);

    #### Unit ####
    Route::resource('unit', UnitController::class);
});
