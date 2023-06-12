<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('subject.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.arabic') }} </label>
                    <input type="text" class="form-control" name="subject_name[ar]">
                </div>
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.english') }} </label>
                    <input type="text" class="form-control" name="subject_name[en]">
                </div>
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.france') }} </label>
                    <input type="text" class="form-control" name="subject_name[fr]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="subject_name" class="form-control-label">{{ trans('admin.group') }} </label>
                    <select name="group_id" style="text-align: center" id="" class="form-control">
                        @foreach ($data['groups'] as $group)
                            <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="subject_name" class="form-control-label">{{ trans('admin.department') }} </label>
                    <select name="department_id" style="text-align: center" id=""
                        class="form-control department_id">
                        @foreach ($data['departments'] as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="department_branch_id" class="form-control-label">@lang('admin.branch')</label>
                    <select class="form-control" name="department_branch_id" required>
                        <option value="" selected disabled style="text-align: center">@lang('admin.select')</option>
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
