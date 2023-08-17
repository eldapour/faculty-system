<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST"
        action="{{ route('subject_unit_doctor.update', $subjectUnitDoctor->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $subjectUnitDoctor->id }}" name="id">
        <div class="form-group">
            <div class="row">


                {{--اختار الفوج--}}
                <div class="col-md-6">
                    <label for="group_id" class="form-control-label subject_id">{{ trans('admin.group') }}</label>
                    <select name="group_id" class="form-control" id="group_id">
                        @foreach ($data['groups'] as $group)
                            <option value="{{ $group->id }}" style="text-align: center">{{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>


                {{--المسلك--}}
                <div class="col-md-6">
                    <label for="subject_name" class="form-control-label">{{ trans('admin.department') }} </label>
                    <select name="department_id" style="text-align: center" id=""
                            class="form-control department_id">
                        @foreach ($data['departments'] as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>


                {{--المسار--}}
                <div class="col-md-6">
                    <label for="department_branch_id" class="form-control-label">@lang('admin.branch')</label>
                    <select class="form-control" name="department_branch_id" id="department_branch_id">
                        <option value="" selected disabled style="text-align: center">@lang('admin.select')</option>
                    </select>
                </div>


                {{--الفصل الدراسي--}}
                <div class="col-md-6">
                    <label for="unit_id" class="form-control-label">{{ trans('admin.unit_name') }}</label>
                    <select class="form-control" name="unit_id" id="unit_id">
                        @foreach ($data['units'] as $unit)
                            <option value="{{ $unit->id }}" style="text-align: center">{{ $unit->unit_name }}</option>

                        @endforeach
                    </select>
                </div>


                {{--اختار الوحده للاستاذ--}}
                <div class="col-md-6">
                    <label for="subject_id" class="form-control-label subject_id">{{ trans('admin.subject') }}</label>
                    <select name="subject_id" class="form-control" id="subject_id">

                    </select>
                </div>


                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>



                <div class="col-md-6">
                    <label for="title" class="form-control-label">{{ trans('admin.year')  }}</label>
                    <select name="year" class="form-control" id="year">
                        @for($year = 2023; $year < \Carbon\Carbon::now()->year +50 ; $year++)
                            <option @selected(old('year') == $subjectUnitDoctor->year) value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>


                <div class="col-md-6">
                    <label for="user_id" class="form-control-label">{{ trans('admin.doctor') }}</label>
                    <select name="user_id" class="form-control">
                        @foreach ($data['users'] as $user)
                            <option value="{{ $user->id }}" style="text-align: center">{{ $user->first_name }}</option>
                        @endforeach
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
    $('.dropify').dropify();
    $(document).ready(function() {
        $('select').select2();
    });

</script>


<script>
    $('.dropify').dropify()

    $(document).ready(function () {
        $('select[name="unit_id"]').on('change', function () {

            let unit_id = $("#unit_id").val();
            let group_id = $("#group_id").val();
            let department_branch_id = $("#department_branch_id").val();

            if (unit_id) {
                $.ajax({
                    url: '{{ route('dashboard.getAllSubjectsOfUnitId') }}',
                    type: "GET",
                    data : {
                        'unit_id' : unit_id,
                        'department_branch_id' : department_branch_id,
                        'group_id' : group_id
                    },
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




{{-- get all department branches of department--}}
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
