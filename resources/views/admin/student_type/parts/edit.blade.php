<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('studentType.update',$find->id)}}" >
    @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="category_name" class="form-control-label">{{ trans('admin.name') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="student_type[ar]" value="{{ $find->getTranslation('student_type', 'ar') }}" required="required">
                </div>
                <div class="col-md-4">
                    <label for="category_name" class="form-control-label">{{ trans('admin.name') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" name="student_type[en]" value="{{ $find->getTranslation('student_type', 'en') }}" required="required">
                </div>
                <div class="col-md-4">
                    <label for="category_name" class="form-control-label">{{ trans('admin.name') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" name="student_type[fr]" value="{{ $find->getTranslation('student_type', 'fr') }}" required="required">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="category_name" class="form-control-label">{{ trans('admin.note') }}</label>
                    <input type="text" class="form-control" value="{{ $find->notes }}" name="notes">
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
