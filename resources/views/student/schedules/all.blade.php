@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.all_schedules') }}
@endsection
@section('page_name')
    {{ trans('admin.all_schedules') }}
@endsection
@section('content')


    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">


                                <th class="min-w-50px">{{ trans('schedules.department') }}</th>
                                <th class="min-w-50px">{{ trans('schedules.unit') }}</th>
                                <th class="min-w-50px">{{ trans('schedules.details') }}</th>
                                <th class="min-w-50px">{{ trans('schedules.uploads') }}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
    @include('admin.layouts.myAjaxHelper')
@endsection


@section('ajaxCalls')
    <script>
        var loader = ` <div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>
        `;

        var columns = [
            {data: 'department_id', name: 'department_id'},
            {data: 'unit_id', name: 'unit_id'},
            {data: 'description', name: 'description'},
            {data: 'pdf_upload', name: 'pdf_upload'},
        ]

        showData('{{route('schedules.students.all')}}', columns);

    </script>


@endsection


