<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('unit.update', $unit->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $unit->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.arabic') }} </label>
                    <input type="text" class="form-control" value="{{ $unit->unit_name }}" name="unit_name[ar]">
                </div>
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.english') }} </label>
                    <input type="text" class="form-control" value="{{ $unit->unit_name }}" name="unit_name[en]">
                </div>
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.france') }} </label>
                    <input type="text" class="form-control" value="{{ $unit->unit_name }}" name="unit_name[fr]">
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
