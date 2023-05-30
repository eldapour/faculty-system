<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('subject_exam_student_result.update', $subjectExamStudentResult->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $subjectExamStudentResult->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="subject_id" class="form-control-label">{{ trans('admin.student') }}</label>
                    <select name="user_id" class="form-control" required>
                        @foreach ($data['users'] as $user)
                            <option value="{{ $user->id }}" style="text-align: center" {{ $subjectExamStudentResult->user_id == $user->id ? 'selected' : '' }}>{{ $user->first_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="subject_exam_id" class="form-control-label">{{ trans('admin.subject_exam') }}</label>
                    <select name="subject_exam_id" class="form-control" required>
                        @foreach ($data['subject_exams'] as $subject_exam)
                            <option value="{{ $subject_exam->id }}" style="text-align: center" {{ $subjectExamStudentResult->subject_exam_id == $subject_exam->id ? 'selected' : '' }}>
                                {{ $subject_exam->subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="student_degree"
                        class="form-control-label">{{ trans('admin.degree') . ' ' . trans('admin.student') }}</label>
                    <input type="number" value="{{ $subjectExamStudentResult->student_degree }}" class="form-control" name="student_degree">
                </div>
                <div class="col-md-6">
                    <label for="exam_degree"
                        class="form-control-label">{{ trans('admin.degree') . ' ' . trans('admin.exam') }}</label>
                    <input type="number" value="{{ $subjectExamStudentResult->exam_degree }}" class="form-control" name="exam_degree">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control" required>
                        <option value="ربيعيه" style="text-align: center" {{ $subjectExamStudentResult->period == 'ربيعيه' ? 'selected' : '' }}>{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center" {{ $subjectExamStudentResult->period == 'خريفيه' ? 'selected' : '' }}>{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="year" class="form-control-label">{{ trans('admin.year') }}</label>
                    <input type="date" value="{{ $subjectExamStudentResult->year }}" name="year" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="date_enter_degree"
                        class="form-control-label">{{ trans('admin.date_enter_degree') }}</label>
                    <input type="date" value="{{ $subjectExamStudentResult->date_enter_degree }}" name="date_enter_degree" class="form-control">
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
