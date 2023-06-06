@extends('admin/layouts/master')

@section('title')
    {{ trans('admin.dashboard')}}
@endsection
@section('page_name') {{ trans('admin.dashboard')}} @endsection
@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-success img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <?php $count_user = userCount() ?>
                        <div class="text-white"><h2 class="mb-0 number-font">{{ $count_user }}</h2>
                            <p class="text-white mb-0">{{ trans('admin.students') }}</p></div>
                        <div class="mr-auto">
                            <i class="fe fe-users text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <?php $count_doctor = doctorCount() ?>
                        <div class="text-white"><h2 class="mb-0 number-font">{{ $count_doctor }}</h2>
                            <p class="text-white mb-0">{{ trans('admin.doctor') }}</p></div>
                            <div class="mr-auto">
                                <i class="fa fa-user-tie text-white fs-30 ml-2 mt-2"></i>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-info img-card box-info-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <?php $count_admin = adminCount() ?>
                        <div class="text-white"><h2 class="mb-0 number-font">{{ $count_admin }}</h2>
                            <p class="text-white mb-0">{{ trans('admin.admins') }}</p></div>
                            <div class="mr-auto">
                                <i class="fa fa-user-secret text-white fs-30 ml-2 mt-2"></i>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-danger img-card box-danger-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <?php $count_department = departmentCount() ?>
                        <div class="text-white"><h2 class="mb-0 number-font">{{ $count_department }}</h2>
                            <p class="text-white mb-0">{{ trans('admin.departments') }}</p></div>
                            <div class="mr-auto">
                                <i class="fa fa-book text-white fs-30 ml-2 mt-2"></i>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-warning img-card box-warning-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <?php $count_branch = branchCount() ?>
                        <div class="text-white"><h2 class="mb-0 number-font">{{ $count_branch }}</h2>
                            <p class="text-white mb-0">{{ trans('admin.branches') }}</p></div>
                            <div class="mr-auto">
                                <i class="fa fa-arrow-right text-white fs-30 ml-2 mt-2"></i>
                                <i class="fa fa-arrow-down text-white fs-30 ml-2 mt-2"></i>
                                <i class="fa fa-arrow-left text-white fs-30 ml-2 mt-2"></i>
                                <i class="fa fa-arrow-up text-white fs-30 ml-2 mt-2"></i>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('sliders.index')}}', columns);
        // Delete Using Ajax
        destroyScript('{{route('sliders.destroy',':id')}}');
        // Add Using Ajax
        showAddModal('{{route('sliders.create')}}');
        addScript();
        // Add Using Ajax
        showEditModal('{{route('sliders.edit',':id')}}');
        editScript();
    </script>
@endsection


