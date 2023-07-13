@extends('admin/layouts/master')

@section('title')
    {{ trans('admin.diploma_all') }}
@endsection
@section('page_name')
    {{ trans('admin.diploma_all') }}
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('admin.registered_units') }}</h3>

                </div>
                <div class="card-body">
                    <h2 class="text-center">{{trans('admin.college_enrollment_certificate')}}</h2>
                    <h5 class="">{{trans('admin.dean_of_college_testifies')}} </h5>
                    <table class="table table-bordered text-nowrap w-50" id="">

                        <tbody>

                            <tr>
                                <td>{{trans('admin.full_name')}}</td>
                                <td>{{auth()->user()->first_name.' '.auth()->user()->last_name}}</td>
                            </tr>
                            <tr>
                                <td>{{trans('admin.identifier_id_student')}}</td>
                                <td>{{auth()->user()->identifier_id}}</td>
                            </tr>
                            <tr>
                                <td>{{trans('admin.job_id')}}</td>
                                <td>{{auth()->user()->job_id}}</td>
                            </tr>
                            <tr>
                                <td>{{trans('admin.national_id')}}</td>
                                <td>{{auth()->user()->national_id}}</td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
{{--                                <th class="min-w-25px">{{trans('admin.diploma_id')}}</th>--}}
                                <th class="min-w-50px"> {{ trans('admin.unit_name_lang') }}</th>
                                <th class="min-w-50px"> {{ trans('admin.semester') }}</th>


                            </tr>
                            </thead>
                            <tbody>
                            @forelse($semesters as $semester)
                            <tr>
                                <td>{{$semester->subject->getTranslation('subject_name', app()->getLocale())}}</td>
                                <td>{{$semester->subject->unit->unit_code}}</td>
                            </tr>
                                @empty
                                <tr>
                                    <td colspan="2"></td>

                                </tr>
                            @endforelse
                            </tbody>
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
                        <h5 class="modal-title" id="exampleModalLabel">حذف بيانات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="delete_id" name="id" type="hidden">
                        <p>هل تريد حذف الشهاده <span id="title" class="text-danger"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                            اغلاق
                        </button>
                        <button type="button" class="btn btn-danger" id="delete_btn">حذف !</button>
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
        <!-- Import Modal -->
    </div>
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

        var columns = [
            {data: 'id', name: 'id'},
            {data: 'certificate_type_id', name: 'certificate_type_id'},
            {data: 'situation_with_management', name: 'situation_with_management'},
            {data: 'situation_with_treasury', name: 'situation_with_treasury'},
            {data: 'description_situation_with_management', name: 'description_situation_with_management'},
            {data: 'description_situation_with_treasury', name: 'description_situation_with_treasury'},
            {data: 'validation_year', name: 'validation_year'},
            {data: 'identifier_id', name: 'identifier_id'},
            {data: 'user_id', name: 'user_id'},
            {data: 'created_at', name: 'created_at'},
            {data: 'year', name: 'year'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]


        showData('{{route('certificates.index')}}', columns);
        deleteScript('{{route('certificates.delete')}}');

        // Get Edit View
        $(document).on('click', '.editBtn', function () {
            var id = $(this).data('id')
            var url = "{{route('certificates.edit',':id')}}";
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
            //setTimeout(function () {
            $('#modalContent').load('{{route('certificates.create')}}')
            // }, 250)
        });

        // Add By Ajax
        $(document).on('submit', 'Form#addForm', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#addForm').attr('action');
            $.ajax({

                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#addButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">working</span>').attr('disabled', true);
                },

                success: function (data) {
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('Certificate added successfully');
                    } else
                        toastr.error('There is an error');
                    $('#addButton').html(`Create`).attr('disabled', false);
                    $('#editOrCreate').modal('hide')
                },

                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('There is an error');
                    } else if (data.status === 422) {

                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value, key);
                                });
                            }
                        });
                    } else
                        toastr.error('there in an error');
                    $('#addButton').html(`Create`).attr('disabled', false);
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        });


        // Update By Ajax
        $(document).on('submit', 'Form#updateForm', function (e) {
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
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('Certificate updated successfully');
                    } else
                        toastr.error('There is an error');

                    $('#editOrCreate').modal('hide')
                },
                error: function (data) {

                    if (data.status === 500) {
                        toastr.error('There is an error');

                    } else if (data.status === 422) {

                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value, key);
                                });
                            }
                        });
                    } else
                        toastr.error('there in an error');
                    $('#updateButton').html(`Update`).attr('disabled', false);
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });

        $(document).on('click', '.exportBtn', function () {
            location.href = '{{ route('exportCertificate') }}';
        });

        $(document).on("submit", "#importExelForm", function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            var progressDiv = $('.progress');
            var progressBar = $('.progress-bar');
            progressDiv.addClass('d-none');

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('importCertificate') }}',
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



