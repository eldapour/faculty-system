<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('services.update', $service->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $service->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}_Ar</label>
                    <input type="text" class="form-control" name="service_name[ar]" value="{{ $service->service_name['ar'] }}" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}_En</label>
                    <input type="text" class="form-control" value="{{ $service->service_name['en'] }}" name="service_name[en]" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}_Fr</label>
                    <input type="text" class="form-control" value="{{ $service->service_name['fr'] }}" name="service_name[fr]" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-success" id="updateButton">تحديث</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
