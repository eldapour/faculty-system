@extends('admin/layouts/master')
@section('title')
    {{$ad->title}}
@endsection
@section('page_name')
    {{$ad->title}}
@endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')
@endsection
@section('content')

    {{--  start content  --}}
    <a href="{{ route('indexDoctor') }}" class="btn btn-info mb-5">
        <i class="fa fa-arrow-right"></i>
    </a>
    <div class="row">
        <div class="col-12">
            <div class="card bg-white img-card box-white-shadow">
                <div class="card-body">
                    <h1 style="color: #125875">{{$ad->title}}</h1>
                    <div class="d-flex mb-4" style="color: #ff7350;">
                        <div class="ml-3" style="color: #ff7350;">
                            <i class="fa fa-user"></i>
                            {{ $ad->service->service_name }}
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-calendar"></i>
                            {{--                            15 march,2023--}}
                            {{ $ad->created_at->format('d M,Y') }}
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-clock"></i>
                            <?php
                            $time = \Carbon\Carbon::createFromFormat('H:i:s', $ad->time_ads);
                            $formattedTime = $time->format('g:i A');
                            ?>
                            {{ $formattedTime }}

                        </div>
                    </div>
                    <p>{{ $ad->description }}</p>
                    <button class="btn btn-info btn-icon text-white mt-3">
                        <span>
                            <i class="fe fe-download"></i>
                            @lang('admin.download')
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>



    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>

    </script>
@endsection


