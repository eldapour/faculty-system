<?php

use App\Http\Controllers\Front\AboutUsController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeWebController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ProjectController;
use App\Http\Controllers\Front\QuestionController;
use App\Http\Controllers\Front\QuoteController;
use App\Http\Controllers\Front\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\UserController;



//--------------------------------------------------------------------------
// Web routes
//--------------------------------------------------------------------------
// start web routes











//--------------------------------------------------------------------------
// Admin routes
//--------------------------------------------------------------------------

require __DIR__ . '/admin.php';


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 'namespace' => 'Front',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        #### Home ####
        Route::get('/', [HomeWebController::class, 'index'])->name('/');

        #### About Us ####
        Route::get('/about_us', [AboutUsController::class, 'index'])->name('about_us');

        #### Contact ####
        Route::get('/contact', [ContactController::class, 'index'])->name('contact');
        Route::post('/contactStore', [ContactController::class, 'contactStore'])->name('contactStore');

        #### Service ####
        Route::get('/service', [ServiceController::class, 'index'])->name('service');
        Route::get('/serviceProject/{id}', 'ServiceController@serviceProject')->name('serviceProject');

        #### Product ####
        Route::get('/products', [ProductController::class, 'index'])->name('product');
        Route::get('/search', 'ProductController@search')->name('product-search');
        Route::get('/filter', 'ProductController@filter')->name('product-filter');
        Route::get('/categorySort', 'ProductController@categorySort')->name('categorySort');


        #### Project ####
        Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
        Route::get('/project/{id}', 'ProjectController@oneProject')->name('project');
        Route::get('/categoryProject', 'ProjectController@categorySort')->name('category_Sort');
        Route::get('/loadMore', 'ProjectController@loadMore')->name('loadMore');

        #### Single ####
        Route::get('/product/{id}', 'SingleController@getProduct')->name('get.product');

        #### Quote ####
        Route::get('quote', [QuoteController::class, 'index'])->name('quoteIndex');
        Route::post('quote/store', 'QuoteController@store')->name('quoteStore');
        Route::get('/quote/search', 'QuoteController@search')->name('quoteSearch');
//        Route::get('quote/{id}', 'QuoteController@getProduct')->name('get.quote');

        #### Faqs ####
        Route::get('/faqs', [QuestionController::class, 'index'])->name('faqs');



    }
);
