<link href="{{asset('assets/admin/plugins/select2/select2.min.css')}}" rel="stylesheet"/>

<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('subject_exam_students.store') }}"
          enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">


                {{--جميع الافواج او الفرق الدراسيه--}}
                <div class="col-md-6">
                    <label for="user_id" class="form-control-label">{{ trans('admin.group_choice') }}</label>
                    <select class="form-control" name="group_id" id="group_id">
                        <option value="" selected disabled>@lang('admin.select')</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id}}">{{ $group->getTranslation('group_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>


                {{--المسلك--}}
                <div class="col-md-6">
                    <label for="subject_name" class="form-control-label">{{ trans('admin.department') }} </label>
                    <select name="department_id" style="text-align: center" id=""
                            class="form-control department_id">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>


                {{--المسار--}}
                <div class="col-md-6">
                    <label for="department_branch_id" class="form-control-label">@lang('admin.branch')</label>
                    <select id="department_branch_id" class="form-control" name="department_branch_id">
                        <option value="" selected disabled style="text-align: center">@lang('admin.select')</option>
                    </select>
                </div>
                <br>


                {{--الفصول الدراسيه--}}
                <div class="col-md-6">
                    <label for="subject_name" class="form-control-label">{{ trans('admin.unit_name') }} </label>
                    <select name="unit_id" style="text-align: center" id="unit_id" class="form-control">
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>


                {{--الوحدات او المواد--}}
                <div class="col-md-12">
                    <label for="department_id" class="form-label">@lang('admin.select') @lang('admin.subject')</label>
                    <select class="form-control" name="subject_id" id="subject_id">
                        <option value="">{{ trans('admin.select') . ' ' . trans('admin.subject') }}</option>
                    </select>
                </div>



                <div class="checkbox-append col-md-12">
                    <div class="form-check col-md-12 mt-3 mb-3">

                    </div>
                </div>


                {{--رقم الامتحان--}}
                <div class="col-md-6">
                    <label for="exam_code" class="form-control-label">{{ trans('admin.exam_code') }}</label>
                    <input type="text" class="form-control" name="exam_code">
                </div>


                {{--قاعه الامتحان اللي الطلبه هتوزعوا عليها في الامتحان--}}
                <div class="col-6">
                    <label for="section" class="form-control-label">{{ trans('admin.section')  }}</label>
                    <input type="text" class="form-control" name="section">
                </div>


                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control" required>
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>


                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.session') }}</label>
                    <select name="session_id" class="form-control" id="session_id">
                        <option value="عاديه" style="text-align: center">{{ trans('admin.normal') }}</option>
                        <option value="استدراكيه" style="text-align: center">{{ trans('admin.remedial') }}</option>
                    </select>
                </div>


                <div class="col-md-12">
                    <label for="year" class="form-control-label">{{ trans('admin.year') }}</label>
                    <select name="year" class="form-control" required>
                        @for($year = 2023; $year < \Carbon\Carbon::now()->year +50 ; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
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


<script src="{{asset('assets/admin/js/select2.js')}}"></script>
<script src="{{asset('assets/admin/plugins/select2/select2.full.min.js')}}"></script>


<script>
    $('.dropify').dropify();
    $(document).ready(function () {
        $('select').select2();
    });

    $('select[name="department_id"]').on('change', function () {
        localStorage.setItem('department_id', $(this).val());
        $.ajax({
            method: 'GET',
            url: '{{ route('getBranches') }}',
            data: {
                'id': $(this).val(),
            },
            success: function (data) {
                if (data !== 404) {
                    $('select[name="department_branch_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="department_branch_id"]').append(
                            '<option style="text-align: center" value="' + key + '">' +
                            value + '</option>');
                    });
                } else if (data === 404) {
                    $('select[name="department_branch_id"]').empty();
                    $('select[name="department_branch_id"]').append(
                        '<option style="text-align: center" value="">{{ trans('admin.No results') }}</option>'
                    );

                }
            }
        });
    })
</script>


{{--start get subjects with group_id and department_branch_id and unit_id --}}
<script>
    $(document).ready(function () {
        $('select[name="unit_id"]').on('change', function () {

            let group_id = $("#group_id").val();
            let department_branch_id = $("#department_branch_id").val();
            let unit_id = $("#unit_id").val();

            if (unit_id) {
                $.ajax({
                    url: "{{ URL::to('allSubjectsByFilterData') }}",
                    data: {
                        "group_id": group_id,
                        "department_branch_id": department_branch_id,
                        "unit_id": unit_id,
                    },
                    type: "GET",
                    dataType: "json",
                    success: function (data) {

                        $('select[name="subject_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="subject_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


{{--get all users by subject_id --}}
<script>
    $(document).ready(function () {
        $('select[name="subject_id"]').on('change', function () {

            let subject_id = $("#subject_id").val();


            if (subject_id) {
                $.ajax({
                    url: "{{ URL::to('allStudentsBySubjectId') }}",
                    data: {
                        "subject_id": subject_id,
                    },
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (key, value) {
                            $('.checkbox-append').append('<div class="form-check col-md-12 mt-3 mb-3"><input type="checkbox" name="user_id[]" value="'+ key +'" class="form-check-input" id="user_id[]"><label class="form-check-label mr-5" for="user_id">'+ value +'</label></div>')
                        })
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

    /*
     let array = [];
    $("input:checkbox[name=user_id]:checked").each(function(){
        array.push($(this).val());
    });
     */
</script>