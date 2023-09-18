<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/switches.css') }}">
<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('userBranches.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">

                    <label for="department_id" class="form-control-label">@lang('admin.department')</label>
                    <select class="form-control" name="department_id" required>
                        <option value="" selected >@lang('admin.select')</option>
                        @foreach($departments as $department)
                            <option
                                value="{{ $department->id}}">{{ $department->getTranslation('department_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="department_id" class="form-control-label">@lang('admin.branch')</label>
                    <select class="form-control" name="department_branch_id" required>
                        <option value="" selected disabled>@lang('admin.select')</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="user_id" class="form-control-label">@lang('admin.student_branch')</label>
                    <select class="form-control" name="user_id" required>
                        <option value="" selected disabled>@lang('admin.select')</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id}}">{{ $student->identifier_id }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
                    <input class="" type="text" value="0" hidden name="branch_restart_register"/>
                    <label class="tgl-btn">@lang('admin.branch_restart_register')</label>
                    <input class="tgl tgl-ios" id="cb2" type="checkbox" value="1" name="branch_restart_register"/>
                    <label class="tgl-btn" dir="ltr" for="cb2"></label>
                </div>
                <div class="col-md-6">
                    <label for="register_year" class="form-control-label">@lang('admin.register_year')</label>
                    {{-- <select name="register_year" class="form-control" id="register_year" required>
                        @for($year = 2023; $year < \Carbon\Carbon::now()->year +50 ; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select> --}}
                    <input type="number" class="form-control" name="register_year" id="register_year">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add')}}</button>
        </div>
    </form>
</div>

<script>
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
                        $('select[name="department_branch_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                } else if (data === 404) {
                    $('select[name="department_branch_id"]').empty();
                    $('select[name="department_branch_id"]').append('<option value="">{{ trans('admin.No results') }}</option>');

                }
            }
        });
    })

</script>
