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
                    <div class="">
                        <button class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#importExel">
                            <span>
                                <i class="fe fe-download"></i>
                            </span> {{ trans('admin.import') }}
                        </button>
                        <button class="btn btn-success btn-icon exportBtn text-white">
                            <span>
                                <i class="fe fe-upload"></i>
                            </span> {{ trans('admin.export') }}
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                                <tr class="fw-bolder text-muted bg-light">

                                    <th class="min-w-50px">{{ trans('process_exams.id') }}</th>
                                    <th class="min-w-50px">{{ trans('process_exams.identifier_id') }}</th>
                                    <th class="min-w-25px">{{trans('point_statement.user')}}</th>
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
        <div class="modal fade" id="delete_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <div class="modal fade bd-example-modal-lg" id="editOrCreate" data-backdrop="static" role="dialog"
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
    <!-- Import Modal -->
    <div class="modal fade" id="importExel" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.import')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form method="post" id="importExelForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label class="form-label" for="exelFile"></label>
                                <input class="form-control form-control-file dropify" type="file" name="exelFile">
                            </div>
                            <div class="progress d-none">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                    role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 1%"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('admin.close') }}</button>
                                <button type="submit" class="btn btn-primary importBtn">@lang('admin.import')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Import Modal -->
    @include('admin.layouts.myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var columns = [


            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'identifier_id',
                name: 'identifier_id'
            },
            {
                data: 'user_id',
                name: 'user_id'
            },
            {
                data: 'attachment_file',
                name: 'attachment_file'
            },
            {
                data: 'period',
                name: 'period'
            },
            {
                data: 'year',
                name: 'year'
            },
            {
                data: 'request_date',
                name: 'request_date'
            },
            {
                data: 'request_status',
                name: 'request_status'
            },
            {
                data: 'processing_request_date',
                name: 'processing_request_date'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
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
                success: function(data) {
                    if (data.code == 200) {
                        if (data.status == 'new') {
                            $('#dataTable').DataTable().ajax.reload();
                            toastr.success('{{ trans('admin.request_status_is_new') }}');
                        } else if (data.status == 'accept') {
                            $('#dataTable').DataTable().ajax.reload();
                            toastr.success('{{ trans('admin.request_status_is_accepted') }}');
                        } else if (data.status == 'refused') {
                            $('#dataTable').DataTable().ajax.reload();
                            toastr.success('{{ trans('admin.request_status_is_refused') }}');
                        } else if (data.status == 'under_processing') {
                            $('#dataTable').DataTable().ajax.reload();
                            toastr.success('{{ trans('admin.request_status_is_under_processing') }}');
                        }
                    }
                },

                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle the error
                    console.log(textStatus, errorThrown);
                }
            });
        }

        // export exel
        $(document).on('click', '.exportBtn', function() {
            location.href = '{{ route('exportProcess') }}';
        });
        // import exel
        $(document).on("submit", "#importExelForm", function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            var progressDiv = $('.progress');
            var progressBar = $('.progress-bar');
            progressDiv.addClass('d-none');

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('importProcess') }}',
                type: 'POST',
                data: formData,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total * 100;
                            progressBar.css('width', percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                beforeSend: function() {
                    $('.importBtn').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">working</span>').attr('disabled',
                        true);
                    progressDiv.removeClass('d-none');
                },
                success: function(data) {
                    if (data.status === 200) {
                        toastr.success('{{ trans('admin.added_successfully') }}');
                        progressDiv.addClass('d-none');
                        console.log(data.timeout);
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000)

                    } else if (data.status === 500) {
                        toastr.error('error')
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000)
                    }
                },
                error: function(data) {
                    toastr.error('error')
                    setTimeout(function() {
                        // window.location.reload();
                    }, 2000)
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>
@endsection
