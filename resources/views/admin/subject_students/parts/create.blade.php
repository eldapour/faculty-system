<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('subject_student.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="title" class="form-control-label">{{ trans('admin.year')  }}</label>
                    <input type="date" class="form-control" name="year">
                </div>
            </div>
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
                    <label for="subject_id" class="form-control-label">{{ trans('admin.subject') }}</label>
                    <select name="subject_id" class="form-control">
                        @foreach ($data['subjects'] as $subject)
                        <option value="{{ $subject->id }}" style="text-align: center">{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="group_id" class="form-control-label">{{ trans('admin.category') }}</label>
                    <select name="group_id" class="form-control">
                        @foreach ($data['groups'] as $group)
                            <option value="{{ $group->id }}" style="text-align: center">
                                {{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                            <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                            <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
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
