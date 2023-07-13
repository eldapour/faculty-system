<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('facultyCount.store') }}">
        @csrf
        <div class="form-group">

            <div class="row">
                <div class="col-12">
                    <div class="col-md-12 mt-3">
                        <label for="image" class="form-control-label">{{ trans('admin.image') }}</label>
                        <input type="file" name="image" class="dropify" data-default-file="" required="required">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.name') ." ".  trans('admin.arabic')}} </label>
                    <input type="text" class="form-control" name="title[ar]" id="group_name_ar" required="required">
                </div>
                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.name') ." ".  trans('admin.english')}} </label>
                    <input type="text" class="form-control" name="title[en]" id="group_name_en" required="required">
                </div>

                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.name') ." ".  trans('admin.france')}} </label>
                    <input type="text" class="form-control" name="title[fr]" id="group_name_fr" required="required">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="group_name" class="form-control-label">{{ trans('admin.value')  }} </label>
                    <input type="number" class="form-control" name="count" id="count" required="required">
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
    $('.dropify').dropify()
</script>
