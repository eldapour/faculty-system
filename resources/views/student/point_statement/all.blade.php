@extends('admin.layouts.master')

@section('title')
    {{ trans('point_statement_student.points') }}
@endsection
@section('page_name')
    {{ trans('point_statement_student.points') }}
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



                                <th class="min-w-50px">{{ trans('point_statement_student.identifier_id') }}</th>
                                <th class="min-w-50px">{{ trans('point_statement_student.student') }}</th>
                                <th class="min-w-50px">{{ trans('point_statement_student.element_code') }}</th>
                                <th class="min-w-50px">{{ trans('point_statement_student.degree_student') }}</th>
                                <th class="min-w-50px">{{ trans('point_statement_student.degree_element') }}</th>
                                <th class="min-w-50px">{{ trans('point_statement_student.period') }}</th>
                                <th class="min-w-50px">{{ trans('point_statement_student.year') }}</th>

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
        var loader = ` <div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>
        `;

        var columns = [
            {data: 'identifier_id', name: 'identifier_id'},
            {data: 'user_id', name: 'user_id'},
            {data: 'element_id', name: 'element_id'},
            {data: 'degree_student', name: 'degree_student'},
            {data: 'degree_element', name: 'degree_element'},
            {data: 'course', name: 'course'},
            {data: 'year', name: 'year'},

        ]

        showData('{{route('point-statement-student')}}', columns);

    </script>


@endsection


