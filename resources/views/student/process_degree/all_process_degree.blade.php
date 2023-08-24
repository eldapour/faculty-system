@extends('admin.layouts.master')

@section('title')
    {{ trans('student_sidebar.process_exam') }}
@endsection
@section('page_name')
    {{ trans('student_sidebar.process_exam') }}
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
                                <th class="min-w-25px">{{trans('admin.doctor')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.student_degree_before_request')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.student_degree_after_request')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.request_type')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.request_date')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.request_status')}}</th>
                                <th class="min-w-25px">{{trans('process_degree.processing_date')}}</th>
                                <th class="min-w-25px">{{trans('process_exam.delete_request')}}</th>

                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!--Delete MODAL -->
            <div class="modal fade" id="delete_modal"  role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.delete') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input id="delete_id" name="id" type="hidden">
                            <p>{{ trans('admin.sure_delete') }} ? ["<span id="title" class="text-danger"></span>"]</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                                {{ trans('admin.close') }}
                            </button>
                            <button type="button" class="btn btn-danger" id="delete_btn">{{ trans('admin.delete') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL CLOSED -->

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
                    {data: 'exam_code', name: 'exam_code'},
                    {data: 'doctor_name', name: 'doctor_name'},
                    {data: 'student_degree_before_request', name: 'student_degree_before_request'},
                    {data: 'student_degree_after_request', name: 'student_degree_after_request'},
                    {data: 'request_type', name: 'request_type'},
                    {data: 'request_date', name: 'request_date'},
                    {data: 'request_status', name: 'request_status'},
                    {data: 'processing_date', name: 'processing_date'},
                    {data: 'action', name: 'action'},
                ]
                showData('{{route('get-all-process-degrees')}}', columns);
                deleteScript('{{route('delete-process-degrees')}}');

            </script>
@endsection


