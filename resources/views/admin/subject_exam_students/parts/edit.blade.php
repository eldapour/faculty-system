<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('subject_exam_students.update', $subjectExamStudent->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $subjectExamStudent->id }}" name="id">

        <div class="form-group">


            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="group_id" class="form-label">@lang('admin.group_name')</label>
                    <select class="form-control" name="group_id" id="group_id">
                        <option value="" disabled>{{ trans('admin.select') . ' ' . trans('admin.group') }}</option>
                        @foreach($groups as $group)
                            <option {{ $subjectExamStudent->subject->group_id == $group->id ? 'selected' : '' }}
                                    value="{{ $group->id }}">
                                {{ $group->getTranslation('group_name',lang()) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">@lang('admin.department_name')</label>
                    <select class="form-control" name="department_id">
                        <option value="" >{{ trans('admin.select') . ' ' . trans('admin.department') }}</option>
                        @foreach($departments as $department)
                            <option
                                {{ $subjectExamStudent->subject->department_id == $department->id ? 'selected' : '' }}
                                value="{{ $department->id }}">
                                {{ $department->getTranslation('department_name',lang()) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>




            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="group_id" class="form-label">@lang('admin.department_branch_name')</label>
                    <select class="form-control" name="department_branch_id" id="department_branch_id">
                        <option value="" disabled>
                            {{ trans('admin.select') . ' ' . trans('admin.department') }}</option>
                        <option value="{{ $subjectExamStudent->subject->department_branch_id }}"
                        selected>{{ $subjectExamStudent->subject->department_branch->getTranslation('branch_name',app()->getLocale()) }}</option>
                    </select>
                </div>


                <div class="col-md-6">
                    <label for="department_id" class="form-label">@lang('admin.select') @lang('admin.subject')</label>
                    <select class="form-control" name="subject_id">
                        <option value="">{{ trans('admin.select') . ' ' . trans('admin.subject') }}</option>
                        @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $subjectExamStudent->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->getTranslation('subject_name',app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>

            </div>


            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="department_id" class="form-label">@lang('admin.select') @lang('admin.student')</label>
                    <select class="form-control" name="user_id" id="user_id">
                        <option value="">{{ trans('admin.select') . ' ' . trans('admin.subject') }}</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $subjectExamStudent->user_id == $user->id ? 'selected' : '' }}>{{ $user->identifier_id }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-6">
                    <label for="exam_code" class="form-control-label">{{ trans('admin.exam_code') }}</label>
                    <input type="text" value="{{ $subjectExamStudent->exam_code }}" class="form-control" name="exam_code" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="section" class="form-control-label">{{ trans('admin.section')  }}</label>
                    <input type="text" value="{{ $subjectExamStudent->section }}" class="form-control" name="section" required>
                </div>
                <div class="col-md-4">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control" required>
                        <option value="ربيعيه" style="text-align: center" {{ $subjectExamStudent->period == 'ربيعيه' ? 'selected' : '' }}>{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center" {{ $subjectExamStudent->period == 'خريفيه' ? 'selected' : '' }}>{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="period" class="form-control-label">{{ trans('admin.session') }}</label>
                    <select name="session" class="form-control" required>
                        <option value="عاديه" style="text-align: center" {{ $subjectExamStudent->period == 'عاديه' ? 'selected' : '' }}>{{ trans('admin.normal') }}</option>
                        <option value="استدراكيه" style="text-align: center" {{ $subjectExamStudent->period == 'استدراكيه' ? 'selected' : '' }}>{{ trans('admin.remedial') }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="year" class="form-control-label">{{ trans('admin.year') }}</label>

                    <input type="number" class="form-control" name="year" id="year">

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
    $('.dropify').dropify();

    $('select').select2();

    // get subject
    $('select[name="group_id"]').on('change', function() {
        localStorage.setItem('group_id', $(this).val());

        $.ajax({
            method: 'GET',
            url: '{{ route('getSubject') }}',
            data : {
                'id' : $(this).val(),
            },
            success: function(data) {
                if(data !== 404){
                    $('select[name="subject_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="subject_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                } else if(data === 404){
                    $('select[name="subject_id"]').empty();
                    $('select[name="subject_id"]').append('<option value="">{{ trans('admin.No results') }}</option>');

                }
            }
        });

    })

    // get department branch
    $('select[name="department_id"]').on('change', function() {
        localStorage.setItem('department_id', $(this).val());
        $.ajax({
            method: 'GET',
            url: '{{ route('getBranches') }}',
            data : {
                'id' : $(this).val(),
            },
            success: function(data) {
                if(data !== 404){
                    $('select[name="department_branch_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="department_branch_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                } else if(data === 404){
                    $('select[name="department_branch_id"]').empty();
                    $('select[name="department_branch_id"]').append('<option value="">{{ trans('admin.No results') }}</option>');

                }
            }
        });
    })

    $('select[name="subject_id"]').on('change', function() {
        localStorage.setItem('subject_id', $(this).val());
        console.log($(this).val());

        $.ajax({
            method: 'GET',
            url: '{{ route('getStudent') }}',
            data : {
                'group_id' : localStorage.getItem('group_id'),
                'subject_id' : $(this).val(),
            },
            success: function(data) {
                if(data !== 404){
                    $('select[name="user_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="user_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                } else if(data === 404){
                    $('select[name="user_id"]').empty();
                    $('select[name="user_id"]').append('<option value="">{{ trans('admin.No results') }}</option>');

                }
            }
        });
    })
</script>
