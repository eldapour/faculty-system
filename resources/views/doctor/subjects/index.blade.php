@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.subjects') }}
@endsection
@section('page_name')
    {{ trans('admin.subjects') }}
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
                                <th class="min-w-50px">{{ trans('admin.name') }}</th>
                                <th class="min-w-50px">{{ trans('admin.code_latin')}}</th>
                                <th class="min-w-50px">{{ trans('admin.unit_name') }}</th>
                                <th class="min-w-50px">{{ trans('admin.department') }}</th>
                                <th class="min-w-50px">{{ trans('admin.branch') }}</th>
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
            {data: 'subject_id', name: 'subject_id'},
            {data: 'code', name: 'code'},
            {data: 'unit_id', name: 'unit_id'},
            {data: 'department_id', name: 'department_id'},
            {data: 'department_branch_id', name: 'department_branch_id'},
        ]
        showData('{{route('doctor_subjects_index')}}', columns);

    </script>
@endsection

