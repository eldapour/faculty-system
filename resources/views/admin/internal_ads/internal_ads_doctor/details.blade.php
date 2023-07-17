@extends('admin/layouts/master')


@section('title')  {{trans('admin.internal_ads')}} @endsection
@section('page_name') {{trans('admin.internal_ads')}} @endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')
@endsection
@section('content')

    {{--  start content  --}}

    <div class="row">
        <div class="col-12">
            <div class="card bg-white img-card box-white-shadow">
                <div class="card-body">
                    <h1 style="color: #125875">عنوان الاعلان بخط كبير</h1>
                    <div class="d-flex mb-4" style="color: #ff7350;">
                        <div class="ml-3" style="color: #ff7350;">
                            <i class="fa fa-user"></i>
                            المصلحة
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-calendar"></i>
                            15 march,2023
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-clock"></i>
                            3:30 pm - 4:30 pm
                        </div>
                    </div>
                    <p>تفاصيل الاعلان الداخلى</p>
                    <button class="btn btn-primary btn-icon text-white mt-3">
                        <span>
                            <i class="fe fe-download"></i>
                            تحميل
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


