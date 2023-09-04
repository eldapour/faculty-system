<link href="{{asset('assets/admin/plugins/select2/select2.min.css')}}" rel="stylesheet"/>

<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('subject_student.store') }}"
        enctype="multipart/form-data">
        @csrf

            <div class="row">


                <div class="col-md-12">
                    <label for="title" class="form-control-label">{{ trans('admin.register_year')  }}</label>
                    <input  type="number" min="1900" class="form-control" id="year" name="year">
                </div><br>


                <div class="col-md-6">
                    <label for="group_id" class="form-control-label">{{ trans('admin.group_choice') }}</label>
                    <select  id="group_id" name="group_id" class="form-control">
                        <option value="" selected>{{ trans('admin.select') }}</option>
                        @foreach ($data['groups'] as $group)
                            <option value="{{ $group->id }}" style="text-align: center">
                                {{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div><br>

                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="" selected>{{ trans('admin.select') }}</option>
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div><br>


                    <div class="col-md-6">
                        <label for="user_id" class="form-control-label">{{ trans('admin.student') }}</label>
                        <select class="form-control" name="user_id">
                            <option value="" selected disabled>@lang('admin.select')</option>
                            @foreach ($data['users'] as $user)
                                <option value="{{ $user->id}}">{{ $user->identifier_id }}</option>
                            @endforeach
                        </select>
                    </div><br>



                    <div class="col-md-6">
                        <label for="subject_name" class="form-control-label">{{ trans('admin.department') }} </label>
                        <select  name="department_id" style="text-align: center" id=""
                                class="form-control department_id">
                                <option value="" selected>{{ trans('admin.select') }}</option>
                            @foreach ($data['departments'] as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div><br>

                    <div class="col-md-6">
                        <label for="department_branch_id" class="form-control-label">@lang('admin.branch')</label>
                        <select id="department_branch_id"  class="form-control" name="department_branch_id" >
                            <option value="" selected disabled style="text-align: center">@lang('admin.select')</option>
                        </select>
                    </div><br>



                <div class="col-md-6">
                    <label for="subject_id" class="form-control-label">{{ trans('admin.subject_choice') }}</label>
                    <select id="subject_id" class="form-control select2" name="subject_id[]"  multiple>
                        
                    </select>
                </div>

            </div>
        <br>

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

</script>



<script src="{{asset('assets/admin/js/select2.js')}}"></script>
<script src="{{asset('assets/admin/plugins/select2/select2.full.min.js')}}"></script>


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


{{--start get subjects with group_id and department_branch_id --}}
<script>
    $(document).ready(function () {
        $('select[name="department_branch_id"]').on('change', function () {

            let department_branch_id = $(this).val();
            let group_id = $("#group_id").val();

            if (department_branch_id) {
                $.ajax({
                    url: "{{ URL::to('get-subject-by-branch') }}/"+department_branch_id+"/"+group_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {

                        $('select[name="subject_id[]"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="subject_id[]"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
