@extends('admin.layouts.master')

@section('title')
    {{ trans('subject_exam_student_result.remedial') }}
@endsection
@section('page_name')
    {{ trans('subject_exam_student_result.remedial') }}
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

                                <th class="min-w-25px">{{ trans('subject_exam_student_result.id') }}</th>
                                <th class="min-w-25px">{{ trans('subject_exam_student_result.identifier_id') }}</th>
                                <th class="min-w-25px">{{ trans('subject_exam_student_result.student') }}</th>
                                <th class="min-w-25px">{{ trans('subject_exam_student_result.subject') }}</th>
                                <th class="min-w-25px">{{ trans('subject_exam_student_result.group') }}</th>
                                <th class="min-w-25px">{{ trans('subject_exam_student_result.period') }}</th>
                                <th class="min-w-25px">{{ trans('subject_exam_student_result.student_degree') }}</th>
                                <th class="min-w-25px">{{ trans('subject_exam_student_result.exam_degree') }}</th>
                                <th class="min-w-25px">{{ trans('subject_exam_student_result.date_enter_degree') }}</th>
                                <th class="min-w-25px">{{ trans('subject_exam_student_result.year') }}</th>
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
                    {data: 'user_id', name: 'user_id'},
                    {data: 'subject_id', name: 'subject_id'},
                    {data: 'group_id', name: 'group_id'},
                    {data: 'period', name: 'period'},
                    {data: 'student_degree', name: 'student_degree'},
                    {data: 'exam_degree', name: 'exam_degree'},
                    {data: 'date_enter_degree', name: 'date_enter_degree'},
                    {data: 'year', name: 'year'},
                ]
                showData('{{route('manger_subject_exam_student_result_remedial')}}', columns);


            </script>
@endsection

