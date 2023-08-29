<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('internal_ads.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="name" class="form-control-label">{{ trans('admin.image_ads') }}</label>
                    <input type="file" class="dropify" name="url_ads"
                        data-default-file=""
                        accept="image/png, image/gif, image/jpeg,image/jpg" />
                    <span class="form-text text-danger text-center">accept only png, gif, jpeg, jpg</span>
                </div>
                <div class="col-md-12">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}
                        {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="title_ar">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}
                        {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" name="title_en">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}
                        {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" name="title_fr">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-2 mb-3">
                    <label for="service_id" class="form-control-label">{{ trans('admin.service') }}</label>
                    <select name="service_id" class="form-control" required>
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
                    <label for="title" class="form-control-label">{{ trans('admin.time_ads') }}</label>
                    <input type="time" class="form-control" name="time_ads">
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 mt-2">
                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }}
                        {{ trans('admin.arabic') }}</label>
                    <textarea name="description_ar" class="form-control" rows="8"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }}
                        {{ trans('admin.english') }}</label>
                    <textarea name="description_en" class="form-control" rows="8"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }}
                        {{ trans('admin.france') }}</label>
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
    CKEDITOR.replaceAll();

    $('.dropify').dropify();

    $(document).ready(function() {
        $('select').select2();
    });
</script>
