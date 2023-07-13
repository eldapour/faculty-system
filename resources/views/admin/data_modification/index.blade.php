@extends('admin/layouts/master')

@section('title')
    {{($setting->title) ?? ''}}  @lang('admin.data_modify')
@endsection
@section('page_name')  @lang('admin.data_modify') @endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
{{--                <div class="card-header">--}}
{{--                    <h3 class="card-title"> @lang('admin.data_modify') {{($setting->title) ?? ''}}</h3>--}}
{{--                    <div class="">--}}
{{--                        <button class="btn btn-secondary btn-icon text-white addBtn">--}}
{{--									<span>--}}
{{--										<i class="fe fe-plus"></i>--}}
{{--									</span> @lang('admin.add') @lang('admin.data_modify')--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-50px"> {{__('admin.student')}} ({{ trans('admin.id') }})</th>
                                <th class="min-w-50px"> {{__('admin.card_image_user')}}</th>
                                <th class="min-w-50px"> {{__('admin.status')}}</th>
                                <th class="min-w-50px rounded-end">{{__('admin.actions')}}</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">@lang('admin.delete') @lang('admin.order')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <input id="delete_id" name="id" type="hidden">
                        <p>{{ trans('admin.delete_confirm') . ' ' . trans('admin.order') }}<span id="title" class="text-danger"></span>؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                            @lang('admin.close')
                        </button>
                        <button type="button" class="btn btn-danger" id="delete_btn">@lang('admin.delete') !</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL CLOSED -->

        <!-- Create Or Edit Modal -->
        <div class="modal fade" id="editOrCreate" data-backdrop="static"  role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">{{trans('admin.order')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="@lang('admin.close')">
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
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'user_id', name: 'user_id'},
            {data: 'card_image', name: 'card_image'},
            {data: 'request_status', name: 'request_status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('data_modify.index')}}', columns);
        // Delete Using Ajax
        destroyScript('{{route('data_modify.destroy',':id')}}');
        // Add Using Ajax
        showAddModal('{{route('data_modify.create')}}');
        addScript();
        // Add Using Ajax
        showEditModal('{{route('data_modify.edit',':id')}}');
        editScript();
    </script>
@endsection


