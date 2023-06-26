<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('group.update', $group->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $group->id }}" name="id">
        <div class="form-group">
            <div class="row">


                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.group_code_ar')}} </label>
                    <input type="text" class="form-control" id="group_code_ar" name="group_code_ar" value="{{ $group->getTranslation('group_code', 'ar') }}">
                </div>

                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.group_code_en')}} </label>
                    <input type="text" class="form-control" id="group_code_en" name="group_code_en" value="{{ $group->getTranslation('group_code', 'en') }}">
                </div>

                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.group_code_fr')}}</label>
                    <input type="text" class="form-control" id="group_code_fr" name="group_code_fr" value="{{ $group->getTranslation('group_code', 'fr') }}">
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
