@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.process_exams') }}
@endsection
@section('page_name')
    {{ trans('admin.process_exams') }}
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

                                    <th class="min-w-50px">{{ trans('process_exams.id') }}</th>
                                    <th class="min-w-50px">{{ trans('process_exams.identifier_id') }}</th>
                                    <th class="min-w-50px">{{ trans('process_exams.attachment_file') }}</th>
                                    <th class="min-w-50px">{{ trans('process_exams.period') }}</th>
                                    <th class="min-w-50px">{{ trans('process_exams.university_year') }}</th>
                                    <th class="min-w-50px">{{ trans('process_exams.request_date') }}</th>
                                    <th class="min-w-50px">{{ trans('process_exams.request_status') }}</th>
                                    <th class="min-w-50px">{{ trans('process_exams.processing_date') }}</th>
                                    <th class="min-w-50px rounded-end">{{ trans('admin.actions') }}</th>
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
        <div class="modal fade bd-example-modal-lg" id="editOrCreate" data-backdrop="static"  role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">{{ trans('admin.process_degree') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

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
        var columns = [


            {data: 'id', name: 'id'},
            {data: 'identifier_id', name: 'identifier_id'},
            {data: 'attachment_file', name: 'attachment_file'},
            {data: 'period', name: 'period'},
            {data: 'year', name: 'year'},
            {data: 'request_date', name: 'request_date'},
            {data: 'request_status', name: 'request_status'},
            {data: 'processing_request_date', name: 'processing_request_date'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{ route('process_exams.index') }}', columns);
        // Delete Using Ajax
        destroyScript('{{ route('process_exams.destroy', ':id') }}');
        // Add Using Ajax
        //showAddModal('{{ route('process_exams.create') }}');
        //addScript();
        // Add Using Ajax
        //showEditModal('{{ route('process_exams.edit', ':id') }}');
        //editScript();

        function updateRequestStatus(selectElement, id) {
            var selectedValue = $(selectElement).val();

            // Make an Ajax request to update the status
            $.ajax({
                url: '{{ route('updateRequestStatus') }}',
                type: 'post',
                data: {
                    id: id,
                    status: selectedValue,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    if(data.code == 200)
                    {
                        if(data.status == 'new')
                        {
                            toastr.success('{{ trans('admin.request_status_is_new') }}');
                        }
                        else if(data.status == 'accept')
                        {
                            toastr.success('{{ trans('admin.request_status_is_accepted') }}');
                        }
                        else if(data.status == 'refused')
                        {
                            toastr.success('{{ trans('admin.request_status_is_refused') }}');
                        }
                        else if(data.status == 'under_processing')
                        {
                            toastr.success('{{ trans('admin.request_status_is_under_processing') }}');
                        }
                    }
                },

                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle the error
                    console.log(textStatus, errorThrown);
                }
            });
        }

    </script>
@endsection
