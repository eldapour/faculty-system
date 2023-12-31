<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('presentations.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title')  ." ". trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="title[ar]">
                </div>
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') ." ". trans('admin.english') }}</label>
                    <input type="text" class="form-control" name="title[en]">
                </div>
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') ." ". trans('admin.france') }}</label>
                    <input type="text" class="form-control" name="title[fr]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="image" class="form-control-label">{{ trans('admin.image') }}</label>
                    <input type="file" name="images[]" multiple="multiple" class="dropify" data-default-file="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="category_id" class="form-control-label">{{ trans('admin.category') }}</label>
                    <select name="category_id" class="form-control">
                        <option value="" selected>{{ trans('admin.select') }}</option>
                        @foreach ($data['categories'] as $category)
                            <option value="{{ $category->id }}" style="text-align: center">
                                {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="experience_year" class="form-control-label">{{ trans('admin.experience_year') }}</label>
                    <input type="text" class="form-control" name="experience_year">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.arabic') }}</label>
                    <textarea name="description[ar]" class="form-control" rows="8"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.english') }}</label>
                    <textarea name="description[en]" class="form-control" rows="8"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.france') }}</label>
                    <textarea name="description[fr]" class="form-control" rows="8"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add') }}</button>
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
