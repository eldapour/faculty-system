<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('update', $deadlines->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $deadlines->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="name_en" class="form-control-label">{{ trans('admin.deadline_date_start') }}</label>
                    <input type="date" class="form-control" name="deadline_date_start" required>
                </div>
                <div class="col-md-6">
                    <label for="name_en" class="form-control-label">{{ trans('admin.deadline_date_end') }}</label>
                    <input type="date" class="form-control" name="deadline_date_end" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}_Ar</label>
                    <textarea name="description[ar]" class="form-control" rows="8"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}_En</label>
                    <textarea name="description[en]" class="form-control" rows="8"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}_Fr</label>
                    <textarea name="description[fr]" class="form-control" rows="8"></textarea>
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
