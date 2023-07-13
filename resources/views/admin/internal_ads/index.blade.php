@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.internal_ads') }}
@endsection
@section('page_name')
    {{ trans('admin.internal_ads') }}
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
                                <th class="min-w-50px">{{ trans('admin.title') }}</th>
                                <th class="min-w-50px">{{ trans('admin.desc') }}</th>
                                <th class="min-w-50px">{{ trans('admin.time_ads') }}</th>
                                <th class="min-w-50px">{{ trans('admin.url_ads') }}</th>
                                <th class="min-w-50px">{{ trans('admin.status') }}</th>
                                <th class="min-w-50px">{{ trans('admin.service') }}</th>
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
                        <h5 class="modal-title" id="example-Modal3">{{ trans('admin.ad') }}</h5>
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
    </div>
    @include('admin.layouts.myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'time_ads', name: 'time_ads'},
            {data: 'url_ads', name: 'url_ads'},
            {data: 'status', name: 'status'},
            {data: 'service_id', name: 'service_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('internal_ads.index')}}', columns);
        // Delete Using Ajax
        destroyScript('{{route('internal_ads.destroy',':id')}}');
        // Add Using Ajax
        showAddModal('{{route('internal_ads.create')}}');
        addScript();
        // Add Using Ajax
        showEditModal('{{route('internal_ads.edit',':id')}}');
        editScript();


        $(document).on('click', '.like_active', function() {
            var id = $(this).data('id');
            var status = this.checked ? 'show' : 'hide';

            $.ajax({
                url: '{{ route('makeActive') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                    'status': status
                },
                success: function(data) {

                    // Check if val is not equal to 0 before executing toastr.success()
                    if (status == "show") {
                        toastr.success('Success', 'تم الاظهار بنجاح ');
                    }
                    else
                    {
                        toastr.warning('Success', 'تم الغاء التفعيل');
                    }
                },
            });
        });

    </script>
@endsection

