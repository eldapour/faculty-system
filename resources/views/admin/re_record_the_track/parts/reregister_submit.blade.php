<div class="modal-body">
    <form id="reregisterForm" method="POST" action="{{ route('reregisterFormStore') }}">
        @csrf
        <div class="form-group">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('admin.unit')</th>
                        <th>@lang('admin.group')</th>
                        <th>@lang('admin.subjects')</th>
                        <th>@lang('admin.doctor')</th>
                    </tr>
                    </thead>
                    @foreach($subjectStudent as $index => $data)
                        <tbody>
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $data->unit }}</td>
                            <td>{{ $data->group }}</td>
                            <td>{{ $data->subject }}</td>
                            <td>{{ $data->user }}</td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"
                    id="reregisterBtn">{{ trans('admin.re_record_the_track') }}</button>
        </div>
    </form>
</div>

<script>
    $(document).on('submit', 'Form#reregisterForm', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#reregisterForm').attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#reregisterBtn').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                    ' ></span> <span style="margin-left: 4px;">{{ trans('admin.wait') }} ..</span>').attr(
                    'disabled', true);
            },
            success: function (data) {
                if (data.status == 200) {
                    toastr.success(' {{ trans('admin.re_record_the_track') }} ');
                    setTimeout(function() {
                       window.location.href = '{{ route('admin.home') }}';
                    },2000);
                } else if (data.status == 405) {
                    toastr.error(data.mymessage);
                } else
                    toastr.error(' {{ trans('admin.something_went_wrong') }} ..');
                $('#reregisterBtn').html(`{{ trans('admin.re_record_the_track') }}`).attr('disabled', false);
                $('#reregisterForm').modal('hide')
            },
            error: function (data) {
                if (data.status === 500) {
                    toastr.error(' {{ trans('admin.something_went_wrong') }} ..');
                } else if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value, '{{ trans('admin.wrong') }}');
                            });
                        }
                    });
                } else
                    toastr.error('{{ trans('admin.something_went_wrong') }} ..');
                $('#reregisterBtn').html(`{{ trans('admin.re_record_the_track') }}`).attr('disabled', false);
            }, //end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
