@extends('front.layouts.master')

@section('content')
    <!-- landing -->
    <div class="landing">
        <div id="carouselExampleFade" class="carousel slide carousel-fade bg-black" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $slider->id == $sliders->first()->id ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="no image">

                        <div class="carousel-caption d-md-block text-white">
                            <p class="small-title">@lang('admin.welcome to')  {{  $university_settings->getTranslation('title', app()->getLocale()) }}</p>
                            <h1 class="heading text-white tw-bolder">
                                {{ $slider->getTranslation('title', app()->getLocale()) }}
                            </h1>
                            <p class="text-start description">
                                {!! $slider->getTranslation('description', app()->getLocale()) !!}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <div class="prev-icon">
                    <i class="fa-solid fa-angle-left fa-lg"></i>
                </div>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                <div class="prev-icon">
                    <i class="fa-solid fa-angle-right fa-lg"></i>
                </div>
            </button>
        </div>
    </div>

    <!-- blogs -->
    <section class="blogs pt-5 pb-5">
        <div class="container pt-5">
            <div class="main-heading mb-5">
                <div class="d-flex color-second mb-1">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <h6 class="ms-2 me-2">@lang('admin.our news')</h6>
                </div>
                <h1 class="color-dark">@lang('admin.The latest news')</h1>
            </div>
            <div class="owl-carousel owl-theme">
                @foreach ($advertisements_list as $advertisement)
                    <div class="ms-2 me-2">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="{{ route('blog', $advertisement->id) }}">
                                <img
                                    src="{{ asset('/uploads/advertisements/background_image/'. $advertisement->background_image) }}"
                                    class="card-img-top"
                                    alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>{{ $advertisement->created_at->format('d') }}</h4>
                                    <p>{{ $advertisement->created_at->format('F') }}
                                        ,{{ $advertisement->created_at->format('Y') }}
                                    </p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark"
                                       href="{{ route('blog', $advertisement->id) }}">{{ $advertisement->getTranslation('title', app()->getLocale())}}</a>
                                </h3>
                                <div class="time color-gray">
                                    {{ $advertisement->created_at->format('H:i A') }}
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong
                                        class="color-second">{{ $advertisement->service->getTranslation('service_name', app()->getLocale()) }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- video -->
    <section class="video-slider mb-5 mt-5">
        <div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
            <div class="owl-carousel owl-theme">
                @foreach ($videos as $video)
                    <div class="row card-video" style="background-image: url({{ asset($video->background_image) }})">
                        <div class="col-lg-6 col-12">
                            <h1 class="heading-video text-white">
                                {{ $video->getTranslation('title', app()->getLocale()) }}
                            </h1>
                            <p>{!! $video->getTranslation('description', app()->getLocale()) !!}</p>
                        </div>
                        <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
                            <div class="icon-video">
                                <a class="text-decoration-none" data-url="{{ $video->video_url }}"
                                   href="{{ $video->video_url }}" data-bs-toggle="modal"
                                   data-bs-target="#exampleModal">
                                    <img src="{{ asset('assets/front/assets') }}/photo/play-button.png" alt="no-video">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- newest -->
    <section class="newest-blog pt-5 pb-5">
        <div class="container pt-5">
            <div class="main-heading mb-5">
                <div class="d-flex justify-content-center color-second mb-1">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <h6 class="ms-2 me-2">@lang('admin.our events')</h6>
                </div>
                <h1 class="color-dark text-center">@lang('admin.The latest events')</h1>
            </div>
            <div>
                <div class="owl-carousel owl-theme">
                    @foreach ($events as $event)
                        <div class="m-3">
                            <div class="card card-newest">
                                <div class="image-card">
                                    <img src="{{ asset($event->image) }}" class="card-img-top" alt="no-image">
                                </div>
                                <div class="card-body">
                                    <div class="card-date1">
                                        <p>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            {{ $event->created_at->format('d') }}
                                            {{ $event->created_at->format('M') }}
                                            ,{{ $event->created_at->format('Y') }}
                                        </p>
                                    </div>
                                    <a class="text-decoration-none" href="{{ route('event', $event->id) }}">
                                        <h4 class="card-title color-dark mt-2 mb-3">{{ $event->getTranslation('title', app()->getLocale()) }}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- faculty number -->

    <section class="faculty-num mt5 mb-5">
        <div class="container">
            <div class="main-heading mb-5">
                <h1 class="color-second text-center">@lang('admin.College in numbers')</h1>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="{{ asset('assets/front/assets') }}/photo/مجموع الطلبة-01.png" alt="no-image">
                        </div>
                        <?php $count_user = userCount(); ?>
                        <h4 class="text-center">@lang('admin.Total students')</h4>
                        <h6 class="text-center">{{ $count_user }}</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="{{ asset('assets/front/assets') }}/photo/الاطقم الادارية-01.png" alt="no-image">
                        </div>
                        <?php $count_admin = adminCount(); ?>
                        <h4 class="text-center">@lang('admin.Administrative crews')</h4>
                        <h6 class="text-center">{{ $count_admin }}</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="{{ asset('assets/front/assets') }}/photo/الاطقم التربوية-01.png" alt="no-image">
                        </div>
                        <h4 class="text-center">@lang('admin.Educational crews')</h4>
                        <h6 class="text-center">50</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="{{ asset('assets/front/assets') }}/photo/طلبة الاجازة-01.png" alt="no-image">
                        </div>
                        <h4 class="text-center">@lang('admin.vacation students')</h4>
                        <h6 class="text-center">3000</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="{{ asset('assets/front/assets') }}/photo/طلبة الماستر-01.png" alt="no-image">
                        </div>
                        <h4 class="text-center">@lang('admin.Master students')</h4>
                        <h6 class="text-center">200</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="{{ asset('assets/front/assets') }}/photo/طلبة الدكتوراه-01.png" alt="no-image">
                        </div>
                        <h4 class="text-center">@lang('admin.PhD students')</h4>
                        <h6 class="text-center">150</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- the word -->
    <section class="word pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    @foreach ($dean_speech as $dean)
                        <div class="image-word">
                            <img class="w-100 img-fluid rounded"
                                 src="{{ asset($dean->image)}}"
                                 alt="no-image">
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-6 col-12">

                    @foreach ($dean_speech as $dean)

                        <h1 class="mt-3">{{ $dean->getTranslation('name', app()->getLocale()) }} </h1>
                        <p>{!! Str::limit($dean->getTranslation('description', app()->getLocale()),400,'....') !!}</p>
                        <div class="mt-5">
                            <a class="text-decoration-none main-btn" href="{{ route('dean_speech.index') }}">
                                @lang('admin.details')
                                <i class="fa-solid fa-arrow-right-long ms-2 text-white"></i>
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>

@endsection
