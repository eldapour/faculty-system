@extends('front.layouts.master')

@section('content')
    @foreach ($blog_items as $blog_item)
        <!-- breadcrumb -->
        <div class="breadcrumb">
            <div class="container">
                <h1 class="text-center">{{ $blog_item->title[lang()] }}</h1>
                <div class="title-breadcrumb">
                    <div class="link-breadcrumb">
                        <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">home</a>|
                        <span class="ms-2">{{ $blog_item->title[lang()] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- section details -->
        <section class="details pt-5 pb-5">
            <div class="container pt-5 pb-5">
                <div style="position: relative;">
                    <img src="{{ asset($blog_item->background_image) }}" alt="no-image">
                    <div class="d-flex flex-wrap  date-details">
                        <div class="me-3">
                            <i class="fa-solid fa-user"></i>
                            {{ $blog_item->service->service_name[lang()] }}
                        </div>
                        <div class="me-3">
                            <i class="fa-solid fa-calendar-days"></i>
                            {{ $blog_item->created_at->format('d') }}
                            {{ $blog_item->created_at->format('M') }},{{ $blog_item->created_at->format('Y') }}
                        </div>
                        <div class="me-3">
                            <i class="fa-regular fa-clock"></i>
                            {{ $blog_item->created_at->format('H:i A') }}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-9 col-12">
                        <h2 class="color-blue mb-3">
                            {{ $blog_item->title[lang()] }}
                        </h2>
                        <p>{!! $blog_item->description[lang()] !!}</p>
                        <hr>
                        <div>
                            @foreach ($university_settings as $university_setting)
                                <h3 class="mt-4 mb-3">share blog in</h3>
                                <a class="text-decoration-none btn-share whatsapp"
                                    href="{{ $university_setting->whatsapp_link }}" target="_blank"><i
                                        class="fa-brands fa-whatsapp"></i></a>
                                <a class="text-decoration-none btn-share facebook"
                                    href="{{ $university_setting->facebook_link }}" target="_blank"><i
                                        class="fa-brands fa-facebook-f"></i></a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 sidebar mt-5">
                        <div class="mt-3 ms-3">
                            <h2 class="title" style="font-size: 30px;">latest post</h2>
                        </div>
                        <ul class="ms-3">
                            <li class="mb-3">
                                @foreach ($advertisements as $advertisement)
                            <li class="mb-3">
                                <div class="d-flex blog">
                                    <div class="me-3"><img
                                            src="{{ asset($advertisement->image) }}"></div>
                                    <div>
                                        <div style="max-width: 190px;">
                                            <a class="text-decoration-none" href="#">{{ $advertisement->title[lang()] }}</a>
                                        </div>
                                        <span class="color-second">{{ $advertisement->created_at->format('d') }} {{ $advertisement->created_at->format('M') }}, {{ $advertisement->created_at->format('Y') }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                            </li>
                        </ul>
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
    @endforeach
@endsection
