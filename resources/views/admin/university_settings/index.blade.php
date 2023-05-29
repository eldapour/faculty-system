@extends('admin/layouts/master')

@section('title')
    {{ trans('admin.university_settings') }}
@endsection
@section('page_name')
    {{ trans('admin.university_settings') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('admin.university_setting') }}</h3>
                </div>
                <div class="card-body">
                    <div class="modal-body">
                        <form id="updateForm" class="updateForm" method="POST"
                            action="{{ route('university_settings.update', $university_settings->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $university_settings->id }}" name="id">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{ trans('admin.image') }}</label>
                                        <input type="file" class="form-control dropify"
                                            data-default-file="{{ asset($university_settings->logo) }}" name="logo" value="{{ asset($university_settings->logo) }}">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="name_ar" class="form-control-label">
                                            {{ trans('admin.title') . ' ' . trans('admin.arabic') }}</label>
                                        <input type="text" class="form-control" value="{{ $university_settings->title['ar']}}" name="title[ar]">

                                        <label for="name_ar"
                                            class="form-control-label">{{ trans('admin.title') . ' ' . trans('admin.english') }}</label>
                                        <input type="text" class="form-control" value="{{ $university_settings->title['en']}}" name="title[en]">

                                        <label for="name_ar"
                                            class="form-control-label">{{ trans('admin.title') . ' ' . trans('admin.france') }}</label>
                                        <input type="text" class="form-control" value="{{ $university_settings->title['fr']}}" name="title[fr]">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="facebook_link" class="form-control-label">{{ trans('admin.facebook_link') }}</label>
                                        <input type="text" class="form-control" value="{{ $university_settings->facebook_link }}" name="facebook_link" placeholder="https://www.facebook.com/">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-control-label">{{ trans('admin.email') }}</label>
                                        <input type="email" class="form-control" value="{{ $university_settings->email }}" name="email">
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name_ar"
                                            class="form-control-label">{{ trans('admin.address') . ' ' . trans('admin.arabic') }}</label>
                                        <textarea name="address[ar]" rows="8">{{ $university_settings->address['ar']}}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name_ar"
                                            class="form-control-label">{{ trans('admin.address') . ' ' . trans('admin.english') }}</label>
                                        <textarea name="address[en]" rows="8">{{ $university_settings->address['en']}}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name_ar"
                                            class="form-control-label">{{ trans('admin.address') . ' ' . trans('admin.france') }}</label>
                                        <textarea name="address[fr]" rows="8">{{ $university_settings->address['fr']}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name_ar" class="form-control-label">{{ trans('admin.description') }}
                                            {{ trans('admin.arabic') }}</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="description[ar]" required>{{ $university_settings->address['ar']}}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="name_ar" class="form-control-label">{{ trans('admin.description') }}
                                            {{ trans('admin.english') }}</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="description[en]" required>{{ $university_settings->address['en']}}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="name_ar" class="form-control-label">{{ trans('admin.description') }}
                                            {{ trans('admin.france') }}</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="description[fr]" required>{{ $university_settings->address['fr']}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">@lang('admin.close')</button>
                                <button type="submit" class="btn btn-success" id="updateButton">@lang('admin.update')</button>
                            </div>
                        </form>
                    </div>
                    <script>
                        $('.dropify').dropify()
                    </script>
                    <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>
                    <script>
                        // CKEDITOR.replaceAll();
                    </script>

                </div>
            </div>
        </div>
    </div>
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        CKEDITOR.replaceAll();

        $('.dropify').dropify();

        $(document).ready(function() {
            $('select').select2();
        });
        editScript();
    </script>
@endsection
