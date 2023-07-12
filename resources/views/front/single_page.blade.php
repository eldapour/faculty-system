@extends('front.layouts.master')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">{{ $page->getTranslation('title', app()->getLocale()) }}</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">@lang('admin.home')</a>|
                    <span class="ms-2">{{ $page->getTranslation('title', app()->getLocale()) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- section -->
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="">
                <div class="slide-img">
                    <img style="width: 100%; height: 600px;" class="img-fluid image-show"
                         src="{{ asset($page->images[0]) }}" alt="product image"/>
                </div>
            </div>
            <div class="small-slider">
                @foreach ($page->images as $image)
                    <img style="width: 100%; height: 122px;" class="img-fluid image-small" src="{{ asset($image) }}"
                         alt="product image"/>
                @endforeach
            </div>

            <div class="row mt-4">
                <div class="col-lg-9 col-12">
                    <h2 class="color-blue mb-3">
                        {{ $page->getTranslation('title', app()->getLocale()) }}
                    </h2>
                    <p style="color: #245b73;">{!! $page->getTranslation('description', app()->getLocale()) !!}</p>
                    <hr>
                    <div class="mt-5 d-flex">
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
                        <h2 class="title" style="font-size: 30px;">@lang('admin.latest posts')</h2>
                    </div>
                    <ul class="ms-3">
                        @foreach ($advertisements as $advertisement)
                            <li class="mb-3">
                                <div class="d-flex blog">
                                    <div class="me-3">
                                        <a class="text-decoration-none"
                                           href="{{ route('blog',$advertisement->id) }}">
                                            <img
                                                src="{{ asset('/uploads/advertisements/images/'.$advertisement->image) }}">
                                        </a>
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
    <script>
        $(document).ready(function () {
            $('.image-small').on('click', function () {
                let src = $(this).attr('src');
                $('.image-show').attr('src', src);
            })
        })
    </script>
@endsection
