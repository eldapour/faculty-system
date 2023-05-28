<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('subject.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.arabic') }} </label>
                    <input type="text" class="form-control" name="subject_name[ar]">
                </div>
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.english') }} </label>
                    <input type="text" class="form-control" name="subject_name[en]">
                </div>
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.france') }} </label>
                    <input type="text" class="form-control" name="subject_name[fr]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="subject_name" class="form-control-label">{{ trans('admin.group') }} </label>
                    <select name="group_id" style="text-align: center" id="" class="form-control">
                        @foreach ($data['groups'] as $group)
                            <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                        @endforeach
                    </select>
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
</script>
