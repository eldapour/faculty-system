<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// admin routes
require __DIR__ . '/admin.php';


// start web routes
// Route::get('/', function (){
//     return view('welcome');
// });

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    //Auth controller
//    Route::group([
//        'middleware' => ['check:student','auth']
//    ], function () {
    Route::resource('users',AuthController::class)->except(['show']);
    Route::post('users.delete',[AuthController::class,'delete'])->name('users.delete');
//    });



});

//$Grade->getTranslation('Name', 'en')
