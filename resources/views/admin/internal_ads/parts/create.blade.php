<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('internal_ads.store') }}">
        @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="title" class="form-control-label">{{ trans('admin.title') }} {{ trans('admin.arabic') }}</label>
                        <input type="text" class="form-control" name="title[ar]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="title" class="form-control-label">{{ trans('admin.title') }}_En</label>
                        <input type="text" class="form-control" name="title[en]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="title" class="form-control-label">{{ trans('admin.title') }}_Fr</label>
                        <input type="text" class="form-control" name="title[fr]" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="service_id" class="form-control-label">{{ trans('admin.service') }}</label>
                        <select name="service_id" class="form-control" required>
                            @foreach($data['services'] as $service)
                            <option value="{{ $service->id }}" style="text-align: center">{{ $service->service_name[lang()] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="title" class="form-control-label">{{ trans('admin.date_ads') }}</label>
                        <input type="date" class="form-control" name="date_ads" required>
                    </div>
                    <div class="col-md-6">
                        <label for="title" class="form-control-label">{{ trans('admin.url_ads') }}</label>
                        <input type="date" class="form-control" name="url_ads" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="desc" class="form-control-label">{{ trans('admin.desc') }} {{ trans('admin.arabic') }}</label>
                        <textarea name="description[ar]" class="form-control" rows="8"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="desc" class="form-control-label">{{ trans('admin.desc') }}_En</label>
                        <textarea name="description[en]" class="form-control" rows="8"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="desc" class="form-control-label">{{ trans('admin.desc') }}_Fr</label>
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
</script>
