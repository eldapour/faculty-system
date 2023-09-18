<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('group.update', $group->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $group->id }}" name="id">
        <div class="form-group">
            <div class="row">


                <div class="col-md-12">
                    <label for="group_name" class="form-control-label">{{ trans('admin.code_latin')}} </label>
                    <input type="text" class="form-control" id="group_code" name="group_code" value="{{ $group->group_code }}">
                </div>




                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.name') ." ".  trans('admin.arabic')}} </label>
                    <input type="text"  id="group_name_ar" class="form-control" value="{{ $group->getTranslation('group_name', 'ar') }}" name="group_name_ar">
                </div>
                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.name') ." ".  trans('admin.english')}} </label>
                    <input type="text"  id="group_name_en" class="form-control" value="{{ $group->getTranslation('group_name', 'en') }}" name="group_name_en">
                </div>
                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.name') ." ".  trans('admin.france')}} </label>
                    <input type="text" id="group_name_fr" class="form-control" value="{{ $group->getTranslation('group_name', 'fr') }}" name="group_name_fr">
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
