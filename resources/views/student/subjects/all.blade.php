@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.subject_students') }}
@endsection
@section('page_name')
    {{ $period->year_start . " - " . \Illuminate\Support\Facades\Auth::user()->first_name . " " .  \Illuminate\Support\Facades\Auth::user()->last_name}}
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

                                {{-- <th class="min-w-25px">{{trans('subject_student.id')}}</th> --}}
                                <th class="min-w-25px">{{trans('subject_student.year')}}</th>
                                <th class="min-w-25px">{{trans('subject_student.unit')}}</th>
                                <th class="min-w-25px">{{trans('subject_student.subject_id')}}</th>
                                <th class="min-w-25px">{{trans('subject_student.group')}}</th>
                                <th class="min-w-25px">{{trans('subject_student.doctor')}}</th>

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
            // {data: 'id', name: 'id'},
            {data: 'year', name: 'year'},
            {data: 'unit_id', name: 'unit_id'},
            {data: 'subject_id', name: 'subject_id'},
            {data: 'group_id', name: 'group_id'},
            {data: 'doctor_id', name: 'doctor_id'},
        ]
        showData('{{route('subject-student-all')}}', columns);

    </script>
@endsection

