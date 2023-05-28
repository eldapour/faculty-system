<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('sliders.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.image') }}</label>
                    <input type="file" class="form-control dropify" name="image">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.title') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="title[ar]">
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.title') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" name="title[en]">
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.title') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" name="title[fr]">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.description') }} {{ trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" name="description[ar]">
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.description') }}  {{ trans('admin.english') }}</label>
                    <input type="text" class="form-control" name="description[en]">
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{  trans('admin.description') }}  {{ trans('admin.france') }}</label>
                    <input type="text" class="form-control" name="description[fr]">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add')}}</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify()
</script>
