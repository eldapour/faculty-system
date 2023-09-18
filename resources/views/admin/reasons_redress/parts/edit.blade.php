<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('reasons_redress.update', $reasonsRedress->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $reasonsRedress->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="unit_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.arabic') }} </label>
                    <input type="text" class="form-control" value="{{ $reasonsRedress->getTranslation('name', 'ar') }}" name="name[ar]">
                </div>
                <div class="col-md-4">
                    <label for="unit_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.english') }} </label>
                    <input type="text" class="form-control" value="{{ $reasonsRedress->getTranslation('name', 'en') }}" name="name[en]">
                </div>
                <div class="col-md-4">
                    <label for="unit_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.france') }} </label>
                    <input type="text" class="form-control" value="{{ $reasonsRedress->getTranslation('name', 'fr') }}" name="name[fr]">
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
