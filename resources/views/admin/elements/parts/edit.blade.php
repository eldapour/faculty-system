<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('elements.update', $element->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $element->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" value="{{ $element->name['ar'] }}" name="name[ar]">
                </div>
                <div class="col-md-4">
                    <label for="name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $element->name['en'] }}" name="name[en]" required>
                </div>
                <div class="col-md-4">
                    <label for="name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $element->name['fr'] }}" name="name[fr]" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="name" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control" required>
                        <option value="ربيعيه" style="text-align: center" {{ $element->period == 'ربيعيه' ? 'selected' : '' }}>{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center" {{ $element->period == 'خريفيه' ? 'selected' : '' }}>{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-control-label">{{ trans('admin.department') ." ". trans('admin.branch') }}</label>
                    <select name="department_branch_id" class="form-control" required>
                        @foreach ($data['department_branchs'] as $key => $department_branch)
                            <option value="{{ $department_branch->id }}" style="text-align: center" {{ $element->department_branch_id == $department_branch->id ? 'selected' : '' }}>{{ $department_branch->branch_name }}</option>
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
    $('.dropify').dropify()

        CKEDITOR.replaceAll();

        $(document).ready(function() {
            $('select').select2();
        });
</script>
