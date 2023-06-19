@include('admin.auth.layouts.header')

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            {{--  <div class="content-header row">
            </div>  --}}
            <div class="content-body container-fluid">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">

                        <!-- /Brand logo-->
                        <!-- Left Text-->

                        <div class=" col-lg-8 align-items-center p-5">
                            {{--  <div class="d-flex justify-content-between mt-3">  --}}
                                <div class="row">
                                    <!-- Brand logo column -->
                                    <div class="col-lg-6">
                                        <a class="brand-logo d-flex" href="javascript:void(0);">
                                            <!-- SVG logo -->
                                            <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                                                <!-- SVG content -->
                                            </svg>

                                            <!-- Brand text -->
                                            <h2 class="brand-text text-primary ml-1">@lang('login.Login Page')</h2>

                                            <!-- Language buttons -->
                                            <button data-url="{{ LaravelLocalization::getLocalizedURL('en') }}" class="brand-text ml-1 btn btn-sm btn-primary langBtn d-none d-lg-block">English</button>
                                            <button data-url="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="brand-text ml-1 btn btn-sm btn-primary langBtn d-none d-lg-block">اللغة العربية</button>
                                            <button data-url="{{ LaravelLocalization::getLocalizedURL('fr') }}" class="brand-text ml-1 btn btn-sm btn-primary langBtn d-none d-lg-block">Française</button>
                                        </a>
                                    </div>

                                    <!-- Dropdown column -->
                                    <div class="col-lg-6">
                                        <div class="dropdown d-block d-lg-none mr-2">
                                            <a class="icon text-center" data-toggle="dropdown">
                                                @lang('admin.language')
                                            </a>
                                            <div style="top: 0px !important;" class="dropdown-menu">
                                                <!-- Language dropdown items -->
                                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                    <a class="dropdown-item text-center" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                        {{ $properties['native'] }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            {{--  </div>  --}}
                            <div class="d-none d-lg-flex">
                                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid" src="{{ asset('app-assets')}}/images/pages/login-v2.svg"
                                    alt="Login V2" /></div>
                            </div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('assets/logo/download.jfif') }}" alt="no-image">
                                </div>
                                <h2 class="card-title font-weight-bold mb-1">@lang('login.welcome to ')</h2>
                                <p class="card-text mb-2">@lang('login.Please sign-in to your account and start the adventure')</p>
                                <form class="auth-login-form mt-2" method="POST">
                                    <div class="form-group">
                                        <label class="form-label" for="email">@lang('login.user_type')</label>
                                        <select class="form-control" name="user_type">
{{--                                            <option class="form-control" value="student">@lang('login.student')</option>--}}
                                            <option class="form-control" value="doctor">@lang('login.doctor')</option>
                                            <option class="form-control" value="manger">@lang('login.manger')</option>
                                            <option class="form-control" value="employee">@lang('login.employee')</option>
                                            <option class="form-control" value="factor">@lang('login.factor')</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">@lang('login.email')</label>
                                        <input class="form-control" id="email" type="text" name="email"
                                            placeholder="john@example.com" aria-describedby="email" autofocus=""
                                            tabindex="1" />
                                    </div>
                                    <small class="text-danger d-none email-error">* @lang('login.This field is required')</small>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">@lang('login.password')</label><a
                                                href=""><small>@lang('login.Forgot Password?')</small></a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password"
                                                type="password" name="password" placeholder="············"
                                                aria-describedby="password" tabindex="2" />
                                            <div class="input-group-append"><span
                                                    class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span></div>
                                        </div>
                                        <small class="text-danger d-none password-error">* @lang('login.This field is required')</small>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-block btnLogin" tabindex="4">@lang('login.sign in')</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    @include('admin.auth.layouts.footer')
