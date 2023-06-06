<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('process_degrees.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="subject_id" class="form-control-label">{{ trans('admin.subject') }}</label>
                    <select name="subject_id" class="form-control">
                        @foreach ($data['subjects'] as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="department_branch_id" class="form-control-label">@lang('admin.doctor')</label>
                    <select class="form-control" name="doctor_id" required>
                        <option value="" selected disabled style="text-align: center">@lang('admin.select')</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="user_id" class="form-control-label">{{ trans('admin.student') }}</label>
                    <input type="text" class="form-control" readonly name="user_id" value="{{ auth()->user()->first_name }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="year">{{ trans('admin.year') }}</label>
                        <input type="date" class="form-control" name="year">
                </div>
                <div class="col-md-4">
                    <label for="section" class="form-control-label">{{ trans('admin.section') }}</label>
                        <input type="text" class="form-control" name="section">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="exam_code" class="form-control-label">{{ trans('admin.exam_code') }}</label>
                    <input type="number" class="form-control" name="exam_code">
                </div>
                <div class="col-md-4">
                    <label for="student_degree_before_request" class="form-control-label">{{ trans('admin.student_degree_before_request') }}</label>
                    <input type="number" class="form-control" name="student_degree_before_request">
                </div>
                <div class="col-md-4">
                    <label for="student_degree_after_request" class="form-control-label">{{ trans('admin.student_degree_after_request') }}</label>
                    <input type="number" class="form-control" name="student_degree_after_request">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="request_type" class="form-control-label">{{ trans('admin.request_type') }}</label>
                    <select name="request_type" class="form-control">
                        <option value="غائب" style="text-align: center">{{ trans('admin.absent') }}</option>
                        <option value="مراجعه الورقه" style="text-align: center">{{ trans('admin.paper_review') }}</option>
                        <option value="طلب جبر" style="text-align: center">{{ trans('admin.reparation_request') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="processing_date" class="form-control-label">{{ trans('admin.processing_date') }}</label>
                    <input type="date" class="form-control" name="processing_date">
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
    CKEDITOR.replaceAll();

    $(document).ready(function() {
        $('select').select2();
    });

    $('select[name="subject_id"]').on('change', function() {
        localStorage.setItem('subject_id', $(this).val());
        $.ajax({
            method: 'GET',
            url: '{{ route('getDoctor') }}',
            data: {
                'id': $(this).val(),
            },
            success: function(data) {
                if (data !== 404) {
                    $('select[name="doctor_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="doctor_id"]').append(
                            '<option style="text-align: center" value="' + key + '">' +
                            value + '</option>');
                    });
                } else if (data === 404) {
                    $('select[name="doctor_id"]').empty();
                    $('select[name="doctor_id"]').append(
                        '<option style="text-align: center" value="">{{ trans('admin.No results') }}</option>'
                        );

                }
            }
        });
    })

</script>
