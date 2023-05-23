<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('deadlines.store') }}">
        @csrf
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{  trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{  trans('admin.add') }}</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify()
</script>
