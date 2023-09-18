@extends('admin/layouts/master')


@section('title')
    {{ trans('admin.all_documents') }}
@endsection
@section('page_name')
    {{ trans('admin.all_documents') }}
@endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('admin.all_documents') }}</h3>
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
                                    <th class="min-w-25px">{{ trans('document.id') }}</th>
                                    <th class="min-w-25px">{{ trans('document.identifier_id') }}</th>
                                    <th class="min-w-25px">{{trans('point_statement.user')}}</th>

                                    <th class="min-w-25px">{{ trans('document.university_year') }}</th>
                                    <th class="min-w-25px">{{ trans('document.document_type_id') }}</th>
                                    <th class="min-w-25px">{{ trans('document.withdraw_by_proxy') }}</th>
                                    <th class="min-w-25px">{{ trans('document.person_name') }}</th>
                                    <th class="min-w-25px">{{ trans('document.national_id_of_person') }}</th>
                                    <th class="min-w-25px">{{ trans('document.card_image') }}</th>
                                    <th class="min-w-25px">{{ trans('document.request_date') }}</th>
                                    <th class="min-w-25px">{{ trans('document.pull_type') }}</th>
                                    <th class="min-w-25px">{{ trans('document.pull_date') }}</th>
                                    <th class="min-w-25px">{{ trans('document.pull_return') }}</th>
                                    <th class="min-w-25px">{{ trans('document.request_status') }}</th>
                                    <th class="min-w-25px">{{ trans('document.processing_request_date') }}</th>
                                    <th class="min-w-25px">{{ trans('admin.action') }}</th>

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
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="delete_id" name="id" type="hidden">
                        <p>هل تريد حذف طلب الطالب <span id="title" class="text-danger"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                            Back
                        </button>
                        <button type="button" class="btn btn-danger" id="delete_btn">Delete !</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL CLOSED -->

        <!-- Edit MODAL -->
        <div class="modal fade" id="editOrCreate" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="modalContent">

                </div>
            </div>
        </div>
        <!-- Edit MODAL CLOSED -->
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
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var loader = ` <div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>
        `;



        var columns = [{
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
                data: 'university_year',
                name: 'university_year'
            },
            {
                data: 'document_type_id',
                name: 'document_type_id'
            },
            {
                data: 'withdraw_by_proxy',
                name: 'withdraw_by_proxy'
            },
            {
                data: 'person_name',
                name: 'person_name'
            },
            {
                data: 'national_id_of_person',
                name: 'national_id_of_person'
            },
            {
                data: 'card_image',
                name: 'card_image'
            },
            {
                data: 'request_date',
                name: 'request_date'
            },
            {
                data: 'pull_type',
                name: 'pull_type'
            },
            {
                data: 'pull_date',
                name: 'pull_date'
            },
            {
                data: 'pull_return',
                name: 'pull_return'
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

        showData('{{ route('documents.index') }}', columns);
        deleteScript('{{ route('documents.delete') }}');



        //Processing Document from dashboard
        $(document).on('click', '.processing', function(e) {
            e.preventDefault();

            let id = $(this).data("id");
            let processing = $(this).data("processing");

            $.ajax({
                url: '{{ route('documents.processing') }}',
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': id,
                    'processing': processing

                },
                beforeSend: function() {
                    $('#processing_btn_' + processing + '_' + id).html(
                        '<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">جاري الانتظار....</span>').attr(
                        'disabled', true);
                },

                success: function(data) {

                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('The request updated successfully');
                    } else
                        toastr.error('There is an error');
                },

            });
        });

        // export exel
        $(document).on('click', '.exportBtn', function() {
            location.href = '{{ route('exportDocument') }}';
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
                url: '{{ route('importDocument') }}',
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
