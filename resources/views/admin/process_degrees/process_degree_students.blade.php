@extends('admin/layouts/master')


@section('title')
    {{ trans('admin.process_degrees') }}
@endsection
@section('page_name')
    {{ trans('admin.process_degrees') }}
@endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('admin.process_degrees_admin') }}</h3>
                    <div class="">
                        <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span> {{ trans('admin.add') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                                <tr class="fw-bolder text-muted bg-light">
                                    <th class="min-w-25px">#</th>
                                    <th class="min-w-50px">{{ trans('admin.exam_code') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.unit') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.subject') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.doctor') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.section') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.student_degree_before_request') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.request_type') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.year') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.request_status') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.student_degree_after_request') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.processing_date') }}</th>
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
        <div class="modal fade" id="editOrCreate" data-backdrop="static"  role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">{{ trans('admin.add') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="@lang('admin.close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Edit MODAL CLOSED -->

        <!-- Modal Subject Exam Student Result -->

        <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">{{ trans('admin.edit_degree_student') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="addForm" class="addForm" method="POST" action="{{ route('process_degrees.store') }}">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="department_branch_id" class="form-control-label">@lang('admin.exam_degree_actuel')</label>
                                        <input type="number" step="any" name="" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="department_branch_id" class="form-control-label">@lang('admin.The_students_grade_after_adjustment')</label>
                                        <input type="number" step="any" name="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
                                <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Subject Exam Student Result -->
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

        var columns = [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'exam_code',
                name: 'exam_code'
            },
            {
                data: 'unit',
                name: 'unit'
            },
            {
                data: 'subject',
                name: 'subject'
            },
            {
                data: 'doctor',
                name: 'doctor'
            },
            {
                data: 'section',
                name: 'section'
            },
            {
                data: 'student_degree_before_request',
                name: 'student_degree_before_request'
            },
            {
                data: 'request_type',
                name: 'request_type'
            },
             {
                data: 'year',
                name: 'year'
            },
            {
                data: 'request_status',
                name: 'request_status'
            },
            {
                data: 'student_degree_after_request',
                name: 'student_degree_after_request'
            },
            {
                data: 'processing_date',
                name: 'processing_date'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]

        showData('{{ route('processDegreeStudent') }}', columns);
        destroyScript('{{ route('process_degrees.destroy', ':id') }}');
        showEditModal('{{route('process_degrees.edit',':id')}}');
        editScript();

         // Get Add View
         $(document).on('click', '.addBtn', function () {
            $('#modal-body').html(loader)
            $('#editOrCreate').modal('show')
            setTimeout(function () {
                $('#modal-body').load('{{route('process_degrees.create')}}')
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
                        toastr.success('{{ trans('admin.the_remedial_request_has_been_registered_successfully') }}');
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
