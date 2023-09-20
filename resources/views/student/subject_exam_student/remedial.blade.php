@extends('admin.layouts.master')

@section('title')
    {{ trans('student_sidebar.subject_exam_students_remedial') }}
@endsection
@section('page_name')
    {{ trans('student_sidebar.subject_exam_students_remedial') }}
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">

                @if($period_remedial)
                <div class="card-header">
                    <button class="btn btn-info btn-icon text-white"
                            id="printBtn">
                            <span>
                                <i class="fe fe-file-text"></i>
                            </span>
                        {{ trans('admin.Print') }}
                    </button>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>


                            <tr class="fw-bolder text-muted bg-light">
                                {{-- <th class="min-w-25px">{{trans('subject_student_data.id')}}</th> --}}
                                <th class="min-w-25px">{{trans('subject_student_data.identifier_id')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.subject_code')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.group_id')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.exam_day')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.exam_date')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.time_start')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.time_end')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.period')}}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.year')}}</th>
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
                    // {data: 'id', name: 'id'},
                    {data: 'identifier_id', name: 'identifier_id'},
                    {data: 'code', name: 'code'},
                    {data: 'group_id', name: 'group_id'},
                    {data: 'exam_day', name: 'exam_day'},
                    {data: 'exam_date', name: 'exam_date'},
                    {data: 'time_start', name: 'time_start'},
                    {data: 'time_end', name: 'time_end'},
                    {data: 'period', name: 'period'},
                    {data: 'year', name: 'year'},
                    {data: 'exam_number', name: 'exam_number'},
                    {data: 'section', name: 'section'},
                ]
                showData('{{route('subject-exam-student-remedial')}}', columns);

                $(document).on('click', '#printBtn',function(){
                    window.location.href='{{ route('subject_exams.printRemedial') }}';
                })

            </script>
@endsection

