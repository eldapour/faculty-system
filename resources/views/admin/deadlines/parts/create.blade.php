<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('deadlines.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="name_en" class="form-control-label">{{ trans('admin.deadline_date_start') }}</label>
                    <input type="date" class="form-control" name="deadline_date_start">
                </div>
                <div class="col-md-6">
                    <label for="name_en" class="form-control-label">{{ trans('admin.deadline_date_end') }}</label>
                    <input type="date" class="form-control" name="deadline_date_end">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}
                        {{ trans('admin.arabic') }}</label>
                    <textarea name="description_ar" class="form-control" rows="4"></textarea>
                </div>
            </div>

            <div class="row mt-4">
            <div class="col-md-12">
                <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}
                    {{ trans('admin.english') }}</label>
                <textarea name="description_en" class="form-control" rows="4"></textarea>
            </div>
           </div>

        <div class="row mt-4">
        <div class="col-md-12">
            <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}
                {{ trans('admin.france') }}</label>
            <textarea name="description_fr" class="form-control editor" rows="4"></textarea>
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

    $(document).ready(function() {
        $('select').select2();
    });
</script>
