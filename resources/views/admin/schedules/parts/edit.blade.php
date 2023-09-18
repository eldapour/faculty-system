<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" enctype="multipart/form-data" action="{{ route('schedules.update', $schedule->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $schedule->id }}" name="id">
        <div class="form-group">
            <div class="row">

                <div class="col-md-6">
                    <label for="pdf_upload" class="form-control-label">@lang('admin.schedule_pdf_upload')</label>
                    <input type="file" class="form-control" name="pdf_upload" id="pdf_upload">
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
