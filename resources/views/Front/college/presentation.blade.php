@extends('front.layouts.master')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">presentation</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">home</a>|
                    <span class="ms-2">presentation</span>
                </div>
            </div>
        </div>
    </div>

    <!-- section the word -->
    <section class="word pt-5 pb-5" style="background: white;">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-lg-6 col-12" style="position: relative;">
                    <div class="row">
                        @foreach ($presentations->images as $image)
                            <div class="col-6 d-flex align-items-center">
                                <div class="image-word" style="height: 90%;">
                                    <img class="w-100 h-100 img-fluid" src="{{ asset($image) }}" alt="no-image">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-years">
                        <h4>{{ $presentations->experience_year }}</h4>
                        <p>years of giving</p>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="main-heading mb-3">
                        <div class="d-flex color-second mb-1">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <h6 class="ms-2 me-2">our news</h6>
                        </div>
                        <h1 class="color-dark">{{ $presentations->title[lang()] }}</h1>
                    </div>
                    <p>{!! $presentations->description[lang()] !!}</p>
                </div>
            </div>
            <p class="mt-4">{!! $presentations->sub_desc[lang()] !!}</p>
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
