<div class="modal-header">
    <h5 class="modal-title" id="example-Modal3">{{trans('admin.update')}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('document_types.update', $documentType->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $documentType->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{trans('admin.document_name_ar')}}</label>
                    <input type="text" class="form-control" name="document_name_ar" id="document_name_ar" value="{{$documentType->getTranslation('document_name', 'ar')}}">
                </div>

                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{trans('admin.document_name_en')}}</label>
                    <input type="text" class="form-control" name="document_name_en" id="document_name_en" value="{{$documentType->getTranslation('document_name', 'en')}}">
                </div>

                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{trans('admin.document_name_fr')}}</label>
                    <input type="text" class="form-control" name="document_name_fr" id="document_name_fr" value="{{$documentType->getTranslation('document_name', 'fr')}}">
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin.close_model')}}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{trans('admin.edit_model')}}</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
