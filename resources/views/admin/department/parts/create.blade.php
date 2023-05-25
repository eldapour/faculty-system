<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('departments.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="department_name[ar]" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" name="department_name[en]" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" name="department_name[fr]" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add')}}</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify()
</script>
