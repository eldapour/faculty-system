<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('facultyCount.update', $facultyCount->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $facultyCount->id }}" name="id">
        <div class="form-group">

            <div class="row">
                <div class="col-12">
                    <div class="col-md-12 mt-3">
                        <label for="image" class="form-control-label">{{ trans('admin.image') }}</label>
                        <input type="file" name="image" class="dropify" data-default-file="{{ asset($facultyCount->image) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.name') ." ".  trans('admin.arabic')}} </label>
                    <input type="text" class="form-control" value="{{ $facultyCount->getTranslation('title','ar') }}" name="title[ar]" id="group_name_ar">
                </div>
                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.name') ." ".  trans('admin.english')}} </label>
                    <input type="text" class="form-control" value="{{ $facultyCount->getTranslation('title','en') }}" name="title[en]" id="group_name_en">
                </div>

                <div class="col-md-4">
                    <label for="group_name" class="form-control-label">{{ trans('admin.name') ." ".  trans('admin.france')}} </label>
                    <input type="text" class="form-control" value="{{ $facultyCount->getTranslation('title','fr') }}" name="title[fr]" id="group_name_fr">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="group_name" class="form-control-label">{{ trans('admin.value')  }} </label>
                    <input type="number" class="form-control" name="count" value="{{ $facultyCount->count }}" id="count">
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
</script>
