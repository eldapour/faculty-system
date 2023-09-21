@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.point statement') }}
@endsection
@section('page_name')
    {{ trans('admin.point statement') }}
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
                                <th class="min-w-25px">{{trans('point_statement.id')}}</th>
                                <th class="min-w-25px">{{trans('point_statement.identifier_id')}}</th>
                                <th class="min-w-25px">{{trans('point_statement.user')}}</th>
                                <th class="min-w-25px">{{trans('point_statement.year')}}</th>
                                <th class="min-w-25px">{{trans('admin.element_code')}}</th>
                                <th class="min-w-25px">{{trans('admin.element')}}</th>
                                <th class="min-w-25px">{{trans('point_statement.degree_student')}}</th>
                                <th class="min-w-25px">{{trans('point_statement.degree_element')}}</th>
                                <th class="min-w-25px">{{trans('point_statement.period')}}</th>
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
                    {data: 'year', name: 'year'},
                    {data: 'element_code', name: 'element_code'},
                    {data: 'element_name', name: 'element_name'},
                    {data: 'degree_student', name: 'degree_student'},
                    {data: 'degree_element', name: 'degree_element'},
                    {data: 'course', name: 'course'},
                ]
                showData('{{route('manger_point_statement_index')}}', columns);

            </script>
@endsection

