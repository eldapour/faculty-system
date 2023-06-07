<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('subject_exams.update', $subjectExam->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $subjectExam->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="group_id" class="form-control-label">@lang('admin.year')</label>
                    <input type="date" value="{{ $subjectExam->year }}" class="form-control" name="year">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="group_id" class="form-control-label">@lang('admin.group_name')</label>
                    <select class="form-control" name="group_id" required>
                        <option style="text-align: center" value="" selected disabled>@lang('admin.select')</option>
                        @foreach ($groups as $group)
                            <option style="text-align: center" value="{{ $group->id }}" {{ $subjectExam->group_id == $group->id ? 'selected' : '' }}>
                                {{ $group->getTranslation('group_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="department_id" class="form-control-label">@lang('admin.department')</label>
                    <select class="form-control" name="department_id" required>
                        <option style="text-align: center" value="" selected disabled>@lang('admin.select')</option>
                        @foreach ($departments as $department)
                            <option style="text-align: center" value="{{ $department->id }}" {{ $subjectExam->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->getTranslation('department_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="department_branch_id" class="form-control-label">@lang('admin.branch')</label>
                    <select class="form-control" name="department_branch_id" required>
                        <option value="" selected disabled>@lang('admin.select')</option>
                        <option value="{{ $branches->id }}" {{ $subjectExam->department_branch_id == $branches->id ? 'selected' : '' }}>{{ $branches->branch_name}}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="subject_id" class="form-control-label">@lang('admin.subject')</label>
                    <select class="form-control" name="subject_id" required>
                        <option value="" selected disabled>@lang('admin.select')</option>
                        <option value="{{ $subjects->id }}" {{ $subjectExam->subject_id == $subjects->id ? 'selected' : '' }}>{{ $subjects->subject_name }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.exam_date') }}</label>
                    <input type="date" value="{{ $subjectExam->exam_date }}" class="form-control" name="exam_date">
                </div>
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.exam_day') }}</label>
                    <input type="date" value="{{ $subjectExam->exam_day }}" class="form-control" name="exam_day">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center" {{ $subjectExam->period == 'ربيعيه' ? 'selected' : '' }}>{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center" {{ $subjectExam->period == 'خريفيه' ? 'selected' : '' }}>{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.session') }}</label>
                    <select name="session" class="form-control">
                        <option value="عاديه" style="text-align: center" {{ $subjectExam->period == 'عاديه' ? 'selected' : '' }}>{{ trans('admin.normal') }}</option>
                        <option value="استدراكيه" style="text-align: center" {{ $subjectExam->period == 'عاديه' ? 'selected' : '' }}>{{ trans('admin.catch_up') }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="time_start" class="form-control-label">{{ trans('admin.time_start') }}</label>
                    <input type="time" value="{{ $subjectExam->time_start }}" class="form-control" name="time_start">
                </div>
                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.time_end') }}</label>
                    <input type="time" value="{{ $subjectExam->time_end }}"class="form-control" name="time_end">
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


    $('select[name="department_id"]').on('change', function() {
        localStorage.setItem('department_id', $(this).val());
        $.ajax({
            method: 'GET',
            url: '{{ route('getBranches') }}',
            data: {
                'id': $(this).val(),
            },
            success: function(data) {
                if (data !== 404) {
                    $('select[name="department_branch_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="department_branch_id"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });
                } else if (data === 404) {
                    $('select[name="department_branch_id"]').empty();
                    $('select[name="department_branch_id"]').append(
                        '<option value="">{{ trans('admin.No results') }}</option>');

                }
            }
        });
    })
    $('select[name="department_id"], select[name="group_id"]').on('change', function() {
        localStorage.setItem('department_id', $('select[name="department_id"]').val());
        localStorage.setItem('group_id', $('select[name="group_id"]').val());
        $.ajax({
            method: 'GET',
            url: '{{ route('getSubject') }}',
            data: {
                'department_id': $('select[name="department_id"]').val(),
                'group_id': $('select[name="group_id"]').val(),
            },
            success: function(data) {
                if (data !== 404) {
                    $('select[name="subject_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="subject_id"]').append('<option value="' + key +
                            '">' + value + '</option>');
                    });
                } else if (data === 404) {
                    $('select[name="subject_id"]').empty();
                    $('select[name="subject_id"]').append(
                        '<option value="">{{ trans('admin.No results') }}</option>');

                }
            }
        });
    });
</script>
