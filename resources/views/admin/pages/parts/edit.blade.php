<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('pages.update', $page->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $page->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.image') }}</label>
                    <input type="file" id="gallery-photo-add" class="form-control" name="images[]" multiple>
                    <div class="col-md-12 gallery"></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.title') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="title[ar]" value="{{ $page->title['ar'] }}" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.title') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" name="title[en]" value="{{ $page->title['en'] }}" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.title') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" name="title[fr]" value="{{ $page->title['fr'] }}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.description') }} {{ trans('admin.arabic') }}</label>
                    <textarea type="text" class="form-control" name="description[ar]" required> {{ $page->description['ar'] }}</textarea>
                </div>
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.description') }}  {{ trans('admin.english') }}</label>
                    <textarea type="text"  class="form-control" name="description[en]" required> {{ $page->description['en'] }}</textarea>
                </div>
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.description') }}  {{ trans('admin.france') }}</label>
                    <textarea type="text" class="form-control" name="description[fr]" required> {{ $page->description['fr'] }}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.files') }}</label>
                    <input type="file" class="form-control" name="files[]" multiple>
                </div>
                <div class="col-md-6">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.category') }}</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option
                                {{ $page->category_id == $category->id ? 'selected' : ''}}
                                value="{{ $category->id }}">{{ $category->category_name[lang()] }}
                            </option>
                        @endforeach
                    </select>
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
    $('.dropify').dropify();

    CKEDITOR.replaceAll();
    $(function() {
        var imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img style="width: 100px; height: 100px; margin: 5px; border: 1px solid #9c52fd; border-radius: 10px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#gallery-photo-add').on('change', function() {

            imagesPreview(this, 'div.gallery');
            $('.gallery').html('');
        });
    });
</script>
