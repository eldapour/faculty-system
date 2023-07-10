@extends('admin/layouts/master')

@section('title')
    {{($setting->title) ?? ''}}  @lang('admin.pages')
@endsection
@section('page_name')  @lang('admin.pages') @endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> @lang('admin.pages') {{($setting->title) ?? ''}}</h3>
                    <div class="">
                        <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span> @lang('admin.add') @lang('admin.page')
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
                                <th class="min-w-50px"> {{__('admin.image')}}</th>
                                <th class="min-w-50px"> {{__('admin.title')}}</th>
                                <th class="min-w-50px"> {{__('admin.category')}}</th>
                                <th class="min-w-50px rounded-end">{{__('admin.actions')}}</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">@lang('admin.delete') @lang('admin.sliders')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <input id="delete_id" name="id" type="hidden">
                        <p>{{ trans('admin.delete_confirm') . ' ' . trans('admin.pages') }}<span id="title" class="text-danger"></span>؟</p>
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
    </div>

    <!-- Create Or Edit Modal -->
    <div class="modal fade" id="editOrCreate" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">{{ trans('admin.add') . ' ' . trans('admin.pages')}}</h5>
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
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')

    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'title', name: 'title'},
            {data: 'category_id', name: 'category_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('pages.index')}}', columns);
        // Delete Using Ajax
        destroyScript('{{route('pages.destroy',':id')}}');
        // Add Using Ajax
        showAddModal('{{route('pages.create')}}');
        addScript();
        // Add Using Ajax
        showEditModal('{{route('pages.edit',':id')}}');
        editScript();
    </script>
@endsection


