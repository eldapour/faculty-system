<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('studentType.store')}}" >
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="category_name" class="form-control-label">{{ trans('admin.name') }} {{ trans('admin.arabic') }}</label>
                <input type="text" class="form-control" name="student_type[ar]">
            </div>
            <div class="col-md-4">
                <label for="category_name" class="form-control-label">{{ trans('admin.name') }}  {{ trans('admin.english') }}</label>
                <input type="text" class="form-control" name="student_type[en]">
            </div>
            <div class="col-md-4">
                <label for="category_name" class="form-control-label">{{ trans('admin.name') }}  {{ trans('admin.france') }}</label>
                <input type="text" class="form-control" name="student_type[fr]">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="category_name" class="form-control-label">{{ trans('admin.note') }}</label>
                <input type="text" class="form-control" name="notes">
            </div>
        </div>
    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.close')</button>
            <button type="submit" class="btn btn-primary" id="addButton">@lang('admin.add')</button>

        </div>
    </form>
</div>

<script>
</script>
