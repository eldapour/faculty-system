@extends('admin/layouts/master')


@section('title')
    {{ trans('admin.process_exam_students') }}
@endsection
@section('page_name')
    {{ trans('admin.process_exam_students') }}
@endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('admin.process_exam_students') }}</h3>
                    <a class="btn btn-danger text-white">{{ trans('admin.You_are_only') }}</a>
                    <div class="">
                        <?php $count = App\Models\ProcessExam::count(); ?>
                        @if ($count > 0)
                            <button class="btn btn-secondary btn-icon text-white addBtn" disabled>
                                <span>
                                    <i class="fe fe-plus"></i>
                                </span> {{ trans('admin.add') }}
                            </button>
                        @else
                            <button class="btn btn-secondary btn-icon text-white addBtn">
                                <span>
                                    <i class="fe fe-plus"></i>
                                </span> {{ trans('admin.add') }}
                            </button>
                        @endif
                    </div>
                </div>
                {{--  <?php return $process_exam_students; ?>  --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                                <tr class="fw-bolder text-muted bg-light">
                                    <th class="min-w-25px">#</th>
                                    <th class="min-w-50px">{{ trans('admin.attachment_file') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.period') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.year') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.reason') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.request_date') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.request_status') }}</th>
                                    <th class="min-w-50px rounded-end">{{ trans('admin.actions') }}</th>

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
        <div class="modal fade" id="editOrCreate" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
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

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                        <label for="department_branch_id"
                                            class="form-control-label">@lang('admin.exam_degree_actuel')</label>
                                        <input type="number" step="any" name="" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="department_branch_id"
                                            class="form-control-label">@lang('admin.The_students_grade_after_adjustment')</label>
                                        <input type="number" step="any" name="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('admin.close') }}</button>
                                <button type="submit" class="btn btn-primary"
                                    id="addButton">{{ trans('admin.update') }}</button>
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
                data: 'reason',
                name: 'reason'
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
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]



        showData('{{ route('processExamStudent') }}', columns);
        deleteScriptExam('{{ route('process_exams.destroy', ':id') }}');
        showEditModal('{{ route('process_exams.edit', ':id') }}');
        editScript();



        // Get Add View
        $(document).on('click', '.addBtn', function() {
            $('#modal-body').html(loader)
            $('#editOrCreate').modal('show')
            setTimeout(function() {
                $('#modal-body').load('{{ route('process_exams.create') }}')
            }, 250)
        });

        // Add By Ajax
        $(document).on('submit', 'Form#addForm', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#addForm').attr('action');
            $.ajax({

                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('#addButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">working</span>').attr('disabled',
                        true);
                },

                success: function(data) {
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success(
                            '{{ trans('admin.the_remedial_request_has_been_registered_successfully') }}'
                        );
                    } else
                        toastr.error('There is an error');
                    $('#addButton').html(`Create`).attr('disabled', false);
                    $('#editOrCreate').modal('hide')
                    setTimeout(function(){
                        location.reload(true);
                     }, 3000); // 5 seconds
                },

                error: function(data) {
                    if (data.status === 500) {
                        toastr.error('There is an error');
                    } else if (data.status === 422) {

                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function(key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function(key, value) {
                                    toastr.error(value, key);
                                });
                            }
                        });
                    } else
                        toastr.error('there in an error');
                    $('#addButton').html(`Create`).attr('disabled', false);
                }, //end error method
                cache: false,
                contentType: false,
                processData: false
            });
        });


        function updateRequestStatus(selectElement, id) {
            var selectedValue = $(selectElement).val();

            // Make an Ajax request to update the status
            $.ajax({
                url: '{{ route('RequestStatusDegree') }}',
                type: 'post',
                data: {
                    id: id,
                    status: selectedValue,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    if (data.code == 200) {
                        if (data.status == 'new') {
                            toastr.success('{{ trans('admin.request_status_is_new') }}');
                        } else if (data.status == 'accept') {
                            // Show the modal when the status is 'accept'
                            $('#myModal').modal('show');
                            toastr.success('{{ trans('admin.request_status_is_accepted') }}');
                        } else if (data.status == 'refused') {
                            toastr.success('{{ trans('admin.request_status_is_refused') }}');
                        } else if (data.status == 'under_processing') {
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
    </script>
@endsection
