<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('certificate_name.update', $certificateName->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $certificateName->id }}" name="id">
        <div class="form-group">
            <div class="row">

                <div class="col-md-12">
                    <label for="name" class="form-control-label">{{ trans('admin.code_latin')}}</label>
                    <input type="text"  class="form-control" name="code" id="code" value="{{$certificateName->code}}">
                </div>



                <div class="col-md-4">
                    <label for="name" class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.arabic') }}
                    </label>
                    <input type="text"  class="form-control" name="certificate_type_ar" id="certificate_type_ar" value="{{$certificateName->certificate_type_ar}}">
                </div>


                <div class="col-md-4">
                    <label for="name"
                           class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.english') }} </label>
                    <input type="text" class="form-control" name="certificate_type_en" id="certificate_type_en" value="{{$certificateName->certificate_type_en}}">
                </div>
                <div class="col-md-4">
                    <label for="name"
                           class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.france') }}</label>
                    <input type="text" class="form-control" name="certificate_type_fr" id="certificate_type_fr" value="{{$certificateName->certificate_type_fr}}">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-success" id="updateButton">{{ trans('admin.update') }}</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
