<?php

namespace App\Providers;

use App\Models\Deadline;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Advertisement;
use App\Models\Period;
use App\Models\TrackReregister;
use App\Models\UniversitySetting;
use App\Models\User;
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
        $dt = Carbon::now();
        View::share('settings',Setting::first());
        View::share('categories',Category::all());
        View::share('advertisements', Advertisement::query()
        ->latest()->take(3)
            ->get());
        View::share('university_settings',UniversitySetting::first());
        // طلب الاستدراك
        View::share('request_your_turn',Deadline::where('deadline_type','1')->where('deadline_date_start','<=', $dt)->where('deadline_date_end','>=', $dt)->count());

        // طلب معالجه
        View::share('processing_request',Deadline::where('deadline_type','0')->where('deadline_date_start','<=', $dt)->where('deadline_date_end','>=', $dt)->count());
        View::share('university_settings',UniversitySetting::first());
        View::share('maintenance',UniversitySetting::first());
        View::share('periods',Period::all());
        View::share('period_normal',Period::query()->where('year_start','=',Carbon::now()->format('Y'))->where('status','=','start')->where('session','=','عاديه')->first());
        View::share('period_remedial',Period::query()->where('year_start','=',Carbon::now()->format('Y'))->where('status','=','start')->where('session','=','استدراكيه')->first());
        View::share('pages',Page::query()
        ->where('category_id', '=', '8')
            ->get());
    }
}
