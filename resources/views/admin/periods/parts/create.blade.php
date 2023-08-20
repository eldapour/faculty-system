<div style="padding: 20px" class="modalContent">
    <form id="addForm" class="addForm" method="POST" action="{{ route('periods.store') }}">
        @csrf

        <div class="form-group">
            <div class="row">

                <div class="col-md-12">
                    <label for="group_name" class="form-control-label">{{ trans('admin.period_start_date')}} </label>
                    <input type="date" class="form-control" name="period_start_date" id="period_start_date">
                </div>

                <div class="col-md-12">
                    <label for="group_name" class="form-control-label">{{ trans('admin.period_end_date')}} </label>
                    <input type="date" class="form-control" name="period_end_date" id="period_start_date">
                </div>

                <div class="col-md-12">
                    <label for="period" class="form-control-label">{{ trans('admin.period_name') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="period" class="form-control-label">{{ trans('admin.session_name') }}</label>
                    <select name="session" class="form-control">
                        <option value="عاديه" style="text-align: center">{{ trans('admin.normal') }}</option>
                        <option value="استدراكيه" style="text-align: center">{{trans('admin.remedial')}}</option>
                    </select>
                </div>


                <div class="col-md-12">
                    <label for="group_name" class="form-control-label">{{ trans('admin.year_start')}} </label>

                    <input type="number" class="form-control" name="year_start" id="year_start">


                </div>


                <div class="col-md-12">
                    <label for="group_name" class="form-control-label">{{ trans('admin.year_end')}} </label>

                    <input type="number" class="form-control" name="year_end" id="year_end">

                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add_data') }}</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify()
</script>

