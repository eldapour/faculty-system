@extends('front.layouts.master')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">our blog</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">home</a>|
                    <span class="ms-2">our blog</span>
                </div>
            </div>
        </div>
    </div>

    <!-- section -->

    <section class="blogs-bage pt-5 pb-5 new-blog">
        <div class="container pt-5">
            <div class="owl-carousel owl-theme pt-5">
                <div class="row">
                    @foreach ($advertisements as $advertisement)
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card card-blog">
                                <a class="text-decoration-none" href="single-blog.html">
                                    <img src="{{ asset($advertisement->background_image) }}" class="card-img-top" alt="no-image">
                                </a>
                                <div class="card-body mt-3">
                                    <div class="card-date">
                                        <h4>{{ $advertisement->created_at->format('d') }}</h4>
                                        <p>{{ $advertisement->created_at->format('M') }},{{ $advertisement->created_at->format('Y') }}</p>
                                    </div>
                                    <h3 class="card-title">
                                        <a class="text-decoration-none color-dark" href="single-blog.html">{{ $advertisement->title[lang()] }}</a>
                                    </h3>
                                    <p class="card-text color-gray">{!! $advertisement->description[lang()] !!}</p>
                                    <div class="time color-gray">
                                        {{ $advertisement->created_at->format('H:i A') }}
                                        <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                        <strong class="color-second">{{ $advertisement->service->service_name[lang()] }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
