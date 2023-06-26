@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.subject_unit_doctors') }}
@endsection
@section('page_name')
    {{ trans('admin.subject_unit_doctors') }}
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
                                <th class="min-w-25px">#</th>
                                <th class="min-w-50px">{{ trans('admin.year') }}</th>
                                <th class="min-w-25px">{{ trans('admin.group') }}</th>
                                <th class="min-w-25px">{{ trans('admin.subject') }}</th>
                                <th class="min-w-25px">{{ trans('admin.unit') }}</th>
                                <th class="min-w-50px">{{ trans('admin.period') }}</th>
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
            {data: 'year', name: 'year'},
            {data: 'group_id', name: 'group_id'},
            {data: 'subject_id', name: 'subject_id'},
            {data: 'unit_id', name: 'unit_id'},
            {data: 'period', name: 'period'},
        ]
        showData('{{route('subject_unit_doctor.index')}}', columns);

    </script>
@endsection


