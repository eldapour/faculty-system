<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('categories.store')}}" >
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="category_name" class="form-control-label">{{ trans('admin.name') }}_Ar</label>
                <input type="text" class="form-control" name="category_name[ar]" required>
            </div>
            <div class="col-md-4">
                <label for="category_name" class="form-control-label">{{ trans('admin.name') }}_En</label>
                <input type="text" class="form-control" name="category_name[en]" required>
            </div>
            <div class="col-md-4">
                <label for="category_name" class="form-control-label">{{ trans('admin.name') }}_Fr</label>
                <input type="text" class="form-control" name="category_name[fr]" required>
            </div>
        </div>
    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-primary" id="addButton">اضافة</button>
        </div>
    </form>
</div>

<script>
</script>
