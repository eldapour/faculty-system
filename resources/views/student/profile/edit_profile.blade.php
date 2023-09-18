

<div class="modalContent">
    <form id="addForm" class="addForm" method="POST" action="{{ route('user-edit-profile') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="name" class="form-control-label">{{trans('student.image')}}</label>
                        <input type="file" class="dropify" name="image" data-default-file="" />
                        <span class="form-text text-danger text-center">accept only png, jpeg, jpg</span>
                    </div>
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

