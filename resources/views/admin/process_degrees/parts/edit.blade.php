<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('process_degrees.update', $processDegree->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $processDegree->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="user_id" class="form-control-label">{{ trans('admin.student') }}</label>
                    <select name="user_id" class="form-control">
                        @foreach ($data['students'] as $student)
                            <option value="{{ $student->id }}" {{ $processDegree->user_id == $student->id ? 'selected' : '' }}>{{ $student->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="doctor_id" class="form-control-label">{{ trans('admin.doctor') }}</label>
                    <select name="doctor_id" class="form-control">
                        @foreach ($data['doctors'] as $doctor)
                            <option value="{{ $doctor->id }}" {{ $processDegree->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="subject_id" class="form-control-label">{{ trans('admin.subject') }}</label>
                    <select name="subject_id" class="form-control">
                        @foreach ($data['subjects'] as $subject)
                            <option value="{{ $subject->id }}" {{ $processDegree->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center" {{ $processDegree->period == 'ربيعيه' ? 'selected' : '' }}>{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center" {{ $processDegree->period == 'خريفيه' ? 'selected' : '' }}>{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="year">{{ trans('admin.year') }}</label>
                        <input type="date" value="{{ $processDegree->year }}" class="form-control" name="year">
                </div>
                <div class="col-md-4">
                    <label for="section" class="form-control-label">{{ trans('admin.section') }}</label>
                        <input type="text" value="{{ $processDegree->section }}" class="form-control" name="section">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="exam_code" class="form-control-label">{{ trans('admin.exam_code') }}</label>
                    <input type="number" value="{{ $processDegree->exam_code }}" class="form-control" name="exam_code">
                </div>
                <div class="col-md-4">
                    <label for="student_degree_before_request" class="form-control-label">{{ trans('admin.student_degree_before_request') }}</label>
                    <input type="number" value="{{ $processDegree->student_degree_before_request }}" class="form-control" name="student_degree_before_request">
                </div>
                <div class="col-md-4">
                    <label for="request_type" class="form-control-label">{{ trans('admin.request_type') }}</label>
                    <select name="request_type" class="form-control">
                        <option value="غائب" style="text-align: center" {{ $processDegree->request_type == 'غائب' ? 'selected' : '' }}>{{ trans('admin.absent') }}</option>
                        <option value="مراجعه الورقه" style="text-align: center" {{ $processDegree->request_type == 'مراجعه الورقه' ? 'selected' : '' }}>{{ trans('admin.paper_review') }}</option>
                        <option value="طلب جبر" style="text-align: center" {{ $processDegree->request_type == 'طلب جبر' ? 'selected' : '' }}>{{ trans('admin.reparation_request') }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="request_status" class="form-control-label">{{ trans('admin.request_status') }}</label>
                    <select name="request_status" class="form-control">
                        <option value="new" style="text-align: center" {{ $processDegree->request_status == 'new' ? 'selected' : '' }}>{{ trans('admin.new') }}</option>
                        <option value="accept" style="text-align: center" {{ $processDegree->request_status == 'accept' ? 'selected' : '' }}>{{ trans('admin.accept') }}</option>
                        <option value="refused" style="text-align: center" {{ $processDegree->request_status == 'refused' ? 'selected' : '' }}>{{ trans('admin.refused') }}</option>
                        <option value="under_processing" style="text-align: center" {{ $processDegree->period == '' ? 'under_processing' : '' }}>{{ trans('admin.under_processing') }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="student_degree_after_request" class="form-control-label">{{ trans('admin.student_degree_after_request') }}</label>
                    <input type="number" value="{{ $processDegree->student_degree_after_request }}" class="form-control" name="student_degree_after_request">
                </div>
                <div class="col-md-4">
                    <label for="processing_date" class="form-control-label">{{ trans('admin.processing_date') }}</label>
                    <input type="date" value="{{ $processDegree->processing_date }}" class="form-control" name="processing_date">
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
