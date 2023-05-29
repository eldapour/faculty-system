<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('sliders.update', $slider->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $slider->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.image') }}</label>
                    <input type="file" class="form-control dropify"
                           data-default-file="{{ asset($slider->image) }}"
                           name="image" value="{{ asset($slider->image) }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.title') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" value="{{ $slider->title['ar'] }}" name="title[ar]" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.title') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $slider->title['en'] }}" name="title[en]" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.title') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $slider->title['fr'] }}" name="title[fr]" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.description') }} {{ trans('admin.arabic') }}</label>
                    <textarea type="text" rows="5" class="form-control editor" name="description[ar]" required>{{ $slider->description['ar'] }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.description') }}  {{ trans('admin.english') }}</label>
                    <textarea type="text" rows="5" class="form-control editor" name="description[en]" required>{{ $slider->description['en'] }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.description') }}  {{ trans('admin.france') }}</label>
                    <textarea type="text" rows="5" class="form-control editor" name="description[fr]" required>{{ $slider->description['fr'] }}</textarea>
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
    $('.dropify').dropify();

    $('.dropify').dropify()

    CKEDITOR.replaceAll();

    $('.dropify').dropify();

    $(document).ready(function() {
        $('select').select2();
    });
</script>
