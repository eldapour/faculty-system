<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('store-process-exam') }}">
        @csrf
        <div class="form-group">
            <div class="row">

                <div class="col-md-12 col-12">

                    <div class="form-group">
                        <label for="name" class="form-control-label">{{trans('process_exam.attachment_file')}}</label>
                        <input type="file" class="dropify" name="attachment_file" data-default-file="" />
                        <span class="form-text text-danger text-center">accept only png, jpeg, jpg</span>
                    </div>

                </div>


                <div class="col-md-6 col-12">
                    <label for="period" class="form-control-label">{{ trans('process_exam.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>

                <div class="col-md-6 col-12">

                    <div class="form-group">
                        <label for="email" class="form-control-label">{{trans('process_exam.year')}}</label>
                        <select name="year" class="form-control" id="year">
                            @for($year = 2023; $year < \Carbon\Carbon::now()->year +50 ; $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="name" class="form-control-label">{{trans('process_exam.reason')}}</label>
                        <input type="text" name="reason" id="reason" class="form-control"/>
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
