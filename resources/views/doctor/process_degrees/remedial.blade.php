@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.process_degrees_admin') }}
@endsection
@section('page_name')
    {{ trans('admin.process_degrees_admin') }}
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

                                <th class="min-w-25px">{{trans('process_exam.id')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.identifier_id')}}</th>
                                <th class="min-w-25px">{{trans('admin.student_name')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.subject_id')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.period')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.year')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.section')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.exam_code')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.student_degree_before_request')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.student_degree_after_request')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.request_type')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.request_date')}}</th>
                                <th class="min-w-50px">{{ trans('admin.request_status') }}</th>
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
                    {data: 'identifier_id', name: 'identifier_id'},
                    {data: 'student_name', name: 'student_name'},
                    {data: 'subject_id', name: 'subject_id'},
                    {data: 'period', name: 'period'},
                    {data: 'year', name: 'year'},
                    {data: 'section', name: 'section'},
                    {data: 'exam_number', name: 'exam_number'},
                    {data: 'student_degree_before_request', name: 'student_degree_before_request'},
                    {data: 'student_degree_after_request', name: 'student_degree_after_request'},
                    {data: 'request_type', name: 'request_type'},
                    {data: 'request_date', name: 'request_date'},
                    {data: 'request_status', name: 'request_status'},
                ]
                showData('{{ route('doctor_process_degrees_remedial') }}', columns);

            </script>
@endsection
