<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('elements.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">

                <div class="col-md-6 col-12">
                    <label for="name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="name_ar">
                </div>

                <div class="col-md-6 col-12">
                    <label for="name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.english') }}</label>
                    <input type="text" class="form-control" name="name_en">
                </div>

                <div class="col-md-12 col-12">
                    <label for="name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.france') }}</label>
                    <input type="text" class="form-control" name="name_fr">
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <label for="name" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-12 col-12">
                    <label for="name" class="form-control-label">{{ trans('admin.department') ." ". trans('admin.branch') }}</label>
                    <select name="department_branch_id" class="form-control">
                        @foreach ($data['department_branchs'] as $key => $department_branch)
                            <option value="{{ $department_branch->id }}" style="text-align: center">{{ $department_branch->getTranslation('branch_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add') }}</button>
        </div>
    </form>
</div>

<script>
    CKEDITOR.replaceAll();

    $(document).ready(function() {
        $('select').select2();
    });
</script>
