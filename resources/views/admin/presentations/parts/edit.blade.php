<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('presentations.update', $presentation->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $presentation->id }}" name="id">
        <div class="row">
            <div class="col-md-4">
                <label for="title" class="form-control-label">{{ trans('admin.title')  ." ". trans('admin.arabic') }}</label>
                <input type="text" class="form-control" name="title[ar]" required>
            </div>
            <div class="col-md-4">
                <label for="title" class="form-control-label">{{ trans('admin.title') ." ". trans('admin.english') }}</label>
                <input type="text" class="form-control" name="title[en]" required>
            </div>
            <div class="col-md-4">
                <label for="title" class="form-control-label">{{ trans('admin.title') ." ". trans('admin.france') }}</label>
                <input type="text" class="form-control" name="title[fr]" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="image" class="form-control-label">{{ trans('admin.image') }}</label>
                <input type="file" name="images" class="dropify" data-default-file="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="category_id" class="form-control-label">{{ trans('admin.category') }}</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($data['categories'] as $category)
                        <option value="{{ $category->id }}" style="text-align: center">
                            {{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.arabic') }}</label>
                <textarea name="description[ar]" class="form-control" rows="8"></textarea>
            </div>
            <div class="col-md-4">
                <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.english') }}</label>
                <textarea name="description[en]" class="form-control" rows="8"></textarea>
            </div>
            <div class="col-md-4">
                <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.france') }}</label>
                <textarea name="description[fr]" class="form-control" rows="8"></textarea>
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
</script>
