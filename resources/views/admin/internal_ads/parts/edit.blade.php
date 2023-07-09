<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('internal_ads.update', $internalAd->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $internalAd->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" value="{{ $internalAd->getTranslation('title', 'ar') }}" name="title_ar">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $internalAd->getTranslation('title', 'en') }}" name="title_en">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $internalAd->getTranslation('title', 'fr') }}" name="title_fr">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="service_id" class="form-control-label">{{ trans('admin.service') }}</label>
                    <select name="service_id" class="form-control" required>
                        @foreach($data['services'] as $service)
                        <option value="{{ $service->id }}" style="text-align: center" {{ ($service->service_id == $internalAd->sevice_id ) ? 'selected' : " " }}>{{ $service->getTranslation('service_name', app()->getLocale())}}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.time_ads') }}</label>
                    <input type="time" class="form-control" value="{{ $internalAd->time_ads }}" name="time_ads">
                </div>
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.url_ads') }}</label>
                    <input type="text" class="form-control" value="{{ $internalAd->url_ads }}" name="url_ads" >
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 mt-2">

                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }} {{ trans('admin.arabic') }}</label>
                    <textarea name="description_ar" class="form-control" rows="8">{{ $internalAd->getTranslation('description', 'ar') }}</textarea>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-12 mt-2">

                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }}  {{ trans('admin.english') }}</label>
                    <textarea name="description_en" class="form-control" rows="8">{{ $internalAd->getTranslation('description', 'en') }}</textarea>
                </div>
            </div>
            <div class="row">
                        <div class="col-md-12 mt-2">

                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }}  {{ trans('admin.france') }}</label>
                    <textarea name="description_fr" class="form-control" rows="8">{{ $internalAd->getTranslation('description', 'fr') }}</textarea>
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
