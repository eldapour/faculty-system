<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('subject.update', $subject->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $subject->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.arabic') }} </label>
                    <input type="text" class="form-control" value="{{ $subject->subject_name }}" name="subject_name[ar]">
                </div>
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.english') }} </label>
                    <input type="text" class="form-control" value="{{ $subject->subject_name }}" name="subject_name[en]">
                </div>
                <div class="col-md-4">
                    <label for="subject_name"
                        class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.france') }} </label>
                    <input type="text" class="form-control" value="{{ $subject->subject_name }}" name="subject_name[fr]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="subject_name" class="form-control-label">{{ trans('admin.group') }} </label>
                    <select name="group_id" style="text-align: center" id="" class="form-control">
                        @foreach ($data['groups'] as $group)
                            <option value="{{ $group->id }}" {{ $subject->group_id == $group->id ? 'selected' : '' }}>{{ $group->group_name }}</option>
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
</script>
