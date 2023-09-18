<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Request;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Request::is('dashboard/*') || Request::is('dashboard'))
                return route('admin.login');
            else{
//                toastInfo('يرجي تسجيل الدخول');
                return route('/');
            }
        }
    }


}
