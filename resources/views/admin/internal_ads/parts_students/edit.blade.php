<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" disabled class="form-control" value="{{ $internal_ads->getTranslation('title', 'ar') }}" name="title[ar]" required>
                </div>
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}  {{ trans('admin.english') }}</label>
                    <input type="text" disabled class="form-control" value="{{ $internal_ads->getTranslation('title', 'en') }}" name="title[en]" required>
                </div>
                <div class="col-md-4">
                    <label for="title" disabled class="form-control-label">{{ trans('admin.title') }}  {{ trans('admin.france') }}</label>
                    <input type="text" disabled class="form-control" value="{{ $internal_ads->getTranslation('title', 'fr') }}" name="title[fr]" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.date_ads') }}</label>
                    <input type="date" disabled class="form-control" value="{{ $internal_ads->date_ads }}" name="date_ads" required>
                </div>
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.url_ads') }}</label>
                    <input type="date" disabled class="form-control" value="{{ $internal_ads->url_ads }}" name="url_ads" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }} {{ trans('admin.arabic') }}</label>
                    <h4 name="description[ar]" disabled class="form-control" rows="8">{{ $internal_ads->getTranslation('description', 'ar') }}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }}  {{ trans('admin.english') }}</label>
                    <h4 name="description[en]" disabled class="form-control" rows="8">{{ $internal_ads->getTranslation('description', 'en') }}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="desc" class="form-control-label">{{ trans('admin.desc') }}  {{ trans('admin.france') }}</label>
                    <h4 name="description[fr]" disabled class="form-control" rows="8">{{ $internal_ads->getTranslation('description', 'fr') }}</h4>
                </div>
            </div>
        </div>
    </form>
</div>
<script>

</script>
