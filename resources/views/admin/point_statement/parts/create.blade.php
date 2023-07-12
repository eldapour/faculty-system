<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('subject_exam_student_result.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="subject_id" class="form-control-label">{{ trans('admin.student') }}</label>
                    <select name="user_id" class="form-control" required>
                        @foreach ($data['users'] as $user)
                            <option value="{{ $user->id }}" style="text-align: center">{{ $user->identifier_id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="subject_id" value="{{$idOfSubjectDoctor}}" class="form-control">

            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="student_degree"
                        class="form-control-label">{{ trans('admin.degree') . ' ' . trans('admin.student') }}</label>
                    <input type="number" class="form-control" name="student_degree">
                </div>
                <div class="col-md-6">
                    <label for="exam_degree"
                        class="form-control-label">{{ trans('admin.degree') . ' ' . trans('admin.exam') }}</label>
                    <input type="number" class="form-control" name="exam_degree">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.session') }}</label>
                    <select name="session" class="form-control">
                        <option value="عاديه" style="text-align: center">{{ trans('admin.normal') }}</option>
                        <option value="استدراكيه" style="text-align: center">{{ trans('admin.remedial') }}</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="year" class="form-control-label">{{ trans('admin.year') }}</label>
                    <input type="text" name="year" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="date_enter_degree"
                        class="form-control-label">{{ trans('admin.date_enter_degree') }}</label>
                    <input type="date" name="date_enter_degree" class="form-control">
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
    $('.dropify').dropify();
    $(document).ready(function() {
        $('select').select2();
    });
</script>
