<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('branches.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <label for="department_id" class="form-control-label">@lang('admin.departments')</label>
                    <select class="form-control" name="department_id" required>
                        <option value="" selected >@lang('admin.select')</option>
                    @foreach($departments as $department)
                            <option value="{{ $department->id}}">{{ $department->getTranslation('department_name',app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mt-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.code_latin')}} </label>
                    <input type="text" id="department_branch_code"  class="form-control" name="department_branch_code">
                </div>


            </div>


            <div class="row">
                <div class="col-md-12 mt-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="branch_name_ar" id="branch_name_ar">
                </div>
                <div class="col-md-12 mt-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" name="branch_name_en" id="branch_name_en">
                </div>
                <div class="col-md-12 mt-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" name="branch_name_fr" id="branch_name_fr">
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
    $('.dropify').dropify();
    $(document).ready(function() {
        $('select').select2();
    });

</script>
<script>
    $('.dropify').dropify()
</script>
