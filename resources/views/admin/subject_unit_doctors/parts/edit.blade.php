<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST"
        action="{{ route('subject_unit_doctor.update', $subjectUnitDoctor->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $subjectUnitDoctor->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.year') }}</label>
                    <input type="date" class="form-control" value="{{ $subjectUnitDoctor->year }}" name="year">
                </div>
                <div class="col-md-6">
                    <label for="user_id" class="form-control-label">{{ trans('admin.student') }}</label>
                    <select name="user_id" class="form-control">
                        @foreach ($data['users'] as $user)
                            <option value="{{ $user->id }}" style="text-align: center"
                                {{ $subjectUnitDoctor->user_id == $user->id ? 'selected' : '' }}>{{ $user->first_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="unit_id" class="form-control-label">{{ trans('admin.unit') }}</label>
                    <select name="unit_id" class="form-control">
                        @foreach ($data['units'] as $unit)
                            <option value="{{ $unit->id }}" style="text-align: center"
                                {{ $subjectUnitDoctor->unit_id == $unit->id ? 'selected' : '' }}>
                                {{ $unit->unit_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="subject_id" class="form-control-label">{{ trans('admin.subject') }}</label>
                    <select name="subject_id" class="form-control">
                        @foreach ($data['subjects'] as $subject)
                            <option value="{{ $subject->id }}" style="text-align: center"
                                {{ $subjectUnitDoctor->subject_id == $subject->id ? 'selected' : '' }}>
                                {{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="group_id" class="form-control-label">{{ trans('admin.category') }}</label>
                    <select name="group_id" class="form-control">
                        @foreach ($data['groups'] as $group)
                            <option value="{{ $group->id }}" style="text-align: center" {{ $subjectUnitDoctor->group_id == $group->id ? "selected" : '' }}>
                                {{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center" {{ $subjectUnitDoctor->period == 'ربيعيه' ? "selected" : '' }}>{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center" {{ $subjectUnitDoctor->period == 'خريفيه' ? "selected" : '' }}>{{ trans('admin.fall') }}</option>
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
