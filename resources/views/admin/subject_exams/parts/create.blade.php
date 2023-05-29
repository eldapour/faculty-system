<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('subject_exams.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.exam_date')  }}</label>
                    <input type="date" class="form-control" name="exam_date">
                </div>
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.exam_day')  }}</label>
                    <input type="date" class="form-control" name="exam_day">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="subject_id" class="form-control-label">{{ trans('admin.subject') }}</label>
                    <select name="subject_id" class="form-control">
                        @foreach ($data['subjects'] as $subject)
                        <option value="{{ $subject->id }}" style="text-align: center">{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="group_id" class="form-control-label">{{ trans('admin.group') }}</label>
                    <select name="group_id" class="form-control">
                        @foreach ($data['groups'] as $group)
                        <option value="{{ $group->id }}" style="text-align: center">{{ $group->group_name }}</option>
                        @endforeach
                    </select>
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
                    <label for="period" class="form-control-label">{{ trans('admin.session') }}</label>
                    <select name="session" class="form-control">
                            <option value="عاديه" style="text-align: center">{{ trans('admin.normal') }}</option>
                            <option value="استدراكيه" style="text-align: center">استدراكي</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                        <label for="time_start" class="form-control-label">{{ trans('admin.time_start')  }}</label>
                        <input type="time" class="form-control" name="time_start">
                </div>
                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.time_end') }}</label>
                    <input type="time" class="form-control" name="time_end">
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
    $('.dropify').dropify()
</script>
