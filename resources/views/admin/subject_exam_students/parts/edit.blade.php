<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('subject_exam_students.update', $subjectExamStudent->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $subjectExamStudent->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="exam_code" class="form-control-label">{{ trans('admin.exam_code')  }}</label>
                    <input type="number" class="form-control" value="{{ $subjectExamStudent->exam_code }}" name="exam_code">
                </div>
                <div class="col-md-6">
                    <label for="section" class="form-control-label">{{ trans('admin.section')  }}</label>
                    <input type="text" class="form-control" value="{{ $subjectExamStudent->section }}" name="section">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="subject_id" class="form-control-label">{{ trans('admin.student') }}</label>
                    <select name="user_id" class="form-control">
                        @foreach ($data['users'] as $user)
                        <option value="{{ $user->id }}" style="text-align: center" {{ $subjectExamStudent->user_id == $user->id ? 'selected' : '' }}>{{ $user->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="subject_exam_id" class="form-control-label">{{ trans('admin.subject_exam') }}</label>
                    <select name="subject_exam_id" class="form-control">
                        @foreach ($data['subject_exams'] as $subject_exam)
                        <option value="{{ $subject_exam->id }}" style="text-align: center" {{ $subjectExamStudent->subject_exam_id == $subject_exam->id ? 'selected' : '' }}>{{ $subject_exam->subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                            <option value="ربيعيه" style="text-align: center" {{ $subjectExamStudent->period == 'ربيعيه' ? 'selected' : '' }}>{{ trans('admin.autumnal') }}</option>
                            <option value="خريفيه" style="text-align: center" {{ $subjectExamStudent->period == 'خريفيه' ? 'selected' : '' }}>{{ trans('admin.fall') }}</option>
                    </select>
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
