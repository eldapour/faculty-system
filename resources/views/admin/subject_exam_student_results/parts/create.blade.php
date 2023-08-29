<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('subject_exam_student_result.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <label for="user_id" class="form-control-label">{{ trans('subject_exam_student_result.identifier_id') }}</label>
                    <select name="user_id" class="form-control">
                        <option value="" selected disabled>@lang('admin.select')</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" style="text-align: center">{{ $user->identifier_id }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="col-md-12 mt-3">
                    <label for="subject_id" class="form-control-label">{{ trans('subject_exam_student_result.subject') }}</label>
                    <select name="subject_id" class="form-control">
                        <option value="" selected disabled>@lang('admin.select')</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" style="text-align: center">{{ $subject->subject_name}}
                            </option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label for="student_degree"
                        class="form-control-label">{{ trans('subject_exam_student_result.student_degree') }}</label>
                    <input type="text" step="any"  class="form-control" name="student_degree">
                </div>
                <div class="col-md-6">
                    <label for="exam_degree"
                        class="form-control-label">{{ trans('subject_exam_student_result.exam_degree') }}</label>
                    <input type="text" min="0" class="form-control" name="exam_degree">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label for="period" class="form-control-label">{{ trans('subject_exam_student_result.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="" selected disabled>@lang('admin.select')</option>
                        <option value="عاديه" style="text-align: center">{{ trans('admin.normal') }}</option>
                        <option value="استدراكيه" style="text-align: center">{{ trans('admin.remedial') }}</option>
                    </select>
                </div>

                <div class="col-md-6 mt-3">
                    <label for="email" class="form-control-label">{{trans('subject_exam_student_result.year')}}</label>
                    <input type="number" id="yearInput" name="year" min="1900" class="form-control" max="2999">

                    {{--                    <select name="year" class="form-control" id="year">--}}
{{--                        @for($year = 2023; $year < \Carbon\Carbon::now()->year +50 ; $year++)--}}
{{--                            <option value="{{ $year }}">{{ $year }}</option>--}}
{{--                        @endfor--}}
{{--                    </select>--}}
                </div>


            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <label for="date_enter_degree"
                        class="form-control-label">{{ trans('subject_exam_student_result.date_enter_degree') }}</label>
                    <input type="date" name="date_enter_degree" class="form-control">
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
    $('.dropify').dropify();
    $(document).ready(function() {
        $('select').select2();
    });
</script>
