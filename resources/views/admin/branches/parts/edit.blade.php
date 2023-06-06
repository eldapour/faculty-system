<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('branches.update', $branch->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$branch->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="department_id" class="form-control-label">@lang('admin.departments')</label>
                    <select class="form-control" name="department_id" required @selected(old('department_id',$branch->department_id))>
                        <option value="" disabled>@lang('admin.select')</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id}}">{{ $department->getTranslation('department_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" value="{{ $branch->getTranslation('branch_name', 'ar') }}" name="branch_name_ar" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $branch->getTranslation('branch_name', 'en') }}" name="branch_name_en" required>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.name') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $branch->getTranslation('branch_name', 'fr') }}" name="branch_name_fr" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.close')</button>
            <button type="submit" class="btn btn-success" id="updateButton">@lang('admin.update')</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
