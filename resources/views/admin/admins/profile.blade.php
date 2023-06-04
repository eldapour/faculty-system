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
                                <h6 class="text-muted mb-4"> {{$user->email}}</h6>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-info-light"
                                data-toggle="modal" data-target="#data_modal">
                            <i class="fa fa-edit"></i>
                            {{ trans('admin.data_modify') }}
                        </button>
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
                            <div class="row">
                                <h5 class="col-6">{{ trans('admin.first_name') }} : {{ $user->first_name }}</h5>
                                <h5 class="col-6">{{ trans('admin.first_name') }} : {{ $user->last_name }}</h5>
                                <span>-------------------------------------------------------------------------------------------</span>
                                <h5 class="col-12">{{ trans('admin.email') }} : {{ $user->email }}</h5>
                                <h5 class="col-12">{{ trans('admin.university_email') }}
                                    : {{ $user->university_email }}</h5>
                                <span>-------------------------------------------------------------------------------------------</span>
                                <h5 class="col-12">{{ trans('admin.identifier_id') }} : {{ $user->identifier_id }}</h5>
                                <h5 class="col-12">{{ trans('admin.national_id') }} : {{ $user->national_id  }}</h5>
                                <h5 class="col-12">{{ trans('admin.national_number') }}
                                    : {{ $user->national_number }}</h5>
                                <span>-------------------------------------------------------------------------------------------</span>
                                <h5 class="col-12">{{ trans('admin.nationality') }} : {{ $user->nationality }}</h5>
                                <h5 class="col-12">{{ trans('admin.birthday_date') }} : {{ $user->birthday_date }}</h5>
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
                    <form class="addForm" method="POST" enctype="multipart/form-data" action="{{ route('data_modify.store') }}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="data_modification" class="d-flex">{{trans('admin.data_modify')}}</label>
                                    <select style="width: 450px;" class="form-control" name="data_modification" required="required">
                                        <option value="first_name_ar">{{ trans('admin.first_name') }} {{ trans('admin.arabic') }}</option>
                                        <option value="first_name_en">{{ trans('admin.first_name') }} {{ trans('admin.english') }}</option>
                                        <option value="first_name_fr">{{ trans('admin.first_name') }} {{ trans('admin.france') }}</option>
                                        <option value="last_name_ar">{{ trans('admin.last_name') }} {{ trans('admin.arabic') }}</option>
                                        <option value="last_name_en">{{ trans('admin.last_name') }} {{ trans('admin.english') }}</option>
                                        <option value="last_name_fr">{{ trans('admin.last_name') }} {{ trans('admin.france') }}</option>
                                        <option value="birthday_date">{{ trans('admin.birthday_date') }}</option>
                                        <option value="birthday_place_ar">{{ trans('admin.birthday_place_ar') }}</option>
                                        <option value="birthday_place_en">{{ trans('admin.birthday_place_en') }}</option>
                                        <option value="birthday_place_fr">{{ trans('admin.birthday_place_fr') }}</option>
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
                                    <input name="card_image" type="file" class="form-control dropify" />
                                </div>

                                <div class="col-12">
                                    <label for="name" class="form-control-label d-flex">{{trans('admin.note')}}
                                        <span class="text text-success">({{ trans('admin.optional') }})</span>
                                    </label>
                                    <textarea  class="form-control" name="note" rows="5"></textarea>
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

    @include('admin.layouts.myAjaxHelper')

    @section('ajaxCalls')
        <script>
            $('.dropify').dropify();

            $(document).ready(function() {
                $('select').select2();
            });
        </script>
    @endsection

@endsection


