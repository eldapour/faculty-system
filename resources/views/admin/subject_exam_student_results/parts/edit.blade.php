<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('subject_exam_student_result.update', $subjectExamStudentResult->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $subjectExamStudentResult->id }}" name="id">
        <div class="form-group">
            <div class="row">

                <div class="col-md-12">
                    <label for="student_degree"
                           class="form-control-label">{{trans('subject_exam_student_result.student_degree') }}</label>
                    <input type="text" class="form-control" min="0"  name="student_degree" value="{{$subjectExamStudentResult->student_degree}}">
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
