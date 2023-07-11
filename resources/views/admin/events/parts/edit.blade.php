<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('events.update', $event->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $event->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title')  ." ". trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" value="{{ $event->getTranslation('title', 'ar') }}" name="title[ar]" required>
                </div>
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') ." ". trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $event->getTranslation('title', 'en') }}" name="title[en]" required>
                </div>
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') ." ". trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $event->getTranslation('title', 'fr') }}" name="title[fr]" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="image" class="form-control-label">{{ trans('admin.image') }}</label>
                    <input type="file" name="image" class="dropify" data-default-file="{{ asset($event->image) }}">
                </div>
                <div class="col-md-6">
                    <label for="background_image"
                        class="form-control-label">{{ trans('admin.background_image') }}</label>
                    <input type="file" name="background_image" class="dropify" data-default-file="{{ asset($event->background_image) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="category_id" class="form-control-label">{{ trans('admin.category') }}</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($data['categories'] as $category)
                            <option value="{{ $category->id }}" style="text-align: center" {{ $event->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.arabic') }}</label>
                    <textarea name="description[ar]" class="form-control" rows="8">{{ $event->getTranslation('description', 'ar') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.english') }}</label>
                    <textarea name="description[en]" class="form-control" rows="8">{{ $event->getTranslation('description', 'en') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.france') }}</label>
                    <textarea name="description[fr]" class="form-control" rows="8">{{ $event->getTranslation('description', 'fr') }}</textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-success" id="updateButton">{{ trans('admin.update') }}</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()

    CKEDITOR.replaceAll();

    $('.dropify').dropify();

    $(document).ready(function() {
        $('select').select2();
    });
</script>
