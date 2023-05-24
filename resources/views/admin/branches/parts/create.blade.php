<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('branches.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="department_id" class="form-control-label">@lang('admin.departments')</label>
                    <select class="form-control" name="department_id" required>
                        <option value="" selected disabled>@lang('admin.select')</option>
                    @foreach($departments as $department)
                            <option value="{{ $department->id}}">{{ $department->department_name[lang()] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}_Ar</label>
                    <input type="text" class="form-control" name="branch_name[ar]" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}_En</label>
                    <input type="text" class="form-control" name="branch_name[en]" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}_Fr</label>
                    <input type="text" class="form-control" name="branch_name[fr]" required>
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
