@include('admin.auth.layouts.header')

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        {{--        <div class="content-overlay"></div> --}}
        {{--        <div class="header-navbar-shadow"></div> --}}
        <div class="content-wrapper">
            {{--            <div class="content-header row"> --}}
            {{--            </div> --}}
            <div class="content-body container-fluid">

                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        {{--                        <a class="brand-logo" href="javascript:void(0);"> --}}
                        {{--  <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                        <defs>
                            <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                y2="89.4879456%">
                                <stop stop-color="#000000" offset="0%"></stop>
                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                            </lineargradient>
                            <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                x2="37.373316%" y2="100%">
                                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                            </lineargradient>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                <g id="Group" transform="translate(400.000000, 178.000000)">
                                    <path class="text-primary" id="Path"
                                        d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                        style="fill: currentColor"></path>
                                    <path id="Path1"
                                        d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                        fill="url(#linearGradient-1)" opacity="0.2"></path>
                                    <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                        points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                    </polygon>
                                    <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                        points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                    </polygon>
                                    <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                        points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                    </polygon>
                                </g>
                            </g>
                        </g>
                    </svg>  --}}
                        {{--  <h2 class="brand-text text-primary ml-1">@lang('login.Login Page')</h2>
                    <button data-url="{{ LaravelLocalization::getLocalizedURL('en') }}" class="brand-text ml-1 btn btn-sm btn-primary langBtn">English</button>
                    <button data-url="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="brand-text ml-1 btn btn-sm btn-primary langBtn">اللغة العربية</button>
                    <button data-url="{{ LaravelLocalization::getLocalizedURL('fr') }}" class="brand-text ml-1 btn btn-sm btn-primary langBtn">Française</button>  --}}
                        {{--                        </a> --}}
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class=" col-lg-8">

                            <div class="d-none d-lg-flex">
                                {{--                                <div> --}}
                                <!-- Brand logo-->
                                <a class="brand-logo" href="javascript:void(0);">
                                    <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                                        <defs>
                                            <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%"
                                                x2="50%" y2="89.4879456%">
                                                <stop stop-color="#000000" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </lineargradient>
                                            <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                                x2="37.373316%" y2="100%">
                                                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </lineargradient>
                                        </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                                <g id="Group" transform="translate(400.000000, 178.000000)">
                                                    <path class="text-primary" id="Path"
                                                        d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                        style="fill: currentColor"></path>
                                                    <path id="Path1"
                                                        d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                        fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                    <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                                        points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                                    </polygon>
                                                    <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                                        points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                                    </polygon>
                                                    <polygon id="Path-3" fill="url(#linearGradient-2)"
                                                        opacity="0.099999994"
                                                        points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                                    </polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>

                                    <h2 class="brand-text text-primary ml-1">@lang('login.Login Page')</h2>
                                    <button data-url="{{ LaravelLocalization::getLocalizedURL('en') }}"
                                        class="brand-text ml-1 btn btn-sm btn-primary langBtn">English
                                    </button>
                                    <button data-url="{{ LaravelLocalization::getLocalizedURL('ar') }}"
                                        class="brand-text ml-1 btn btn-sm btn-primary langBtn">اللغة العربية
                                    </button>
                                    <button data-url="{{ LaravelLocalization::getLocalizedURL('fr') }}"
                                        class="brand-text ml-1 btn btn-sm btn-primary langBtn">Française
                                    </button>
                                </a>
                                {{--                                </div> --}}
                            </div>

                            <div class="d-flex d-lg-none justify-content-between mt-2">
                                <div class="d-flex">
                                    <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                                        <defs>
                                            <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%"
                                                x2="50%" y2="89.4879456%">
                                                <stop stop-color="#000000" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </lineargradient>
                                            <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                                x2="37.373316%" y2="100%">
                                                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </lineargradient>
                                        </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                                <g id="Group" transform="translate(400.000000, 178.000000)">
                                                    <path class="text-primary" id="Path"
                                                        d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                        style="fill: currentColor"></path>
                                                    <path id="Path1"
                                                        d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                        fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                    <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                                        points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                                    </polygon>
                                                    <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                                        points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                                    </polygon>
                                                    <polygon id="Path-3" fill="url(#linearGradient-2)"
                                                        opacity="0.099999994"
                                                        points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                                    </polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <h4 class="brand-text text-primary ml-1">@lang('login.Login Page')</h4>
                                </div>
                                <div class="dropdown" style="cursor: pointer;">
                                    <a class=" icon text-center" data-toggle="dropdown">
                                        @lang('admin.language')
                                    </a>
                                    <div style="top: 0px !important;" class="dropdown-menu">
                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <a class="dropdown-item text-center" rel="alternate"
                                                hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="d-none d-lg-flex">
                                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                        class="img-fluid" src="{{ asset('app-assets') }}/images/pages/login-v2.svg"
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
                                    <input type="hidden" name="user_type" value="student">
                                    <div class="form-group">
                                        <label class="form-label" for="email">@lang('login.email')</label>
                                        <input class="form-control" id="email" type="text" name="email"
                                            placeholder="john@example.com" aria-describedby="email" autofocus=""
                                            tabindex="1" />
                                    </div>
                                    <small class="text-danger d-none email-error">* @lang('login.This field is required')</small>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">@lang('login.password')</label>
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
                                    <button type="button" class="btn btn-primary btn-block btnLogin-student"
                                        tabindex="4">@lang('login.sign in')</button>
                                    <div class="d-flex">
                                        <a class="col-6" href="{{ route('activeStudent') }}">@lang('login.Account activation')</a>
                                        <a class="col-6" href="{{ route('resetPassView') }}">@lang('login.Forgot Password?')</a>
                                    </div>
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
