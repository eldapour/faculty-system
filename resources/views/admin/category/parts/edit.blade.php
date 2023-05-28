<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('categories.update',$find->id)}}" >
    @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="category_name" class="form-control-label">{{ trans('admin.name') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" value="{{ $find->category_name }}" name="category_name[ar]" required>
                </div>
                <div class="col-md-4">
                    <label for="category_name" class="form-control-label">{{ trans('admin.name') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $find->category_name }}" name="category_name[en]" required>
                </div>
                <div class="col-md-4">
                    <label for="category_name" class="form-control-label">{{ trans('admin.name') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $find->category_name }}" name="category_name[fr]" required>
                </div>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
                <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.update') }}</button>
            </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
