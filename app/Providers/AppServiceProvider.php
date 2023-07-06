<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Advertisement;
use App\Models\Period;
use App\Models\TrackReregister;
use App\Models\UniversitySetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::share('settings',Setting::first());
        View::share('categories',Category::all());
        View::share('advertisements', Advertisement::query()
        ->latest()->take(3)
            ->get());
        View::share('university_settings',UniversitySetting::all());
        View::share('maintenance',UniversitySetting::first());
        View::share('periods',Period::all());
        View::share('pages',Page::query()
        ->where('category_id', '=', '8')
            ->get());
    }
}
