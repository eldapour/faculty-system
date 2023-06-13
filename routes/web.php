<?php

use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\DeanSpeechController;
use App\Http\Controllers\Front\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Front\PresentationController;
use App\Http\Controllers\Front\HomeWebController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\TimeUsesController;


require __DIR__ . '/admin.php';


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 'namespace' => 'front',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        #### Home ####
        Route::get('/', [HomeWebController::class, 'index'])->name('/');

        #### College ####
        Route::group(['prefix' => 'college'], function () {
            Route::get('presentation', [PresentationController::class, 'index'])->name('index.presentation');
            Route::get('dean_speech', [DeanSpeechController::class, 'index'])->name('dean_speech.index');
            Route::get('page/{page}', [PageController::class, 'page'])->name('page');
        });

        #### Blog ####
        Route::group(['prefix' => 'blog'], function () {
            Route::get('new_blog', [BlogController::class, 'index'])->name('index.new_blog');
            Route::get('new_blog/{id}', [BlogController::class, 'blogItem'])->name('blog');
            Route::get('event', [EventController::class, 'index'])->name('index.event');
            Route::get('event/{id}', [EventController::class, 'eventItem'])->name('event');
        });

        #### Study Progress ####
        Route::group(['prefix' => 'study_progress'], function () {
            Route::get('time_uses', [TimeUsesController::class, 'index'])->name('index.time_uses');
        });
    }
);
