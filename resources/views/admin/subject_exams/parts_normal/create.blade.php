<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('subject_exams.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="group_id" class="form-control-label">@lang('admin.year')</label>

                    <input type="number" class="form-control" name="year" id="year">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="group_id" class="form-control-label">@lang('admin.group_name')</label>
                    <select class="form-control" name="group_id" id="group_id">
                        <option style="text-align: center" value="" selected disabled>@lang('admin.select')</option>
                        @foreach ($groups as $group)
                            <option style="text-align: center" value="{{ $group->id }}">
                                {{ $group->getTranslation('group_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="department_id" class="form-control-label">@lang('admin.department')</label>
                    <select class="form-control" name="department_id" required>
                        <option style="text-align: center" value="" selected >@lang('admin.select')</option>
                        @foreach ($departments as $department)
                            <option style="text-align: center" value="{{ $department->id }}">
                                {{ $department->getTranslation('department_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="department_branch_id" class="form-control-label">@lang('admin.branch')</label>
                    <select class="form-control" name="department_branch_id" id="department_branch_id">
                        <option value="" selected disabled>@lang('admin.select')</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="subject_id" class="form-control-label">@lang('admin.subject')</label>
                    <select class="form-control" name="subject_id" id="subject_id">
                        <option value="" selected disabled>@lang('admin.select')</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.exam_date') }}</label>
                    <input type="date" class="form-control" name="exam_date">
                </div>

                @php

                $days = ["الاثنين","الثلاثاء","الاربعاء","الخميس","الجمعة","السبت","الاحد"];
                @endphp
                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.exam_day') }}</label>

                    <select name="exam_day" class="form-control">
                        @foreach($days as $day)
                            <option value="{{$day}}" style="text-align: center">{{ $day }}</option>
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
                        <option value="استدراكيه" style="text-align: center">{{ trans('admin.remedial') }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="time_start" class="form-control-label">{{ trans('admin.time_start') }}</label>
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
    $('.dropify').dropify();
    $(document).ready(function() {
        $('select').select2();
    });

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
                    $('select[name="department_branch_id"]').append('  <option value="" selected >@lang('admin.select')</option>')
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



    $('select[name="department_branch_id"], select[name="group_id"]').on('change', function() {

        $.ajax({
            method: 'GET',
            url: '{{ route('getAllSubjectOfDepartmentBranchById') }}',
            data: {
                'department_branch_id': $("#department_branch_id").val(),
                'group_id': $("#group_id").val(),
            },
            success: function(data) {
                if (data) {
                    $('select[name="subject_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="subject_id"]').append('<option value="' + key +
                            '">' + value + '</option>');
                    });
                }
            }
        });
    });

</script>
