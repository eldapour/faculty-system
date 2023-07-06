@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.subject_exams') }}
@endsection
@section('page_name')
    {{ trans('admin.subject_exams') }}
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                        <button class="btn btn-success btnPrint1">
                            <i class="fa fa-print"></i>
                            {{ trans('admin.Print') }}
                        </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>

                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-50px">{{ trans('admin.unit_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.subject_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.group_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.doctor_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.day_name_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.date_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.time_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.section_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.exam_code_') }}</th>
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
            {data: 'unit_id', name: 'unit_id'},
            {data: 'subject_id', name: 'subject_id'},
            {data: 'group_id', name: 'group_id'},
            {data: 'doctor_id', name: 'doctor_id'},
            {data: 'exam_day', name: 'exam_day'},
            {data: 'exam_date', name: 'exam_date'},
            {data: 'time', name: 'time'},
            {data: 'section', name: 'section'},
            {data: 'exam_code', name: 'exam_code'},
        ]
        showData('{{route('subject_exams.students.all')}}', columns);

        $(document).on('click','.btnPrint1',function(){
            window.open('{{route('subject_exams.print')}}',"_blank");
        });

    </script>
@endsection

