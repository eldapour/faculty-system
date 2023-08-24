<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('deadlines.store') }}">
        @csrf

            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="name_en" class="form-control-label">{{ trans('admin.deadline_date_start') }}</label>
                    <input type="date" class="form-control" name="deadline_date_start">
                </div>

                <div class="col-md-6 col-12">
                    <label for="name_en" class="form-control-label">{{ trans('admin.deadline_date_end') }}</label>
                    <input type="date" class="form-control" name="deadline_date_end">
                </div>


                <div class="col-md-6 col-12">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>

                <div class="col-md-6 col-12">

                    <div class="form-group">
                        <label for="email" class="form-control-label">{{trans('deadline.year')}}</label>
                        {{-- <select name="year" class="form-control" id="year">
                            @for($year = 2023; $year < \Carbon\Carbon::now()->year +50 ; $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select> --}}
                        <input type="number" name="year" class="form-control" id="year">
                    </div>

                </div>


                <div class="col-md-12 col-12">
                    <label for="period" class="form-control-label">{{trans('deadline.deadline_type')}}</label>
                    <select name="deadline_type" class="form-control">
                        <option value="1" style="text-align: center">{{trans('deadline.process_exam')}}</option>
                        <option value="0" style="text-align: center">{{trans('deadline.process_degree')}}</option>
                    </select>
                </div><br>


            </div>





<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
    <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add') }}</button>
</div>
</form>
</div>

<script>

    $(document).ready(function() {
        $('select').select2();
    });
</script>
