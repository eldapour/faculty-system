@extends('admin/layouts/master')


@section('title')  {{trans('admin.all_documents')}} @endsection
@section('page_name') {{trans('admin.all_documents')}} @endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.all_documents')}}</h3>
                    <div class="">
                        <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span>{{trans('admin.add_document')}}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">{{trans('admin.document_id')}}</th>
                                <th class="min-w-25px">{{trans('admin.student_name')}}</th>
                                <th class="min-w-25px">{{trans('admin.identifier_id_student')}} </th>
                                <th class="min-w-25px">{{trans('admin.document_type')}} </th>
                                <th class="min-w-25px">{{trans('admin.withdraw_by_proxy')}} </th>
                                <th class="min-w-25px">{{trans('admin.person_name')}}  </th>
                                <th class="min-w-25px">{{trans('admin.national_id_of_person')}} 	 </th>
                                <th class="min-w-25px">{{trans('admin.card_image')}} 	 </th>
                                <th class="min-w-25px">{{trans('admin.request_date')}}  </th>
                                <th class="min-w-25px">{{trans('admin.pull_type')}} 	 </th>
                                <th class="min-w-25px">{{trans('admin.pull_date')}}  </th>
                                <th class="min-w-25px">{{trans('admin.pull_return')}} </th>
                                <th class="min-w-25px">{{trans('admin.request_status')}} </th>
                                <th class="min-w-25px">{{trans('admin.processing_request_date')}} </th>
                                <th class="min-w-25px">{{trans('admin.action')}}</th>

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
        <div class="modal fade" id="editOrCreate"  role="dialog" aria-hidden="true">
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
            {data: 'user_id', name: 'user_id'},
            {data: 'identifier_id', name: 'identifier_id'},
            {data: 'document_type_id', name: 'document_type_id'},
            {data: 'withdraw_by_proxy', name: 'withdraw_by_proxy'},
            {data: 'person_name', name: 'person_name'},
            {data: 'national_id_of_person', name: 'national_id_of_person'},
            {data: 'card_image', name: 'card_image'},
            {data: 'request_date', name: 'request_date'},
            {data: 'pull_type', name: 'pull_type'},
            {data: 'pull_date', name: 'pull_date'},
            {data: 'pull_return', name: 'pull_return'},
            {data: 'request_status', name: 'request_status'},
            {data: 'processing_request_date', name: 'processing_request_date'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]



        showData('{{route('documents.student')}}', columns);
        deleteScript('{{route('documents.delete')}}');


        // Get Add View
        $(document).on('click', '.addBtn', function () {
            $('#modalContent').html(loader)
            $('#editOrCreate').modal('show')
            setTimeout(function () {
                $('#modalContent').load('{{route('documents.create')}}')
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
                        ' ></span> <span style="margin-left: 4px;">working</span>').attr('disabled', true);
                },

                success: function (data) {
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('Document type added successfully');
                    }
                    else
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
                                $.each(value, function (key, value){
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


    </script>

@endsection


