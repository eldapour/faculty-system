<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('document_types.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{trans('admin.document_name_ar')}}</label>
                    <input type="text" class="form-control" name="document_name_ar" id="document_name_ar">
                </div>

                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{trans('admin.document_name_en')}}</label>
                    <input type="text" class="form-control" name="document_name_en" id="document_name_en">
                </div>

                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{trans('admin.document_name_fr')}}</label>
                    <input type="text" class="form-control" name="document_name_fr" id="document_name_fr">
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add_data')}}</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify()
</script>
