<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('internal_ads.update', $internalAd->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $internalAd->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="name" class="form-control-label">{{ trans('admin.image_ads') }}</label>
                    <input type="file" class="dropify" name="url_ads" data-default-file=""
                        accept="image/png, image/gif, image/jpeg,image/jpg" />
                    <span class="form-text text-danger text-center">accept only png, gif, jpeg, jpg</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}
                        {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" value="{{ $internalAd->getTranslation('title', 'ar') }}"
                        name="title[ar]">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}
                        {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $internalAd->getTranslation('title', 'en') }}"
                        name="title[en]">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}
                        {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $internalAd->getTranslation('title', 'fr') }}"
                        name="title[fr]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="service_id" class="form-control-label">{{ trans('admin.service') }}</label>
                    <select name="service_id" class="form-control" required>
                        <option value="">{{ trans('admin.select') }}</option>
                        @foreach ($data['services'] as $service)
                            <option value="{{ $service->id }}" style="text-align: center"
                                {{ $service->service_id == $internalAd->sevice_id ? 'selected' : ' ' }}>
                                {{ $service->getTranslation('service_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <label for="title" class="form-control-label">{{ trans('admin.time_ads') }}</label>
                    <input type="time" class="form-control" value="{{ $internalAd->time_ads }}" name="time_ads">
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 mt-2">

                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }}
                        {{ trans('admin.arabic') }}</label>
                    <textarea name="description[ar]" class="form-control" rows="8">{{ $internalAd->getTranslation('description', 'ar') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">

                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }}
                        {{ trans('admin.english') }}</label>
                    <textarea name="description[en]" class="form-control" rows="8">{{ $internalAd->getTranslation('description', 'en') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">

                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }}
                        {{ trans('admin.france') }}</label>
                    <textarea name="description[fr]" class="form-control" rows="8">{{ $internalAd->getTranslation('description', 'fr') }}</textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-success" id="updateButton">تحديث</button>
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
