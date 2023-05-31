<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('certificates.update',$certificate->id)}}" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">

                <div class="col-md-12">
                    <label for="category_name" class="form-control-label">{{ trans('admin.diploma_name_ar') }}</label>
                    <input type="text" class="form-control" name="diploma_name_ar" id="diploma_name_ar" value="{{$certificate->getTranslation('diploma_name', 'ar')}}">
                </div>

                <div class="col-md-12">
                    <label for="category_name" class="form-control-label">{{ trans('admin.diploma_name_en') }}</label>
                    <input type="text" class="form-control" name="diploma_name_en" id="diploma_name_en" value="{{$certificate->getTranslation('diploma_name', 'en')}}">
                </div>

                <div class="col-md-12">
                    <label for="category_name" class="form-control-label">{{ trans('admin.diploma_name_fr') }}</label>
                    <input type="text" class="form-control" name="diploma_name_fr" id="diploma_name_fr" value="{{$certificate->getTranslation('diploma_name', 'fr')}}">
                </div>

                <div class="col-md-12">
                    <label for="category_name" class="form-control-label">{{trans('admin.validation_year')}}</label>
                    <input type="text" class="form-control" name="validation_year" id="validation_year" value="{{$certificate->validation_year}}">
                </div>


                <div class="col-md-12">
                    <label for="category_name" class="form-control-label">{{trans('admin.diploma_year')}}</label>
                    <input type="text" class="form-control" name="year" id="year" value="{{$certificate->year}}">
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

