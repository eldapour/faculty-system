<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('subject_exams.update', $subjectExam->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $subjectExam->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.exam_date')  }}</label>
                    <input type="date" class="form-control" value="{{ $subjectExam->exam_date }}" name="exam_date">
                </div>
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.exam_day')  }}</label>
                    <input type="date" class="form-control" value="{{ $subjectExam->exam_day }}" name="exam_day">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="subject_id" class="form-control-label">{{ trans('admin.subject') }}</label>
                    <select name="subject_id" class="form-control">
                        @foreach ($data['subjects'] as $subject)
                        <option value="{{ $subject->id }}" style="text-align: center" {{ $subjectExam->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="group_id" class="form-control-label">{{ trans('admin.group') }}</label>
                    <select name="group_id" class="form-control">
                        @foreach ($data['groups'] as $group)
                        <option value="{{ $group->id }}" style="text-align: center" {{ $subjectExam->group_id == $group->id ? 'selected' : '' }}>{{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                            <option value="ربيعيه" style="text-align: center" {{ $subjectExam->period == 'ربيعيه' ? 'selected' : '' }}>{{ trans('admin.autumnal') }}</option>
                            <option value="خريفيه" style="text-align: center"{{ $subjectExam->period == 'خريفيه' ? 'selected' : '' }}>{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="session" class="form-control-label">{{ trans('admin.session') }}</label>
                    <select name="session" class="form-control">
                            <option value="عاديه" style="text-align: center" {{ $subjectExam->session == 'عاديه' ? 'selected' : '' }}>{{ trans('admin.normal') }}</option>
                            <option value="استدراكيه" style="text-align: center" {{ $subjectExam->session == 'استدراكيه' ? 'selected' : '' }}>استدراكي</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                        <label for="time_start" class="form-control-label">{{ trans('admin.time_start')  }}</label>
                        <input type="time" class="form-control" value="{{ $subjectExam->time_start }}" name="time_start">
                </div>
                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.time_end') }}</label>
                    <input type="time" class="form-control" value="{{ $subjectExam->time_end }}" name="time_end">
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
