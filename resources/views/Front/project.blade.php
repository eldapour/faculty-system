@extends('Front.layouts.master')

@section('content')

    <section class="page-title page-title-12" id="page-title">
        <div class="page-title-wrap bg-overlay bg-overlay-dark-3">
            <div class="bg-section">
                <img src="{{ asset($sliders->image_project) }}" alt="Background"/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="title text-center">
                            <h1 class="title-heading">@lang('site.Projects')</h1>
                            <p class="title-desc">
                                {{ trans('site.the_role_of_cameras_and_networks') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-wrap">
            <div class="container">
                <ol class="breadcrumb d-flex">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('site.home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @lang('site.Projects')
                    </li>
                </ol>
            </div>
        </div>
    </section>

    <section
        class="projects projects-standard projects-standard-1"
        id="projects-standard-1"
    >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="projects-filter">
                        <ul class="list-inline mb-0">
                            <li>
                                <a
                                    class="category-sort"
                                    href=""
                                    data-id="all"
                                >@lang('site.all')</a
                                >
                            </li>
                            @foreach ($services as $service)

                                <li>
                                    <a href="" class="category-sort" data-id="{{ $service->id }}"
                                    >{{ trans_model($service,'title') . ' ( '. $service->project->count() .' ) ' }}</a
                                    >
                                </li>

                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-search" id="project-content">
                @foreach ($projects as $project)
                    <div class="col-12 col-md-6 col-lg-4 project-item filter-finance filter-supply">
                        <div class="project-panel" data-hover="">
                            <div class="project-panel-holder projects-all load-more" id="load">

                                <div class="project-img">
                                    <a class="link" href="{{ route('project', $project->id) }}"></a
                                    ><img
                                        src="{{ asset($project->image) }}"
                                        alt="project image"
                                        class="w-100"
                                    />
                                </div>

                                <div class="project-content">
                                    <div class="project-title">
                                        <h4>
                                            <a href="{{ route('project', $project->id) }}"
                                            >{{ trans_model($project,'title') }}</a
                                            >
                                        </h4>
                                    </div>
                                    <div class="project-cat">
                                        <a href="{{ route('project', $project->id) }}">{{ trans_model($project,'desc') }}</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $('.category-sort').on('click', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            // alert(id);

            $.ajax({
                type: 'get',
                url: '{{ route('category_Sort') }}',
                data: {
                    'id': id
                },
                beforeSend: function (data) {
                    $('.product-search').html('<div class="loader"></div>');
                },
                success: function (data) {
                    // alert(data)
                    $('#project-content').html(data);
                },
                error: function (data) {
                    $('.product-search').html('<h2 class="error">{{ lang() == 'ar' ? 'لا يوجد مشاريع' : 'NO PROJECT FOUND' }}</h2>');
                }
            });
        });


    </script>

@endsection
