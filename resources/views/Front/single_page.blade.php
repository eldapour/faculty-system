@extends('front.layouts.master')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">{{ $page->title[lang()] }}</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">home</a>|
                    <span class="ms-2">{{ $page->title[lang()] }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- section -->
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="main-slider">
                <div class="slide-img">
                    <img class="img-fluid" src="{{ asset($page->images[0]) }}" alt="product image" />
                </div>
            </div>
            <div class="small-slider">
                @foreach ($page->images as $image)
                    <img class="img-fluid" src="{{ asset($image) }}" alt="product image" />
                @endforeach
            </div>

            <div class="row mt-4">
                <div class="col-lg-9 col-12">
                    <h2 class="color-blue mb-3">
                        Learning Network Webinars for Music Teachers
                    </h2>
                    <p>{!! $page->description[lang()] !!}</p>
                    <hr>
                    <div class="mt-5 d-flex">
                        {{--  <div>
                            <a class="text-decoration-none main-btn me-2 ms-2 mb-3" href="#">
                                <i class="fa-solid fa-download me-2 text-white"></i>
                                download
                            </a>
                        </div>  --}}
                        <div>
                            @foreach ($page->files as $file)
                                <a class="text-decoration-none main-btn me-2 ms-2 mb-3" href="{{ asset($file) }}">
                                    <i class="fa-solid fa-download me-2 text-white"></i>
                                    {{ trans('admin.pdf') }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 sidebar mt-5">
                    <div class="mt-3 ms-3">
                        <h2 class="title" style="font-size: 30px;">latest post</h2>
                    </div>
                    <ul class="ms-3">
                        <li class="mb-3">
                            <div class="d-flex blog">
                                <div class="me-3"><img src="{{ asset('assets/front/assets') }}/photo/s-blogimg-01.png"></div>
                                <div>
                                    <div style="max-width: 190px;">
                                        <a class="text-decoration-none" href="#">Nothing impossble to need hard
                                            work</a>
                                    </div>
                                    <span class="color-second">7 march, 2023</span>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex blog">
                                <div class="me-3"><img src="photo/s-blogimg-01.png"></div>
                                <div>
                                    <div style="max-width: 190px;">
                                        <a class="text-decoration-none" href="#">Nothing impossble to need hard
                                            work</a>
                                    </div>
                                    <span class="color-second">7 march, 2023</span>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex blog">
                                <div class="me-3"><img src="photo/s-blogimg-01.png"></div>
                                <div>
                                    <div style="max-width: 190px;">
                                        <a class="text-decoration-none" href="#">Nothing impossble to need hard
                                            work</a>
                                    </div>
                                    <span class="color-second">7 march, 2023</span>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex blog">
                                <div class="me-3"><img src="photo/s-blogimg-02.png"></div>
                                <div>
                                    <div style="max-width: 190px;">
                                        <a class="text-decoration-none" href="#">Nothing impossble to need hard
                                            work</a>
                                    </div>
                                    <span class="color-second">7 march, 2023</span>
                                </div>
                            </div>
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
                <div class="m-3 d-flex justify-content-center">
                    <a class="text-decoration-none btn-platform">Digital student platform</a>
                </div>
                <div class="m-3 d-flex justify-content-center">
                    <a class="text-decoration-none btn-platform">College digital locker</a>
                </div>
                <div class="m-3 d-flex justify-content-center">
                    <a class="text-decoration-none btn-platform">Digital College Journal</a>
                </div>
                <div class="m-3 d-flex justify-content-center">
                    <a class="text-decoration-none btn-platform">Digital student platform</a>
                </div>
                <div class="m-3 d-flex justify-content-center">
                    <a class="text-decoration-none btn-platform">Digital student platform</a>
                </div>
            </div>
        </div>
    </section>
@endsection
