<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('departments.update', $department->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $department->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="department_name[ar]" value="{{ $department->department_name['ar'] }}" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $department->department_name['en'] }}" name="department_name[en]" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $department->department_name['fr'] }}" name="department_name[fr]" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.close')</button>
            <button type="submit" class="btn btn-success" id="updateButton">@lang('admin.update')</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
