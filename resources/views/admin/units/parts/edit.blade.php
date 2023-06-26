<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('unit.update', $unit->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $unit->id }}" name="id">
        <div class="form-group">
            <div class="row">

                <div class="col-md-12 mt-3">
                    <label for="group_name" class="form-control-label">{{ trans('admin.code_latin')}} </label>
                    <input type="text" id="unit_code"  class="form-control" name="unit_code" value="{{ $unit->unit_code }}">
                </div>




                <div class="col-md-12 mt-3">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.arabic') }} </label>
                    <input type="text" class="form-control" value="{{ $unit->getTranslation('unit_name', 'ar') }}" name="unit_name_ar" id="unit_name_ar">
                </div>
                <div class="col-md-12 mt-3">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.english') }} </label>
                    <input type="text" class="form-control" value="{{ $unit->getTranslation('unit_name', 'en') }}" name="unit_name_en" id="unit_name_en">
                </div>

                <div class="col-md-12 mt-3">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.france') }} </label>
                    <input type="text" class="form-control" value="{{ $unit->getTranslation('unit_name', 'fr') }}" name="unit_name_fr" id="unit_name_fr">
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
