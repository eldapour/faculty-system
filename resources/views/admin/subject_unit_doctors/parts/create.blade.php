<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('subject_unit_doctor.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="user_id" class="form-control-label">{{ trans('admin.doctor') }}</label>
                    <select name="user_id" class="form-control">
                        @foreach ($data['users'] as $user)
                        <option value="{{ $user->id }}" style="text-align: center">{{ $user->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="group_id" class="form-control-label subject_id">{{ trans('admin.group') }}</label>
                    <select name="group_id" class="form-control">
                        @foreach ($data['groups'] as $group)
                        <option value="{{ $group->id }}" style="text-align: center">{{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="unit_id" class="form-control-label subject_id">{{ trans('admin.unit') }}</label>
                    <select name="unit_id" class="form-control">
                        @foreach ($data['units'] as $unit)
                        <option value="{{ $unit->id }}" style="text-align: center">{{ $unit->unit_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="subject_id" class="form-control-label">{{ trans('admin.subject') }}</label>
                    <select class="form-control" name="subject_id" required>
                        <option style="text-align: center" value="" selected disabled>@lang('admin.select')</option>
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
                    <label for="title" class="form-control-label">{{ trans('admin.year')  }}</label>
                    <input type="date" class="form-control" name="year">
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


    $('select[name="unit_id"]').on('change', function() {
        localStorage.setItem('unit_id', $(this).val());
        $.ajax({
            method: 'GET',
            url: '{{ route('getUnit') }}',
            data : {
                'id' : $(this).val(),
            },
            success: function(data) {
                if(data !== 404){
                    $('select[name="subject_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="subject_id"]').append('<option style="text-align: center" value="' + key + '">' + value + '</option>');
                    });
                } else if(data === 404){
                    $('select[name="subject_id"]').empty();
                    $('select[name="subject_id"]').append('<option style="text-align: center" value="">{{ trans('admin.No results') }}</option>');

                }
            }
        });
    })
</script>
