<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('elements.update', $element->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $element->id }}" name="id">
        <div class="form-group">


            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" value="{{ $element->getTranslation('name', 'ar') }}" name="name_ar">
                </div>
                <div class="col-md-6 col-12">
                    <label for="name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $element->getTranslation('name', 'en') }}" name="name_en">
                </div>
                <div class="col-md-12 col-12">
                    <label for="name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $element->getTranslation('name', 'fr') }}" name="name_fr">
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-12">
                    <label for="name" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control" required>
                        <option value="ربيعيه" style="text-align: center" {{ $element->period == 'ربيعيه' ? 'selected' : '' }}>{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center" {{ $element->period == 'خريفيه' ? 'selected' : '' }}>{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-12 col-12">
                    <label for="name" class="form-control-label">{{ trans('admin.department') ." ". trans('admin.branch') }}</label>
                    <select name="department_branch_id" class="form-control" required>
                        @foreach ($data['department_branchs'] as $key => $department_branch)
                            <option value="{{ $department_branch->id }}" style="text-align: center" {{ $element->department_branch_id == $department_branch->id ? 'selected' : '' }}>{{ $department_branch->getTranslation('branch_name', app()->getLocale()) }}</option>
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
