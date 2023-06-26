<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('departments.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">

                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.department_code_ar')}} </label>
                    <input type="text" id="department_code_ar"  class="form-control" name="department_code_ar">
                </div>

                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.department_code_en')}} </label>
                    <input type="text" id="department_code_en" class="form-control" name="department_code_en">
                </div>

                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.department_code_fr')}}</label>
                    <input type="text" id="department_code_fr" class="form-control" name="department_code_fr">
                </div>



                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" id="department_code_ar" class="form-control" name="department_name_ar">
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.english') }}</label>
                    <input type="text" id="department_code_en" class="form-control" name="department_name_en">
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.france') }}</label>
                    <input type="text" id="department_code_fr" class="form-control" name="department_name_fr">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add')}}</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify()
</script>
