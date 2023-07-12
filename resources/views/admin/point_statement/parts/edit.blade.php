<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('points.update', $point->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $point->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="student_degree"
                           class="form-control-label">{{ trans('point_statement.degree_student') }}</label>
                    <input type="number" class="form-control" name="degree_student" value="{{$point->degree_student}}">
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
    $('.dropify').dropify();
    $(document).ready(function() {
        $('select').select2();
    });
</script>
