<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('store-process-degree-normal') }}">
        @csrf
        <div class="form-group">
            <div class="row">



                <input type="hidden" name="subject_id" id="subject_id" value="{{$subject->id}}">

                <input type="hidden" name="doctor_id" id="doctor_id" value="{{$doctor_id}}">

                <input type="hidden" name="period" id="period" value="عاديه">

                <input type="hidden" name="year" id="year" value="{{$period->year_start}}">

                <input type="hidden" name="section" id="section" value="{{$subjectExamStudent->section}}">

                <input type="hidden" name="exam_code" id="exam_code" value="{{$subjectExamStudent->exam_code}}">


                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="name" class="form-control-label">{{trans('process_degree.student_degree_before_request')}}</label>
                        <input type="text" name="student_degree_before_request" id="student_degree_before_request" class="form-control"/>
                    </div>

                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="name" class="form-control-label">{{trans('process_degree.student_degree_after_request')}}</label>
                        <input type="text" name="student_degree_after_request" id="student_degree_after_request" class="form-control"/>
                    </div>

                </div>

                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="email" class="form-control-label">{{trans('process_degree.request_type')}}</label>
                        <select name="request_type" class="form-control" id="request_type">
                                <option value="مراجعه الورقه">مراجعه الورقه</option>
                                <option value="طلب جبر">طلب جبر</option>
                                <option value="غائب">غائب</option>

                        </select>
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

