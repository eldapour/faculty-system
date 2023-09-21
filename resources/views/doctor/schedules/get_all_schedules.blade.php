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
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-50px">{{ trans('admin.department_name') }}</th>
                                <th class="min-w-50px">{{ trans('admin.unit_name') }}</th>
                                <th class="min-w-50px">{{ trans('admin.note') }}</th>
                                <th class="min-w-50px">{{ trans('admin.schedule_pdf_upload') }}</th>
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


        var columns = [
            {data: 'id', name: 'id'},
            {data: 'department_id', name: 'department_id'},
            {data: 'unit_id', name: 'unit_id'},
            {data: 'description', name: 'description'},
            {data: 'pdf_upload', name: 'pdf_upload'},
        ]

        showData('{{route('doctor_schedules_index')}}', columns);

    </script>



@endsection


