@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.all_schedules') }}
@endsection
@section('page_name')
    {{ trans('admin.all_schedules') }}
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
                                <th class="min-w-50px">{{ trans('admin.department_name') }}</th>
                                <th class="min-w-50px">{{ trans('admin.unit_name') }}</th>
                                <th class="min-w-50px">{{ trans('admin.description_text') }}</th>
                                <th class="min-w-50px">{{ trans('admin.schedule_pdf_upload') }}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
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

        <!-- Create Or Edit Modal -->
        <div class="modal fade bd-example-modal-lg" id="editOrCreate" data-backdrop="static"  role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3"> {{ trans('admin.add_schedule') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modalContent" id="modalContent">

                    </div>
                </div>
            </div>
        </div>
        <!-- Create Or Edit Modal -->
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
            {data: 'id', name: 'id'},
            {data: 'department_id', name: 'department_id'},
            {data: 'unit_id', name: 'unit_id'},
            {data: 'description', name: 'description'},
            {data: 'pdf_upload', name: 'pdf_upload'},
        ]

        showData('{{route('schedules.students.all')}}', columns);

    </script>


@endsection


