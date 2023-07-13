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
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    @if(auth()->user()->user_type == 'student')
                    @else
                    <div class="">
                        <button class="btn btn-primary btn-icon text-white"
                                data-toggle="modal" data-target="#importExel">
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
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>


                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">{{trans('point_statement.id')}}</th>
                                <th class="min-w-25px">{{trans('point_statement.identifier_id')}}</th>
                                <th class="min-w-25px">{{trans('point_statement.element_code')}}</th>
                                <th class="min-w-25px">{{trans('point_statement.degree_student')}}</th>
                                <th class="min-w-25px">{{trans('point_statement.degree_element')}}</th>
                                <th class="min-w-25px">{{trans('point_statement.period')}}</th>
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
        <div class="modal fade bd-example-modal-lg" id="editOrCreate" data-backdrop="static"  role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">{{ trans('admin.point statement') }}</h5>
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

        <!-- Import Modal -->
        <div class="modal fade" id="importExel"  role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
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
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar"
                                         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 1%"></div>
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
            <!-- Import Modal -->
    </div>
    @include('admin.layouts.myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>


        var columns = [
            {data: 'id', name: 'id'},
            {data: 'identifier_id', name: 'identifier_id'},
            {data: 'element_code', name: 'element_code'},
            {data: 'degree_student', name: 'degree_student'},
            {data: 'degree_element', name: 'degree_element'},
            {data: 'period', name: 'period'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('points.index')}}', columns);
        // Delete Using Ajax
        destroyScript('{{route('points.destroy',':id')}}');

        showEditModal('{{route('points.edit',':id')}}');
        editScript();

        $(document).on('click', '.exportBtn', function () {
            location.href = '{{ route('exportPointStatement') }}';
        });

        $(document).on("submit", "#importExelForm", function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            var progressDiv = $('.progress');
            var progressBar = $('.progress-bar');
            progressDiv.addClass('d-none');

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('importPointStatement') }}',
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
                beforeSend: function () {
                    $('.importBtn').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">working</span>').attr('disabled', true);
                    progressDiv.removeClass('d-none');
                },
                success: function (data) {
                    if (data.status === 200) {
                        toastr.success('{{ trans('admin.added_successfully') }}');
                        progressDiv.addClass('d-none');
                        console.log(data.timeout);
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000)

                    } else if (data.status === 500) {
                        toastr.error('error')
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000)
                    }
                },
                error: function (data) {
                    toastr.error('error')
                    setTimeout(function () {
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

