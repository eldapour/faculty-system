@extends('admin/layouts/master')

@section('title')  {{trans('doctor.all_doctors')}} @endsection
@section('page_name') {{trans('doctor.all_doctors')}} @endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('doctor.all_doctors')}}</h3>
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
                        <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span>{{trans('doctor.add_doctor')}}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>


                            <tr class="fw-bolder text-muted bg-light">

                                <th class="min-w-25px">{{trans('doctor.id')}}</th>
                                <th class="min-w-25px">{{trans('doctor.name')}}</th>
                                <th class="min-w-25px">{{trans('doctor.name_latin')}}</th>
                                <th class="min-w-25px">{{trans('doctor.professor_position')}}</th>
                                <th class="min-w-125px">{{trans('admin.action')}}</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="delete_id" name="id" type="hidden">
                        <p>هل تريد حذف المستخدم <span id="title" class="text-danger"></span>?</p>
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
        <div class="modal fade" id="editOrCreate"  role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="modalContent">

                </div>
            </div>
        </div>
        <!-- Edit MODAL CLOSED -->
    </div>
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
    </div>
        <!-- Import Modal -->
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        $('.dropify').dropify();
        var loader = ` <div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>
        `;

        var columns = [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'name_latin', name: 'name_latin'},
            {data: 'professor_position', name: 'professor_position'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]


        showData('{{route('doctors.index')}}', columns);
        deleteScript('{{route('doctors.delete')}}');

        // Get Edit View
        $(document).on('click', '.editBtn', function () {
            var id = $(this).data('id')
            var url = "{{route('doctors.edit',':id')}}";
            url = url.replace(':id', id)
            $('#modalContent').html(loader)
            $('#editOrCreate').modal('show')

            setTimeout(function () {
                $('#modalContent').load(url)
            }, 250)
            setTimeout(function () {
            }, 500)
        })

        // Get Add View
        $(document).on('click', '.addBtn', function () {
            $('#modalContent').html(loader)
            $('#editOrCreate').modal('show')
            setTimeout(function () {
                $('#modalContent').load('{{route('doctors.create')}}')
            }, 250)
        });

        // Add By Ajax
        $(document).on('submit','Form#addForm',function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#addForm').attr('action');
            $.ajax({

                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#addButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">{{ trans('admin.Loading') }}</span>').attr('disabled', true);
                },

                success: function (data) {
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('{{ trans('admin.added_successfully') }}');
                    }
                    else
                        toastr.error('There is an error');
                    $('#addButton').html(`{{ trans('admin.add') }}`).attr('disabled', false);
                    $('#editOrCreate').modal('hide')
                },

                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('{{ trans('admin.something_went_wrong') }}');
                    } else if (data.status === 422) {

                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value){
                                    toastr.error(value, key);
                                });
                            }
                        });
                    } else
                        toastr.error('there in an error');
                    $('#addButton').html(`{{ trans('admin.add') }}`).attr('disabled', false);
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        });



        // Update By Ajax
        $(document).on('submit','Form#updateForm',function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#updateForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#updateButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">working</span>').attr('disabled', true);
                },


                success: function (data) {

                    $('#updateButton').html(`Update`).attr('disabled', false);
                    if (data.status == 200){
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('{{ trans('admin.updated_successfully') }}');
                    }
                    else
                        toastr.error('{{ trans('admin.something_went_wrong') }}');

                    $('#editOrCreate').modal('hide')
                },
                error: function (data) {

                    if (data.status === 500) {
                        toastr.error('{{ trans('admin.something_went_wrong') }}');

                    } else if (data.status === 422) {

                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value){
                                    toastr.error(value, key);
                                });
                            }
                        });
                    } else
                        toastr.error('{{ trans('admin.something_went_wrong') }}');
                    $('#updateButton').html(`Update`).attr('disabled', false);
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });


        // export exel
        $(document).on('click', '.exportBtn', function () {
            location.href = '{{ route('exportDoctor') }}';
        });
        // import exel
        $(document).on("submit", "#importExelForm", function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            var progressDiv = $('.progress');
            var progressBar = $('.progress-bar');
            progressDiv.addClass('d-none');

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('importDoctor') }}',
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


