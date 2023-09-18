@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.subject_exam_student_results') }}
@endsection
@section('page_name')
    {{ trans('admin.subject_exam_student_results') }}
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
                                <th class="min-w-25px">{{ trans('admin.subject_name_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.degree') ." ". trans('admin.student') }}</th>
                                <th class="min-w-25px">{{ trans('admin.degree') ." ". trans('admin.exam') }}</th>
                                <th class="min-w-25px">{{ trans('admin.date_enter_degree') }}</th>
                                <th class="min-w-25px">{{ trans('admin.period') }}</th>
                                <th class="min-w-50px">{{ trans('admin.year') }}</th>
                            </tr>
                            </thead>
                        </table>
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
            {data: 'student_degree', name: 'student_degree'},
            {data: 'exam_degree', name: 'exam_degree'},
            {data: 'date_enter_degree', name: 'date_enter_degree'},
            {data: 'period', name: 'period'},
            {data: 'year', name: 'year'},
        ]
        showData('{{route('exam_result.all')}}', columns);
    </script>

@endsection

