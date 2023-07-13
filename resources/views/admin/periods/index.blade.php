@extends('admin/layouts/master')

@section('title')  {{trans('admin.period_all')}} @endsection
@section('page_name') {{trans('admin.period_all')}} @endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')
@endsection
@section('content')


    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.period_all')}}</h3>
                    <div class="">
                        <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span>{{trans('admin.period_add')}}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>


                            <tr class="fw-bolder text-muted bg-light">

                                <th class="min-w-25px">#</th>
                                <th class="min-w-25px">{{trans('admin.period_start_date')}}</th>
                                <th class="min-w-25px">{{trans('admin.period_end_date')}}</th>
                                <th class="min-w-25px">{{trans('admin.period_name')}}</th>
                                <th class="min-w-25px">{{trans('admin.session_name')}}</th>
                                <th class="min-w-25px">{{trans('admin.year_start')}}</th>
                                <th class="min-w-25px">{{trans('admin.year_end')}}</th>
                                <th class="min-w-25px">{{trans('admin.status_period')}}</th>
                                <th class="min-w-25px">{{trans('admin.action')}}</th>

                            </tr>

                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit MODAL -->
        <div class="modal fade" id="editOrCreate"  role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div  class="modal-content container" id="modalContent">

                </div>
            </div>
        </div>
        <!-- Edit MODAL CLOSED -->
    </div>
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var loader = ` <div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>
        `;

        var columns = [
            {data: 'id', name: 'id'},
            {data: 'period_start_date', name: 'period_start_date'},
            {data: 'period_end_date', name: 'period_end_date'},
            {data: 'period', name: 'period'},
            {data: 'session', name: 'season'},
            {data: 'year_start', name: 'year_start'},
            {data: 'year_end', name: 'year_end'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]



        showData('{{route('periods.index')}}', columns);


        // Get Add View
        $(document).on('click', '.addBtn', function () {
            $('#modalContent').html(loader)
            $('#editOrCreate').modal('show')
            setTimeout(function () {
                $('#modalContent').load('{{route('periods.create')}}')
            }, 250)
        });

        // Add By Ajax
        $(document).on('submit','Form#addForm',function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#addForm').attr('action');
            $.ajax({

                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#addButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">working</span>').attr('disabled', true);
                },

                success: function (data) {
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('Document type added successfully');
                    }
                    else
                        toastr.error('There is an error');
                    $('#addButton').html(`Create`).attr('disabled', false);
                    $('#editOrCreate').modal('hide')
                },

                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('There is an error');
                    } else if (data.status === 422) {

                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value){
                                    toastr.error(value, key);
                                });
                            }
                        });
                    } else
                        toastr.error('there in an error');
                    $('#addButton').html(`Create`).attr('disabled', false);
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        });



        //update status of periods
        $(document).on('click','.status',function(e) {
            e.preventDefault();

            let id = $(this).data("id");
            let status = $(this).data("status");

            $.ajax({
                url: '{{route('period.status')}}',
                type: 'POST',
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id,
                    'status': status

                },
                beforeSend: function () {
                    $('#status_btn_'+status+'_'+id).html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">جاري الانتظار....</span>').attr('disabled', true);
                },

                success: function (data) {

                    if (data.status == 200){
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('The periods status updated successfully');
                    }
                    else
                        toastr.error('There is an error');
                },

            });
        });



    </script>



@endsection


