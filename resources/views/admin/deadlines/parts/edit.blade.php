<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('deadlines.update', $deadline->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $deadline->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="name_en" class="form-control-label">{{ trans('admin.deadline_date_start') }}</label>
                    <input type="date" class="form-control" value="{{ $deadline->deadline_date_start }}" name="deadline_date_start" required>
                </div>
                <div class="col-md-6">
                    <label for="name_en" class="form-control-label">{{ trans('admin.deadline_date_end') }}</label>
                    <input type="date" class="form-control" value="{{ $deadline->deadline_date_end }}" name="deadline_date_end" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }} {{ trans('admin.arabic') }}</label>
                    <textarea name="description[ar]" class="form-control" rows="8">{{ $deadline->description['ar'] }}</textarea>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}  {{ trans('admin.english') }}</label>
                    <textarea name="description[en]" class="form-control" rows="8">{{ $deadline->description['en'] }}</textarea>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}  {{ trans('admin.france') }}</label>
                    <textarea name="description[fr]" class="form-control" rows="8">{{ $deadline->description['fr'] }}</textarea>
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
