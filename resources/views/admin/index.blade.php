@extends('admin/layouts/master')

@section('title')
    {{ trans('admin.dashboard')}}
@endsection
@section('page_name') {{ trans('admin.dashboard')}} @endsection
@section('content')

    <div class="row">


        @if(checkUser('student'))
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-success img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">

                            <div class="text-white"><h2 class="mb-0 number-font">{{ documentCountUser() }}</h2>
                                <p class="text-white mb-0">عدد طلبات الوثائق</p></div>
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

                            <div class="text-white"><h2 class="mb-0 number-font">{{ processExamCountUser() }}</h2>
                                <p class="text-white mb-0">عدد طلبات الاستدراك</p></div>
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

                            <div class="text-white"><h2 class="mb-0 number-font">{{ processDegreeCountUser()  }}</h2>
                                <p class="text-white mb-0">عدد طلبات معالجه النقط</p></div>
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

                            <div class="text-white"><h2 class="mb-0 number-font">{{ subjectStudentCountUser() }}</h2>
                                <p class="text-white mb-0">عدد وحدات الفتره الحاليه</p></div>
                            <div class="mr-auto">
                                <i class="fa fa-book text-white fs-30 ml-2 mt-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif

        {{--end count data for user--}}




            @if(checkUser('manger'))

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-success img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white"><h2 class="mb-0 number-font">{{ userCount() }}</h2>
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
                        <div class="text-white"><h2 class="mb-0 number-font">{{ doctorCount() }}</h2>
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
                        <div class="text-white"><h2 class="mb-0 number-font">{{ adminCount() }}</h2>
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

                        <div class="text-white"><h2 class="mb-0 number-font">{{ departmentCount() }}</h2>
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
                        <div class="text-white"><h2 class="mb-0 number-font">{{  branchCount()}}</h2>
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


            @endif
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


