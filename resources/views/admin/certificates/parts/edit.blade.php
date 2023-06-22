<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('certificates.update',$certificate->id)}}" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">


                <div class="col-md-12 mt-3">
                    <label for="user_id" class="form-control-label">{{trans('admin.situation_with_management')}}</label>
                    <select class="form-control" name="situation_with_management" id="situation_with_management">
                        <option value="" selected disabled>@lang('admin.select')</option>
                            <option value="1">{{trans('admin.no_problem')}}</option>
                            <option value="0">{{trans('admin.problem')}}</option>
                    </select>
                </div>

                <div class="col-md-12 mt-3">
                    <label for="category_name" class="form-control-label">{{ trans('admin.description_situation_with_management_ar') }}</label>
                    <input type="text" class="form-control" name="description_situation_with_management_ar" id="description_situation_with_management_ar" value="{{$certificate->getTranslation('description_situation_with_management', 'ar')}}">
                </div>


                <div class="col-md-12 mt-3">
                    <label for="category_name" class="form-control-label">{{ trans('admin.description_situation_with_management_en') }}</label>
                    <input type="text" class="form-control" name="description_situation_with_management_en" id="description_situation_with_management_en" value="{{$certificate->getTranslation('description_situation_with_management','en')}}">
                </div>


                <div class="col-md-12 mt-3">
                    <label for="category_name" class="form-control-label">{{ trans('admin.description_situation_with_management_fr') }}</label>
                    <input type="text" class="form-control" name="description_situation_with_management_fr" id="description_situation_with_management_fr" value="{{$certificate->getTranslation('description_situation_with_management','fr')}}">
                </div>




                <div class="col-md-12 mt-3">
                    <label for="user_id" class="form-control-label">{{trans('admin.situation_with_treasury')}}</label>
                    <select class="form-control" name="situation_with_treasury" id="situation_with_treasury">
                        <option value="" selected disabled>@lang('admin.select')</option>
                        <option value="1">{{trans('admin.pay')}}</option>
                        <option value="0">{{trans('admin.not_pay')}}</option>
                    </select>
                </div>


                <div class="col-md-12 mt-3">
                    <label for="category_name" class="form-control-label">{{ trans('admin.description_situation_with_treasury_ar') }}</label>
                    <input type="text" class="form-control" name="description_situation_with_treasury_ar" id="description_situation_with_treasury_ar" value="{{$certificate->getTranslation('description_situation_with_treasury','ar')}}">
                </div>


                <div class="col-md-12 mt-3">
                    <label for="category_name" class="form-control-label">{{ trans('admin.description_situation_with_treasury_en') }}</label>
                    <input type="text" class="form-control" name="description_situation_with_treasury_en" id="description_situation_with_treasury_en" value="{{$certificate->getTranslation('description_situation_with_treasury', 'en')}}">
                </div>


                <div class="col-md-12 mt-3">
                    <label for="category_name" class="form-control-label">{{ trans('admin.description_situation_with_treasury_fr') }}</label>
                    <input type="text" class="form-control" name="description_situation_with_treasury_fr" id="description_situation_with_treasury_fr" value="{{$certificate->getTranslation('description_situation_with_treasury','fr')}}">
                </div>



                <div class="col-md-12 mt-3">
                    <label for="category_name" class="form-control-label">{{trans('admin.validation_year')}}</label>
                    <input type="text" class="form-control" name="validation_year" id="validation_year" value="{{$certificate->validation_year}}">
                </div>


                <div class="col-md-12 mt-3">
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
    $('.dropify').dropify();
    $(document).ready(function() {
        $('select').select2();
    });
</script>

