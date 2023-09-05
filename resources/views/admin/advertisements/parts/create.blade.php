<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('advertisements.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="title_ar" >
                </div>
                <div class="col-md-12 mt-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title') ." ". trans('admin.english') }}</label>
                    <input type="text" class="form-control" name="title_en" >
                </div>
                <div class="col-md-12 mt-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title') ." ". trans('admin.france') }}</label>
                    <input type="text" class="form-control" name="title_fr" >
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 mt-3">
                    <label for="image" class="form-control-label">{{ trans('admin.image') }}</label>
                    <input type="file" name="image" class="dropify" data-default-file="">
                </div>
                <div class="col-md-12 mt-3">
                    <label for="background_image"
                        class="form-control-label">{{ trans('admin.background_image') }}</label>
                    <input type="file" name="background_image" class="dropify" data-default-file="">
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 mt-3">
                    <label for="category_id" class="form-control-label">{{ trans('admin.category') }}</label>
                    <select name="category_id" class="form-control" >
                        <option value="" selected>{{ trans('admin.select') }}</option>
                        @foreach ($data['categories'] as $category)
                            <option value="{{ $category->id }}" style="text-align: center">
                                {{ $category->getTranslation('category_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mt-3">
                    <label for="service_id" class="form-control-label">{{ trans('admin.service') }}</label>
                    <select name="service_id" class="form-control" >
                        <option value="" selected>{{ trans('admin.select') }}</option>
                        @foreach ($data['services'] as $service)
                            <option value="{{ $service->id }}" style="text-align: center">
                                {{ $service->getTranslation('service_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="file" class="form-control-label">{{ trans('admin.attachment_file') }}</label>
                    <input name="file" type="file" value="" data-default-file="" class="form-control dropify" />
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.arabic') }}</label>
                    <textarea name="description_ar" class="form-control" rows="8"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.english') }}</label>
                    <textarea name="description_en" class="form-control" rows="8"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.france') }}</label>
                    <textarea name="description_fr" class="form-control" rows="8"></textarea>
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
