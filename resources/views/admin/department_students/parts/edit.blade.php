<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST"
          action="{{ route('departmentStudents.update', $departmentStudent->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$departmentStudent->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">

                    <label for="department_id" class="form-control-label">@lang('admin.department')</label>
                    <select class="form-control" name="department_id" required>
                        <option value="" disabled>@lang('admin.select')</option>
                        @foreach($departments as $department)
                            <option {{ $departmentStudent->department_id == $department->id ? 'selected' : '' }}
                                    value="{{ $department->id}}">
                                {{ $department->getTranslation('department_name', app()->getLocale()) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="department_id" class="form-control-label">@lang('admin.period')</label>
                    <select class="form-control" name="period" required>
                        <option value="" disabled>@lang('admin.select')</option>
                        <option
                            {{$departmentStudent->period == 'ربيعيه' ? 'selected' : ''}} value="ربيعيه">@lang('admin.autumnal')</option>
                        <option
                            {{$departmentStudent->period == 'خريفيه' ? 'selected' : ''}} value="خريفيه">@lang('admin.fall')</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="user_id" class="form-control-label">@lang('admin.student_branch')</label>
                    <select class="form-control" name="user_id" required>
                        <option value="" selected disabled>@lang('admin.select')</option>
                        @foreach($students as $student)
                            <option {{ $departmentStudent->user_id == $student->id ? 'selected' : '' }}
                                    value="{{ $student->id}}">
                                {{ $student->identifier_id }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
                    <input class="" type="text" value="0" hidden name="confirm_request"/>
                    <label class="tgl-btn">@lang('admin.department_restart_register')</label>
                    <input class="tgl tgl-ios" id="cb2"
                           {{ $departmentStudent->confirm_request == 1 ? 'selected' : '' }}
                           type="checkbox" value="1" name="confirm_request"/>
                    <label class="tgl-btn" dir="ltr" for="cb2"></label>
                </div>
                <div class="col-md-6">
                    <label for="register_year" class="form-control-label">@lang('admin.register_year')</label>
                    <input type="text" class="form-control" value="{{ $departmentStudent->year }}" name="year" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.close')</button>
            <button type="submit" class="btn btn-success" id="updateButton">@lang('admin.update')</button>
        </div>
    </form>
</div>
<script>


    $(document).ready(function () {
        $('select').select2();
    });
</script>
