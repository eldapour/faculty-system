@extends('front.layouts.master')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">{{ $page->title[lang()] }}</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">@lang('admin.home')</a>|
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
                    </ul>
                </div>
            </div>
        </div>
    </section>



@endsection
