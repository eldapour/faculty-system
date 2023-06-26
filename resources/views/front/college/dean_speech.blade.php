@extends('front.layouts.master')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">Dean's speech</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">home</a>|
                    <span class="ms-2">Dean's speech</span>
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
                    <h1 class="mt-3">{{ $dean_speech->name[lang()] }} </h1>
                    <h3>ahmed hesham </h3>
                    <h5 class="color-second mb-3">{{ $dean_speech->role[lang()] }} </h5>
                    <p>{!! $dean_speech->description[lang()] !!}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- digital platform -->
    <section class="digital-platform mt-5">
        <div class="container">
            <h1 class="text-white text-center mb-5">digital platform</h1>
            <div class="owl-carousel owl-theme">
                @foreach ($pages as $page)
                    <div class="m-3 d-flex justify-content-center">
                        <a class="text-decoration-none btn-platform">{{ $page->title[lang()] }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
