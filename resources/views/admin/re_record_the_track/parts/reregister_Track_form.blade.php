<div class="modal-body">
    <form id="reregisterForm" method="POST" action="{{ route('reregisterTrack') }}">
        @csrf
        <div class="form-group">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <div class="row">
                <div class="col-12">
                    <h4>{{ trans('admin.department') .' : ' . $department->department->department_name }}</h4>
                </div>
                <div class="col-12">

                </div>
            </div>
        </div>
                <div class="form-group">

                        <table class="table table-bordered">
                            <thead>
                            <tr class="badge-primary">
                                <th class="text-white">#</th>
                                <th class="text-white">@lang('admin.subject')</th>
                                <th class="text-white">@lang('admin.doctor')</th>
                            </tr>
                            </thead>
                            @foreach($subjects as $index => $data)
                                <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->getTranslation('subject_name', app()->getLocale()) }}</td>

                                    <td>{{ @$data->doctor->doctor->first_name .' '. @$data->doctor->doctor->last_name }}</td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"
                    id="reregisterBtn">{{ trans('admin.confirm') }}</button>
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
                if (data.status === 200) {
                    toastr.success(' {{ trans('admin.confirm_the_track') }} ');
                    setTimeout(function() {
                        window.location.href = '{{ route('admin.home') }}';
                    },500);
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
