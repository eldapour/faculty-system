<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('elements.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">


                <div class="col-md-6 col-12">
                    <label for="name"
                           class="form-control-label">{{ trans('elements.element_code') }}</label>
                    <input type="text" class="form-control" name="element_code">
                </div>


                <div class="col-md-6 col-12">
                    <label for="name"
                        class="form-control-label">{{ trans('elements.name_ar') }}</label>
                    <input type="text" class="form-control" name="name_ar">
                </div>

                <div class="col-md-12 col-12">
                    <label for="name"
                        class="form-control-label">{{ trans('elements.name_latin') }}</label>
                    <input type="text" class="form-control" name="name_latin">
                </div>


            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <label for="name" class="form-control-label">{{ trans('elements.session') }}</label>
                    <select name="session_name" class="form-control">
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>

                <div class="col-md-12 col-12">
                    <label for="name" class="form-control-label">{{ trans('elements.department_id') }}</label>
                    <select name="department_id" class="form-control">
                        @foreach ($departments as $department)

                            <option value="{{ $department->id }}" style="text-align: center">{{ $department->getTranslation('department_name', app()->getLocale()) }}</option>
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
