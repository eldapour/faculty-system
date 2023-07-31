@extends('admin.layouts.master')

@section('title')
    {{ trans('student_result.normal') }}
@endsection
@section('page_name')
    {{ trans('student_result.normal') }}
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
                                <th class="min-w-25px">{{ trans('student_result.identifier_id') }}</th>
                                <th class="min-w-25px">{{ trans('student_result.student') }}</th>
                                <th class="min-w-25px">{{ trans('student_result.unit') }}</th>
                                <th class="min-w-25px">{{ trans('student_result.group') }}</th>
                                <th class="min-w-25px">{{ trans('student_result.subject') }}</th>
                                <th class="min-w-25px">{{ trans('student_result.doctor') }}</th>
                                <th class="min-w-25px">{{ trans('student_result.student_degree') }}</th>
                                <th class="min-w-25px">{{ trans('student_result.exam_degree') }}</th>
                                <th class="min-w-25px">{{ trans('student_result.period') }}</th>
                                <th class="min-w-25px">{{ trans('student_result.year') }}</th>
                                <th class="min-w-25px">{{ trans('student_result.date_enter_degree') }}</th>
                                <th class="min-w-25px">{{ trans('student_result.add_request') }}</th>

                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Edit MODAL -->
            <div class="modal fade" id="editOrCreate"  role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" id="modalContent">

                    </div>
                </div>
            </div>
            <!-- Edit MODAL CLOSED -->
        </div>


        @include('admin.layouts.myAjaxHelper')
        @endsection
        @section('ajaxCalls')
            <script>
                var columns = [
                    {data: 'identifier_id', name: 'identifier_id'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'unit_id', name: 'unit_id'},
                    {data: 'group_id', name: 'group_id'},
                    {data: 'subject_id', name: 'subject_id'},
                    {data: 'doctor_id', name: 'doctor_id'},
                    {data: 'student_degree', name: 'student_degree'},
                    {data: 'exam_degree', name: 'exam_degree'},
                    {data: 'period', name: 'period'},
                    {data: 'year', name: 'year'},
                    {data: 'date_enter_degree', name: 'date_enter_degree'},
                    {data: 'add_request', name: 'add_request'},
                ]
                showData('{{route('subject-exam-result-normal')}}', columns);

                // Get Add View
                $(document).on('click', '.add-request', function () {
                    let id = $(this).data('id')
                    let url = "{{route('create-process-degree-normal',':id')}}";
                    url = url.replace(':id', id)
                    $('#modalContent').html(loader)
                    $('#editOrCreate').modal('show')
                    setTimeout(function () {
                        $('#modalContent').load(url)
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
                                toastr.success('Request Added Successfully');
                            } else
                                toastr.error('There is an error');
                            $('#addButton').html('{{ trans('admin.add') }}').attr('disabled', false);
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

            </script>

@endsection

