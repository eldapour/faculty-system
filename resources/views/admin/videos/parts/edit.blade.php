<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('video.update', $video->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $video->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}
                        {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" value="{{ $video->title[lang()] }}" name="title[ar]"
                        required>
                </div>
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}
                        {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $video->title[lang()] }}" name="title[en]"
                        required>
                </div>
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}
                        {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $video->title[lang()] }}" name="title[fr]"
                        required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="background_image"
                        class="form-control-label">{{ trans('admin.background_image') }}</label>
                    <input type="file" name="background_image" class="dropify"
                        data-default-file="{{ asset($video->background_image) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="video_url" class="form-control-label">{{ trans('admin.video_url') }}</label>
                    <input type="text" name="video_url" value="{{ $video->video_url }}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}
                        {{ trans('admin.arabic') }}</label>
                    <textarea name="description[ar]" class="form-control" rows="8">{{ $video->description[lang()] }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}
                        {{ trans('admin.english') }}</label>
                    <textarea name="description[en]" class="form-control" rows="8">{{ $video->description[lang()] }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}
                        {{ trans('admin.france') }}</label>
                    <textarea name="description[fr]" class="form-control" rows="8">{{ $video->description[lang()] }}</textarea>
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
