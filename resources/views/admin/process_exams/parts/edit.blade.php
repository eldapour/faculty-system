<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('process_exams.update', $processExam->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $processExam->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="user_id" class="form-control-label">{{ trans('admin.student') }}</label>
                    <select name="user_id" class="form-control">
                        @foreach ($data['users'] as $user)
                            <option value="{{ $user->id }}" style="text-align: center" {{ $processExam->user_id == $user->id ? 'selected' : '' }}>{{ $user->first_name }}</option>
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
                        <option value="ربيعيه" style="text-align: center" {{ $processExam->period == 'ربيعيه' ? 'selected' : ''}}>{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center" {{ $processExam->period == 'خريفيه' ? 'selected' : '' }}>{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="year">{{ trans('admin.year') }}</label>
                    <input type="date" value="{{ $processExam->year }}" class="form-control" name="year">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="request_status" class="form-control-label">{{ trans('admin.request_status') }}</label>
                    <select name="request_status" class="form-control">
                        <option value="new" style="text-align: center" {{ $processExam->request_status == 'new' ? 'selected' : '' }}>{{ trans('admin.new') }}</option>
                        <option value="accept" style="text-align: center" {{ $processExam->request_status == 'accept' ? 'selected' : '' }}>{{ trans('admin.accept') }}</option>
                        <option value="refused" style="text-align: center" {{ $processExam->request_status == 'refused' ? 'selected' : '' }}>{{ trans('admin.refused') }}</option>
                        <option value="under_processing" style="text-align: center" {{ $processExam->request_status == 'under_processing' ? 'selected' : '' }}>
                            {{ trans('admin.under_processing') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="year">{{ trans('admin.request_date') }}</label>
                    <input type="date" value="{{ $processExam->request_date }}" class="form-control" name="request_date">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="processing_request_date" class="form-control-label">{{ trans('admin.processing_request_date') }}</label>
                    <input type="date" value="{{ $processExam->processing_request_date }}" name="processing_request_date" class="form-control"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="reason" class="form-control-label">{{ trans('admin.reason') }}</label>
                    <textarea name="reason" class="form-control" rows="10">{{ $processExam->reason }}</textarea>
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

        CKEDITOR.replaceAll();

        $(document).ready(function() {
            $('select').select2();
        });
</script>
