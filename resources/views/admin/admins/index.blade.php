@extends('admin/layouts/master')

@section('title')  {{trans('admin.all_admins')}} @endsection
@section('page_name') {{trans('admin.all_admins')}} @endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.all_admins')}}</h3>
                    <div class="">
                        <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span>{{trans('admin.add_admin')}}
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
                                <th class="min-w-50px">{{trans('admin.image_admin')}}</th>
                                <th class="min-w-50px">{{trans('admin.first_name')}}</th>
                                <th class="min-w-125px">{{trans('admin.last_name')}}</th>
                                <th class="min-w-125px">{{trans('student.first_name_latin')}}</th>
                                <th class="min-w-125px">{{trans('student.last_name_latin')}}</th>
                                <th class="min-w-125px">{{trans('admin.email')}}</th>
                                <th class="min-w-125px">{{trans('admin.user_type')}}</th>
                                <th class="min-w-125px">{{trans('admin.job_id')}}</th>
                                <th class="min-w-125px">{{trans('admin.action')}}</th>
                            </tr>

                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Delete MODAL -->
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
        <div class="modal fade" id="editOrCreate" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="modalContent">

                </div>
            </div>
        </div>
        <!-- Edit MODAL CLOSED -->
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
            {data: 'image', name: 'image'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'first_name_latin', name: 'first_name_latin'},
            {data: 'last_name_latin', name: 'last_name_latin'},
            {data: 'email', name: 'email'},
            {data: 'user_type', name: 'user_type'},
            {data: 'job_id', name: 'job_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]



        showData('{{route('admins.index')}}', columns);
        deleteScript('{{route('admins.delete')}}');

        // Get Edit View
        $(document).on('click', '.editBtn', function () {
            var id = $(this).data('id')
            var url = "{{route('admins.edit',':id')}}";
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
                $('#modalContent').load('{{route('admins.create')}}')
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


    </script>



@endsection


