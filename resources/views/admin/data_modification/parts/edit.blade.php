<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('data_modify.update', $data_modify->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $data_modify->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 ">
                    <label for="name_ar" class="form-control-label d-flex">{{  trans('admin.orders') }}</label>
                    <ol>
                    @foreach($data_modify->data_modification_type as $data)
                    <li class="">{{ trans('admin.' . $data) }}</li>
                    @endforeach
                    </ol>
                </div>
                <div class="col-md-12 ">
                    <label for="name_ar" class="form-control-label d-flex">{{  trans('admin.card_image_user') }}</label>
                    <img style="height: 80%;" class="form-control" src="{{ asset($data_modify->card_image) }}"/>
                </div>
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label d-flex">{{  trans('admin.status') }}</label>

                    <label for="new" class="badge badge-info">{{ trans('admin.new') }}
                        <input type="radio" name="status" {{ $data_modify->request_status == 'new' ? 'checked' : '' }} value="new" id="new"/>
                    </label>
                    <label for="accept" class="badge badge-success">{{ trans('admin.accept') }}
                        <input type="radio" name="status" {{ $data_modify->request_status == 'accept' ? 'checked' : '' }} value="accept" id="accept"/>
                    </label>
                    <label for="refused" class="badge badge-danger">{{ trans('admin.refused') }}
                        <input type="radio" name="status" {{ $data_modify->request_status == 'refused' ? 'checked' : '' }} value="refused" id="refused"/>
                    </label>
                    <label for="under_processing" class="badge badge-secondary">{{ trans('admin.under_processing') }}
                        <input type="radio"  name="status" {{ $data_modify->request_status == 'under_processing' ? 'checked' : '' }} value="under_processing" id="under_processing"/>
                    </label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.close')</button>
            <button type="submit" class="btn btn-success" id="updateButton">@lang('admin.update')</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
<script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function () {
        $('select').select2();
    });
</script>
