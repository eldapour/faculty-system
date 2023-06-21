@extends('admin.layouts.master')
@section('title')
    {{$setting->title ?? ''}} {{ trans('admin.profile') }}
@endsection

@section('page_name')
    {{ trans('admin.profile') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="wideget-user text-center">
                        <div class="wideget-user-desc">
                            <div class="wideget-user-img">
                                <img class=""
                                     src="{{ ($user->image != null) ? asset($user->image) : asset('assets/uploads/avatar.gif') }}"
                                     alt="img">
                            </div>
                            <div class="user-wrap">
                                <h4 class="mb-1 text-capitalize">{{$user->first_name . ' ' . $user->last_name}}</h4>
                                <h6 class="badge badge-primary-gradient">{{ $user->user_type }}</h6>
                                @if ($user->user_status == 'active')
                                    <h6 class="badge badge-success-gradient">{{ $user->user_status }}</h6>
                                @else
                                    <h6 class="badge badge-danger-gradient">{{ $user->user_status }}</h6>
                                @endif
                                <h6 class="text-muted mb-4">
                                    {{$user->email}}</h6>

                            </div>
                        </div>
                        @if(auth()->user()->user_type == 'student')
                            <button type="button" class="btn btn-sm btn-info-light"
                                    data-toggle="modal" data-target="#data_modal">
                                <i class="fa fa-edit"></i>
                                {{ trans('admin.data_modify') }}
                            </button>
                            <button type="button" class="btn btn-sm btn-success-light"
                                    data-toggle="modal" data-target="#data_modal_modify">
                                <i class="fa fa-marker"></i>
                                {{ trans('admin.orders') }}
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="wideget-user-tab">
                    <div class="tab-menu-heading">
                        <div class="tabs-menu1">
                            <ul class="nav">
                                <li class=""><a href="#tab-51" class="active show"
                                                data-toggle="tab">@lang('admin.information')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show" id="tab-51">
                    <div class="card">
                        <div class="card-body">
                            <div id="profile-log-switch">
                                <div class="media-heading">
                                    <h5><strong>{{ trans('admin.more information') }}</strong></h5>
                                </div>
                            </div>
                            @if(auth()->user()->user_type == 'student')
                                <div class="row">
                                    <h5 class="col-6">{{ trans('admin.first_name') }} : {{ $user->first_name }}</h5>
                                    <h5 class="col-6">{{ trans('admin.last_name') }} : {{ $user->last_name }}</h5>
                                    <span>-------------------------------------------------------------------------------------------</span>
                                    <h5 class="col-12">{{ trans('admin.email') }} : {{ $user->email }}</h5>
                                    <h5 class="col-12">{{ trans('admin.university_email') }}
                                        : {{ $user->university_email }}</h5>
                                    <span>-------------------------------------------------------------------------------------------</span>
                                    <h5 class="col-12">{{ trans('admin.identifier_id') }}
                                        : {{ $user->identifier_id }}</h5>
                                    <h5 class="col-12">{{ trans('admin.national_id') }} : {{ $user->national_id  }}</h5>
                                    <h5 class="col-12">{{ trans('admin.national_number') }}
                                        : {{ $user->national_number }}</h5>
                                    <span>-------------------------------------------------------------------------------------------</span>
                                    <h5 class="col-12">{{ trans('admin.nationality') }} : {{ $user->nationality }}</h5>
                                    <h5 class="col-12">{{ trans('admin.birthday_date') }}
                                        : {{ $user->birthday_date }}</h5>
                                    <h5 class="col-12">{{ trans('admin.birthday_place') }}
                                        : {{ $user->birthday_place }}</h5>
                                    <h5 class="col-12">{{ trans('admin.birthday_place') }}
                                        : {{ $user->birthday_place }}</h5>
                                    <h5 class="col-12">{{ trans('admin.city') }} : {{ $user->city }}</h5>
                                    <h5 class="col-12">{{ trans('admin.city') }} : {{ $user->city }}</h5>
                                    <span>-------------------------------------------------------------------------------------------</span>
                                    <h5 class="col-12">{{ trans('admin.university_register_year') }}
                                        : {{ $user->university_register_year }}</h5>
                                    <h5 class="col-12">{{ trans('admin.points') }} : {{ $user->points }}</h5>
                                </div>
                            @else
                                <div class="row">
                                    <h5 class="col-6">{{ trans('admin.first_name') }} : {{ $user->first_name }}</h5>
                                    <h5 class="col-6">{{ trans('admin.last_name') }} : {{ $user->last_name }}</h5>
                                    <h5 class="col-12">{{ trans('admin.email') }} : {{ $user->email }}</h5>
                                </div>
                            @endif
                            <button type="button" style="color: white;" class="btn btn-sm badge badge-info-gradient"
                                    data-toggle="modal" data-target="#data_password">
                                {{ trans('admin.edit') . ' ' .trans('admin.password') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>

    <!-- Edit MODAL -->
    <div class="modal fade" id="data_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modalContent">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">{{trans('admin.data_modify')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="addForm" method="POST" enctype="multipart/form-data"
                          action="{{ route('data_modify.store') }}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">

                                    <label for="data_modification" class="d-flex">{{trans('admin.data_modify')}}</label>
                                    <select style="width: 450px;" class="form-control" name="data_modification[]"
                                            multiple="multiple"
                                            required="required">
                                        <option
                                            value="first_name_ar">{{ trans('admin.first_name') }} {{ trans('admin.arabic') }}</option>
                                        <option
                                            value="first_name_en">{{ trans('admin.first_name') }} {{ trans('admin.english') }}</option>
                                        <option
                                            value="first_name_fr">{{ trans('admin.first_name') }} {{ trans('admin.france') }}</option>
                                        <option
                                            value="last_name_ar">{{ trans('admin.last_name') }} {{ trans('admin.arabic') }}</option>
                                        <option
                                            value="last_name_en">{{ trans('admin.last_name') }} {{ trans('admin.english') }}</option>
                                        <option
                                            value="last_name_fr">{{ trans('admin.last_name') }} {{ trans('admin.france') }}</option>
                                        <option value="birthday_date">{{ trans('admin.birthday_date') }}</option>
                                        <option
                                            value="birthday_place_ar">{{ trans('admin.birthday_place_ar') }}</option>
                                        <option
                                            value="birthday_place_en">{{ trans('admin.birthday_place_en') }}</option>
                                        <option
                                            value="birthday_place_fr">{{ trans('admin.birthday_place_fr') }}</option>
                                        <option value="city_ar">{{ trans('admin.city_ar') }}</option>
                                        <option value="city_en">{{ trans('admin.city_en') }}</option>
                                        <option value="city_fr">{{ trans('admin.city_fr') }}</option>
                                        <option value="address">{{ trans('admin.address') }}</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="name" class="form-control-label">{{trans('admin.card_image_user')}}
                                        <span class="text text-danger">*</span>
                                    </label>
                                    <input name="card_image" type="file" class="form-control dropify"
                                           required="required"/>
                                </div>

                                <div class="col-12">
                                    <label for="name" class="form-control-label d-flex">{{trans('admin.note')}}
                                        <span class="text text-success">({{ trans('admin.optional') }})</span>
                                    </label>
                                    <textarea class="form-control" name="note" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{trans('admin.close_model')}}</button>
                            <button type="submit" class="btn btn-primary">{{trans('admin.add_data')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit MODAL CLOSED -->

    <!-- data MODAL -->
    <div class="modal fade" id="data_modal_modify" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modalContent">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">{{trans('admin.orders')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="addForm" method="POST" enctype="multipart/form-data"
                          action="{{ route('data_modify.store') }}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap w-100">
                                        <thead>
                                        <tr class="fw-bolder text-muted bg-light">
                                            <th>#</th>
                                            <th>{{ trans('admin.order') }}</th>
                                            <th>{{ trans('admin.request_status') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user_data as $row_data)
                                            <tr>
                                                <td>{{ $row_data->id }}</td>
                                                <td>
                                                    @foreach($row_data->data_modification_type as $data)
                                                        <span
                                                            class="badge badge-success d-flex mb-1">{{ trans('admin.' .$data) }}</span>
                                                    @endforeach
                                                </td>
                                                @if($row_data->request_status == 'refused')
                                                    <td>
                                                        <span class="badge badge-danger">
                                                            {{ trans('admin.' .$row_data->request_status) }}
                                                        </span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge badge-info">
                                                            {{ trans('admin.' .$row_data->request_status) }}
                                                        </span>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{trans('admin.close_model')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit MODAL CLOSED -->

    <!-- Password MODAL -->
    <div class="modal fade" id="data_password" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modalContent">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">{{trans('admin.orders')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updatePassForm" method="POST" enctype="multipart/form-data" action="{{route('updatePass')}}">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$user->id}}">

                        <div class="form-group">
                            <label for="name" class="form-control-label">{{trans('admin.oldPassword')}}
                                <span class="text text-danger">*</span>
                            </label>
                            <input name="old_password" type="password" class="form-control"
                                   required="required"/>

                            <label for="name" class="form-control-label">{{trans('admin.password')}}
                                <span class="text text-danger">*</span>
                            </label>
                            <input name="password" type="password" class="form-control"
                                   required="required"/>
                            <label for="name" class="form-control-label">{{trans('admin.repeatPassword')}}
                                <span class="text text-danger">*</span>
                            </label>
                            <input name="password_confirm" type="password" class="form-control"
                                   required="required"/>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin.close_model')}}</button>
                            <button type="submit" class="btn btn-primary" id="updateButton">{{trans('admin.edit_model')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Password CLOSED -->

    @include('admin.layouts.myAjaxHelper')

    @section('ajaxCalls')
        <script>
            $('.dropify').dropify();

            $(document).ready(function () {
                $('select').select2();
            });

            // Update By Ajax
            $(document).on('submit','Form#updatePassForm',function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var url = $('#updatePassForm').attr('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    beforeSend: function () {
                        $('#updateButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                            ' ></span> <span style="margin-left: 4px;">working</span>').attr('disabled', true);
                    },


                    success: function (data) {

                        $('#updateButton').html(`{{ trans('admin.update') }}`).attr('disabled', false);
                        if (data.status == 200){
                            $('#dataTable').DataTable().ajax.reload();
                            toastr.success('{{ trans('admin.updated_successfully') }}');
                            $('#data_password').modal('hide')
                        }
                        else if(data.status == 201){
                            toastr.error('{{ trans('admin.password_not_correct') }}');
                        }
                        else if(data.status == 203){
                            toastr.error('{{ trans('admin.password_new_not_correct') }}');
                        }
                    },
                    error: function (data) {

                        if (data.status === 500) {
                            toastr.error('{{ trans('admin.something_went_wrong') }}');

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
                            toastr.error('{{ trans('admin.something_went_wrong') }}');
                        $('#updateButton').html(`{{ trans('admin.update') }}`).attr('disabled', false);
                    },//end error method

                    cache: false,
                    contentType: false,
                    processData: false
                });
            });

        </script>
    @endsection

@endsection


