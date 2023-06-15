<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('process_exams.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="col-md-12">
                    <label for="attachment_file" class="form-control-label">{{ trans('admin.attachment_file') }}</label>
                    <input type="file" name="attachment_file" class="form-control">
                </div>
            </div>
            <div class="row">
                <input type="hidden" class="form-control" name="year" value="{{ (new DateTime)->format("Y") }}">
                <input type="hidden" class="form-control" name="period" value="{{ checkPeriod() }}">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" class="form-control" value="{{ (new DateTime)->format("Y-m-d") }}" name="request_date">
                </div>
            </div>
            <div class="row">

                        @foreach($updated_at as $process_request)
                        <input type="hidden" value="{{ $process_request }}" name="processing_request_date" class="form-control" />
                        @endforeach
                        </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="reason" class="form-control-label">{{ trans('admin.reason') }}</label>
                    <textarea name="reason" class="form-control" rows="10"></textarea>
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
    CKEDITOR.replaceAll();

    $(document).ready(function() {
        $('select').select2();
    });
</script>
