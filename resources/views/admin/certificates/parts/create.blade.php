
<link href="{{asset('assets/admin')}}/plugins/select2/select2.min.css" rel="stylesheet"/>
<div class="modal-header">
    <h5 class="modal-title" id="example-Modal3">{{trans('admin.add_document')}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="addForm" class="addForm" method="POST"  action="{{route('certificates.store')}}" >
        @csrf
        <div class="form-group">
            <div class="row">

                <div class="col-md-12">
                    <label for="user_id" class="form-control-label">{{trans('admin.diploma_user')}}</label>
                    <select class="form-control" name="user_id">
                        <option value="" selected disabled>@lang('admin.select')</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id}}">{{ $user->identifier_id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="category_name" class="form-control-label">{{ trans('admin.diploma_name_ar') }}</label>
                    <input type="text" class="form-control" name="diploma_name_ar" id="diploma_name_ar">
                </div>

                <div class="col-md-12">
                    <label for="category_name" class="form-control-label">{{ trans('admin.diploma_name_en') }}</label>
                    <input type="text" class="form-control" name="diploma_name_en" id="diploma_name_en">
                </div>

                <div class="col-md-12">
                    <label for="category_name" class="form-control-label">{{ trans('admin.diploma_name_fr') }}</label>
                    <input type="text" class="form-control" name="diploma_name_fr" id="diploma_name_fr">
                </div>

                <div class="col-md-12">
                    <label for="category_name" class="form-control-label">{{trans('admin.validation_year')}}</label>
                    <input type="text" class="form-control" name="validation_year" id="validation_year">
                </div>


                <div class="col-md-12">
                    <label for="category_name" class="form-control-label">{{trans('admin.diploma_year')}}</label>
                    <input type="text" class="form-control" name="year" id="year">
                </div>


            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin.close_model')}}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{trans('admin.add_data')}}</button>

        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('select').select2();
    });
</script>
