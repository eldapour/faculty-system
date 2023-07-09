<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    @if(Route::currentRouteName() == 'activeStudent')
        <title>{{ __('login.Account activation') }}</title>
    @elseif(Route::currentRouteName() == 'doResetPass')
        <title>Reset Password</title>
    @else
        <title>{{ __('login.Login Page') }}</title>
    @endif
    <link rel="apple-touch-icon" href="{{ asset('app-assets') }}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets') }}/images/ico/favicon.ico">

{{--    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"--}}
{{--          rel="stylesheet">--}}


    @if (lang() == 'en' || lang() == 'fr')
        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/page-auth.css">
        <!-- END: Page CSS-->
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/vendors-rtl.min.css">
        <!-- END: Vendor CSS-->
    @else
        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css-rtl/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css-rtl/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css-rtl/colors.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css-rtl/components.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css-rtl/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css-rtl/themes/bordered-layout.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css-rtl/themes/semi-dark-layout.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css"
              href="{{ asset('app-assets') }}/css-rtl/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css"
              href="{{ asset('app-assets') }}/css-rtl/plugins/forms/form-validation.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css-rtl/pages/page-auth.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css-rtl/custom-rtl.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css') }}/style-rtl.css">
        <!-- END: Custom CSS-->
    @endif


    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet"/>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');

        body{

            font-family: 'Cairo', sans-serif;
        }
        #toast-container > .toast-error {
            background-color: #fb5454;
            color: white;
        }

        #toast-container > .toast-success {
            background-color: #56d094;
            color: white;
        }
    </style>

</head>
<!-- END:-->
