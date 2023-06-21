<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('departments.update', $department->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $department->id }}" name="id">
        <div class="form-group">
            <div class="row">

                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.department_code_ar')}} </label>
                    <input type="text" id="department_code_ar"  class="form-control" name="department_code_ar" value="{{ $department->getTranslation('department_code', 'ar') }}">
                </div>

                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.department_code_en')}} </label>
                    <input type="text" id="department_code_en" class="form-control" name="department_code_en" value="{{ $department->getTranslation('department_code', 'en') }}">
                </div>

                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.department_code_fr')}}</label>
                    <input type="text" id="department_code_fr" class="form-control" name="department_code_fr" value="{{ $department->getTranslation('department_code', 'fr') }}">
                </div>


                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="department_name_ar" value="{{ $department->getTranslation('department_name', 'ar') }}" id="department_name_ar">
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $department->getTranslation('department_name', 'en') }}" name="department_name_en" id="department_name_en">
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $department->getTranslation('department_name', 'fr') }}" name="department_name_fr" id="department_name_fr">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.close')</button>
            <button type="submit" class="btn btn-success" id="updateButton">@lang('admin.update')</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
