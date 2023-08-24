<link href="{{asset('assets/admin')}}/plugins/select2/select2.min.css" rel="stylesheet"/>


<div class="container modalContent">
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{ route('schedules.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">


                <div class="col-md-12">
                    <label for="year" class="form-control-label">{{ trans('admin.year') }}</label>
                    <input type="number" class="form-control" name="year" id="year" min="1900">

                </div>

                <div class="col-md-12">
                    <label for="department_id" class="form-control-label">@lang('admin.department')</label>
                    <select class="form-control" name="department_id" required>
                        <option value="" selected >@lang('admin.select')</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id}}">{{ $department->getTranslation('department_name', app()->getLocale())}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="col-md-12">
                    <label for="department_id" class="form-control-label">@lang('admin.unit_name')</label>
                    <select class="form-control" name="unit_id" required>
                        <option value="" selected disabled>@lang('admin.select')</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id}}">{{ $unit->getTranslation('unit_name', app()->getLocale())}}</option>
                        @endforeach
                    </select>
                </div>




                <div class="col-md-12">
                    <label for="pdf_upload" class="form-control-label">@lang('admin.description_text')</label>
                    <input type="text" class="form-control" name="description" id="description">
                </div>



                <div class="col-md-12">
                    <label for="pdf_upload" class="form-control-label">@lang('admin.schedule_pdf_upload')</label>
                    <input type="file" class="form-control" name="pdf_upload" id="pdf_upload">
                </div>


            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add_data') }}</button>
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
</script>
