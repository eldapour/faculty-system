@extends('admin.layouts.master')

@section('title')
    {{trans('admin.all_users')}}
@endsection
@section('page_name')
    {{trans('admin.all_users')}}
@endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.all_users')}}</h3>
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
									</span> {{trans('admin.add_user')}}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>

                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">{{trans('admin.id')}}</th>
                                <th class="min-w-50px">{{trans('student.image')}}</th>
                                <th class="min-w-50px">{{trans('student.points')}} </th>
                                <th class="min-w-125px">{{trans('student.identifier_id')}}</th>
                                <th class="min-w-125px">{{trans('student.national_number')}}</th>
                                <th class="min-w-125px">{{trans('student.national_id')}}</th>
                                <th class="min-w-125px">{{trans('admin.students_types')}}</th>
                                <th class="min-w-125px">{{trans('student.first_name')}}</th>
                                <th class="min-w-125px">{{trans('student.last_name')}}</th>
                                <th class="min-w-125px">{{trans('student.first_name_latin')}}</th>
                                <th class="min-w-125px">{{trans('student.last_name_latin')}}</th>
                                <th class="min-w-125px">{{trans('student.nationality')}}</th>
                                <th class="min-w-125px">{{trans('student.birthday_date')}}</th>
                                <th class="min-w-125px">{{trans('student.birthday_place')}}</th>
                                <th class="min-w-125px">{{trans('student.city_ar')}}</th>
                                <th class="min-w-125px">{{trans('student.city_latin')}}</th>
                                <th class="min-w-125px">{{trans('student.address')}}</th>
                                <th class="min-w-125px">{{trans('student.country_address_ar')}}</th>
                                <th class="min-w-125px">{{trans('student.country_address_latin')}}</th>
                                <th class="min-w-125px">{{trans('student.email')}}</th>
                                <th class="min-w-125px">{{trans('student.university_email')}}</th>
                                <th class="min-w-125px">{{trans('admin.created_at')}}</th>
                                <th class="min-w-50px rounded-end">{{trans('admin.action')}}</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.delete_data') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="delete_id" name="id" type="hidden">
                        <p>{{ trans('admin.delete_confirm') }} <span id="title" class="text-danger"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                            {{ trans('admin.back') }}
                        </button>
                        <button type="button" class="btn btn-danger" id="delete_btn">{{ trans('admin.delete') }} !</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL CLOSED -->

        <!-- Edit MODAL -->
        <div class="modal fade" id="editOrCreate"  role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
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
    @include('admin.layouts.myAjaxHelper')
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
            {data: 'image', name: 'image'},
            {data: 'points', name: 'points'},
            {data: 'identifier_id', name: 'identifier_id', orderable: true, searchable: true},
            {data: 'national_number', name: 'national_number'},
            {data: 'national_id', name: 'national_id'},
            {data: 'student_type_id', name: 'student_type_id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'first_name_latin', name: 'first_name_latin'},
            {data: 'last_name_latin', name: 'last_name_latin'},
            {data: 'nationality', name: 'nationality'},
            {data: 'birthday_date', name: 'birthday_date'},
            {data: 'birthday_place', name: 'birthday_place'},
            {data: 'city_ar', name: 'city_ar'},
            {data: 'city_latin', name: 'city_latin'},
            {data: 'address', name: 'address'},
            {data: 'country_address_ar', name: 'country_address_ar'},
            {data: 'country_address_latin', name: 'country_address_latin'},
            {data: 'email', name: 'email'},
            {data: 'university_email', name: 'university_email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]


        showData('{{route('users.index')}}', columns);
        deleteScript('{{route('users.delete')}}');

        // Get Edit View
        $(document).on('click', '.editBtn', function () {
            var id = $(this).data('id')
            var url = "{{route('users.edit',':id')}}";
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
                $('#modalContent').load('{{route('users.create')}}')
            }, 250)
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
                        ' ></span> <span style="margin-left: 4px;">{{ trans('admin.Loading') }}</span>').attr('disabled', true);
                },

                success: function (data) {

                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('{{ trans('admin.added_successfully') }}');
                    } else
                        toastr.error('{{ trans('admin.there_is_an_error') }}');
                    $('#addButton').html('{{ trans('admin.create') }}').attr('disabled', false);
                    $('#editOrCreate').modal('hide')
                },

                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('{{ trans('admin.there_is_an_error') }}');
                    } else if (data.status === 422) {

                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value);
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
                        ' ></span> <span style="margin-left: 4px;">{{ trans('admin.working') }}</span>').attr('disabled', true);
                },


                success: function (data) {

                    $('#updateButton').html(`Update`).attr('disabled', false);
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('{{ trans('admin.updated_successfully') }}');
                    } else
                        toastr.error('{{ trans('admin.there_is_an_error') }}');

                    $('#editOrCreate').modal('hide')
                },
                error: function (data) {

                    if (data.status === 500) {
                        toastr.error('{{ trans('admin.there_is_an_error') }}');

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
            location.href = '{{ route('exportUser') }}';
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
                url: '{{ route('importUser') }}',
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


