@extends('front.layouts.master')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">{{ $event_item->getTranslation('title', app()->getLocale()) }}</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">@lang('admin.home')</a>|
                    <span class="ms-2">{{ $event_item->getTranslation('title', app()->getLocale()) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- section details -->
    <section class="details pt-5 pb-5">
        <div class="container pt-5 pb-5">
            <div style="position: relative;">
                <img src="{{ asset($event_item->background_image) }}" alt="no-image">
                <div class="d-flex flex-wrap  date-details">
                    <div class="me-3">
                        <i class="fa-solid fa-calendar-days"></i>
                        {{ $event_item->created_at->format('d') }}
                        {{ $event_item->created_at->format('M') }},
                        {{ $event_item->created_at->format('Y') }}
                    </div>
                    <div class="me-3">
                        <i class="fa-regular fa-clock"></i>
                        {{ $event_item->created_at->format('H:i A') }}
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-9 col-12">
                    <h2 class="color-blue mb-3">
                        {{ $event_item->getTranslation('title', app()->getLocale()) }}
                    </h2>
                    <p>{!! $event_item->getTranslation('description', app()->getLocale()) !!}</p>
                    <hr>
                    <div>
                        <h3 class="mt-4 mb-3">@lang('admin.share in')</h3>
                        <a class="text-decoration-none btn-share whatsapp"
                           href="https://api.whatsapp.com/send?text={{$event_item->getTranslation('title', app()->getLocale()) .' : '. route('event',$event_item->id) }}"
                           target="_blank"><i
                                class="fa-brands fa-whatsapp"></i></a>
                        <a class="text-decoration-none btn-share facebook"
                           href="https://www.facebook.com/sharer/sharer.php?u={{ route('event',$event_item->id) }}"
                           target="_blank"><i
                                class="fa-brands fa-facebook-f"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12 sidebar mt-5">
                    <div class="mt-3 ms-3">
                        <h2 class="title" style="font-size: 30px;">@lang('admin.latest posts')</h2>
                    </div>
                    <ul class="ms-3">
                        @foreach ($advertisements as $advertisement)
                            <li class="mb-3">
                                <div class="d-flex blog">
                                    <div class="me-3"><img
                                            src="{{ asset('/uploads/advertisements/images/'.$advertisement->image) }}">
                                    </div>
                                    <div>
                                        <div style="max-width: 190px;">
                                            <a class="text-decoration-none"
                                               href="{{ route('blog',$advertisement->id) }}">{{ $advertisement->getTranslation('title', app()->getLocale()) }}</a>
                                        </div>
                                        <span
                                            class="color-second">{{ $advertisement->created_at->format('d') }} {{ $advertisement->created_at->format('M') }}, {{ $advertisement->created_at->format('Y') }}</span>
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
