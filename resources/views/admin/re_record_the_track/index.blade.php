@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.re_record_the_track') }}
@endsection
@section('page_name')
    {{ trans('admin.re_record_the_track') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
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
                                    <th class="min-w-50px">{{ trans('admin.register_year') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.department_branch_name') }}</th>
                                    <th class="min-w-50px">{{ trans('admin.branch_restart_register') }}</th>
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
        <div class="modal fade bd-example-modal-lg" id="editOrCreate" data-backdrop="static" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">{{ trans('admin.group') }}</h5>
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

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.re_record_the_track') }}</h5>
                    </div>
                    <div class="modal-body">
                        <p>{{ trans('admin.this_process_is_extended') }} .'2023-02-05'.  {{ trans('admin.until_an_end') }} .'2023-02-08'. </p>
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>




    </div>
    @include('admin.layouts.myAjaxHelper')
@endsection
@section('ajaxCalls')
    // this code to get parameter sended from footer page when student logged in but not recored the department
    <?php
$additionalData = request()->input('data');

if (!empty($additionalData)) { ?>
    <script>
        $("#myModal").modal("show");
    </script>
    <?php       }
?>
    <script>
        var columns = [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'register_year',
                name: 'register_year'
            },
            {
                data: 'department_branch_id',
                name: 'department_branch_id'
            },
            {
                data: 'branch_restart_register',
                name: 'branch_restart_register'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
        showData('{{ route('group.index') }}', columns);
        // Delete Using Ajax
        destroyScript('{{ route('group.destroy', ':id') }}');
        // Add Using Ajax
        showAddModal('{{ route('group.create') }}');
        addScript();
        // Add Using Ajax
        showEditModal('{{ route('group.edit', ':id') }}');
        editScript();

        // this function make refresh if user try to ignore this modal
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') { // Check if ESC key is pressed
                toastr.info('{{ trans('admin.You_must_re_register') }}');
                location.reload(); // Reload the page
            }
        });
    </script>
@endsection
