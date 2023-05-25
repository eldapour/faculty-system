<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('settings.update', $setting->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $setting->id }}" name="id">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="setting_name" class="form-control-label">{{ trans('admin.name') }} {{ trans('admin.arabic') }}</label>
                        <input type="text" class="form-control" value="{{ $setting->setting_name['ar'] }}"
                            name="setting_name[ar]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="setting_name" class="form-control-label">{{ trans('admin.name') }}_En</label>
                        <input type="text" class="form-control" value="{{ $setting->setting_name['en'] }}" name="setting_name[en]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="setting_name" class="form-control-label">{{ trans('admin.name') }}_Fr</label>
                        <input type="text" class="form-control" value="{{ $setting->setting_name['fr'] }}" name="setting_name[fr]" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="setting_name" class="form-control-label">{{ trans('admin.value') }}</label>
                        <input type="text" class="form-control" value="{{ $setting->setting_value }}" name="setting_value" required>
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
    $('.dropify').dropify()
</script>
