@extends('admin/layouts/master')

@section('title')
    {{($setting->title) ?? ''}}  @lang('admin.wordManager')
@endsection
@section('page_name')
    @lang('admin.wordManager')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> @lang('admin.wordManager') {{($setting->title) ?? ''}}</h3>
                </div>
                <div class="card-body">
                    <div class="modal-body">
                        <form id="updateForm" class="updateForm" method="POST" action="{{ route('word.update', $word->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $word->id }}" name="id">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{  trans('admin.image') }}</label>
                                        <input type="file" class="form-control dropify"
                                               data-default-file="{{ asset($word->image) }}"
                                               name="image" value="{{ asset($word->image) }}">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="name_ar" class="form-control-label">{{  trans('admin.category') }}</label>
                                       <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option
                                                    {{ $word->category_id == $category->id ? ' selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                       </select>
                                            <label for="name_ar" class="form-control-label">{{  trans('admin.word_role') }}_Ar</label>
                                            <input type="text" class="form-control" value="{{ $word->role['ar'] }}" name="role[ar]" required>
                                            <label for="name_ar" class="form-control-label">{{  trans('admin.word_role') }}_En</label>
                                            <input type="text" class="form-control" value="{{ $word->role['en'] }}" name="role[en]" required>
                                            <label for="name_ar" class="form-control-label">{{  trans('admin.word_role') }}_Fr</label>
                                            <input type="text" class="form-control" value="{{ $word->role['fr'] }}" name="role[fr]" required>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{  trans('admin.name') . ' ' . trans('admin.arabic') }}</label>
                                        <input type="text" class="form-control" value="{{ $word->name['ar'] }}" name="name[ar]" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{  trans('admin.name') . ' ' . trans('admin.english') }}</label>
                                        <input type="text" class="form-control" value="{{ $word->name['en'] }}" name="name[en]" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{  trans('admin.name')  . ' ' . trans('admin.france') }}</label>
                                        <input type="text" class="form-control" value="{{ $word->name['fr'] }}" name="name[fr]" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name_ar" class="form-control-label">{{  trans('admin.description') }}_Ar</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="description[ar]" required>{{ $word->description['ar'] }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="name_ar" class="form-control-label">{{  trans('admin.description') }}_En</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="description[en]" required>{{ $word->description['en'] }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="name_ar" class="form-control-label">{{  trans('admin.description') }}_Fr</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="description[fr]" required>{{ $word->description['fr'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.close')</button>
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


