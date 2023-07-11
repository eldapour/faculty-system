@extends('front.layouts.master')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">{{  trans('admin.Usage schedules') }}</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">{{  trans('admin.home') }}</a>|
                    <span class="ms-2">{{  trans('admin.Usage schedules') }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- section -->
    <section class="pt-5 pb-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="scroll">
                        <table class="table">
                            <tbody>
                                <tr class="head-table">
                                    <th scope="col">@lang('admin.department')</th>
                                    <th scope="col">@lang('admin.unit')</th>
                                    <th scope="col">@lang('admin.subjects')</th>
                                    <th scope="col">@lang('admin.download')</th>
                                </tr>
                                @foreach ($times as $time)
                                    <tr>
                                        <td>{{ $time->department->department_name }}</td>
                                        <td>{{ $time->unit->unit_name }}</td>
                                        <td>{{ $time->description }}</td>
                                        <td>
                                            <div class="p-1">
                                                <a class="text-decoration-none main-btn btn-table" href="{{ asset('uploads/schedules/'. $time->pdf_upload) }}" target="_blank">
                                                    <i class="fa-solid fa-download me-2 text-white"></i>
                                                    pdf
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3 col-12 sidebar mt-2">
                    <div class="mt-3 ms-3">
                        <h2 class="title" style="font-size: 30px;">@lang('admin.latest posts')</h2>
                    </div>
                    <ul class="ms-3">
                        @foreach ($advertisements as $advertisement)
                            <li class="mb-3">
                                <div class="d-flex blog">
                                    <div class="me-3"><img src="{{ asset('/uploads/advertisements/images/'.$advertisement->image) }}"></div>
                                    <div>
                                        <div style="max-width: 190px;">
                                            <a class="text-decoration-none"
                                                href="{{ route('blog',$advertisement->id) }}">{{ $advertisement->getTranslation('title', app()->getLocale()) }}</a>
                                        </div>
                                        <span class="color-second">{{ $advertisement->created_at->format('d') }}
                                            {{ $advertisement->created_at->format('M') }},
                                            {{ $advertisement->created_at->format('Y') }}</span>
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
