@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.subject_exam_students') }}
@endsection
@section('page_name')
    {{ trans('admin.subject_exam_students') }}
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
                                <th class="min-w-25px">{{trans('subject_student_data.id')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.identifier_id')}}</th>
                                <th class="min-w-25px">{{ trans('subject_exam_student_result.student') }}</th>
                                <th class="min-w-25px">{{trans('admin.subject_name_')}}</th>
                                <th class="min-w-25px">{{trans('admin.session')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.group_id')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.exam_day')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.exam_date')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.time_start')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.time_end')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.period')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.year')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.exam_code_name')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.exam_number_name')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.section')}}</th>
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
                    {data: 'user', name: 'user'},
                    {data: 'code', name: 'code'},
                    {data: 'session', name: 'session'},
                    {data: 'group_id', name: 'group_id'},
                    {data: 'exam_day', name: 'exam_day'},
                    {data: 'exam_date', name: 'exam_date'},
                    {data: 'time_start', name: 'time_start'},
                    {data: 'time_end', name: 'time_end'},
                    {data: 'period', name: 'period'},
                    {data: 'year', name: 'year'},
                    {data: 'exam_code', name: 'exam_code'},
                    {data: 'exam_number', name: 'exam_number'},
                    {data: 'section', name: 'section'},
                ]
                showData('{{route('manger_subject_exam_students_index')}}', columns);

            </script>
@endsection

