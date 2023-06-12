<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('process_exams.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="user_id" class="form-control-label">{{ trans('admin.student') }}</label>
                    <select name="user_id" class="form-control">
                        @foreach ($data['users'] as $user)
                            <option value="{{ $user->id }}" style="text-align: center">{{ $user->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="attachment_file" class="form-control-label">{{ trans('admin.attachment_file') }}</label>
                    <input type="file" name="attachment_file" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="year">{{ trans('admin.year') }}</label>
                    <input type="number" class="form-control" name="year">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="request_status" class="form-control-label">{{ trans('admin.request_status') }}</label>
                    <select name="request_status" class="form-control">
                        <option value="new" style="text-align: center">{{ trans('admin.new') }}</option>
                        <option value="accept" style="text-align: center">{{ trans('admin.accept') }}</option>
                        <option value="refused" style="text-align: center">{{ trans('admin.refused') }}</option>
                        <option value="under_processing" style="text-align: center">
                            {{ trans('admin.under_processing') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="year">{{ trans('admin.request_date') }}</label>
                    <input type="date" class="form-control" name="request_date">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="processing_request_date" class="form-control-label">{{ trans('admin.processing_request_date') }}</label>
                    <input type="date" name="processing_request_date" class="form-control"/>
                </div>
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
