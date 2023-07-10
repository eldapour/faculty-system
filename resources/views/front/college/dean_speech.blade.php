@extends('front.layouts.master')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">@lang('admin.wordManager')</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">@lang('admin.home')</a>|
                    <span class="ms-2">@lang('admin.wordManager')</span>
                </div>
            </div>
        </div>
    </div>

    <!-- section the word -->
    <section class="word pt-5 pb-5">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="image-word">
                        <img class="w-100 img-fluid rounded" src="{{ asset($dean_speech->image) }}" alt="no-image">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <h1 class="mt-3">{{ $dean_speech->getTranslation('name', app()->getLocale()) }} </h1>
                    <h3>ahmed hesham </h3>
                    <h5 class="color-second mb-3">{{ $dean_speech->getTranslation('role', app()->getLocale()) }} </h5>
                    <p>{!! $dean_speech->getTranslation('description', app()->getLocale()) !!}</p>
                </div>
            </div>
        </div>
    </section>


@endsection
