<link href="{{asset('assets/admin')}}/plugins/select2/select2.min.css" rel="stylesheet"/>
<div class="modal-header">
    <h5 class="modal-title" id="example-Modal3">{{trans('admin.add_admin')}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('admins.store')}}" >
        @csrf



        <div class="form-group">
            <label for="name" class="form-control-label">{{trans('admin.image_user')}}</label>
            <input type="file" class="dropify" name="image" data-default-file="{{asset('assets/uploads/avatar.gif')}}" accept="image/png, image/gif, image/jpeg,image/jpg"/>
            <span class="form-text text-danger text-center">accept only png, gif, jpeg, jpg</span>
        </div>


        <div class="form-group">
            <label for="name" class="form-control-label">{{trans('admin.first_name')}}</label>
            <input type="text" class="form-control" name="first_name" id="first_name">
        </div>


        <div class="form-group">
            <label for="name" class="form-control-label">{{trans('admin.last_name')}}</label>
            <input type="text" class="form-control" name="last_name" id="last_name">
        </div>


        <div class="form-group">
            <label for="email" class="form-control-label">{{trans('admin.email')}} </label>
            <input type="text" class="form-control" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="password" class="form-control-label">{{trans('admin.password')}}</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>




        <div class="form-group" id="job">
            <label for="email" class="form-control-label">{{trans('admin.job_id')}}</label>
            <input type="number" class="form-control" name="job_id" id="job_id">
        </div>





        <div class="form-group">
            <label class="form-label">{{trans('admin.user_type')}}</label>
            <select name="user_type" id="type" class="form-control select2" data-placeholder="Choose user type">
                <option class="form-control" value="doctor">@lang('login.doctor')</option>
                <option class="form-control" value="manger">@lang('login.manger')</option>
                <option class="form-control" value="employee">@lang('login.employee')</option>
                <option class="form-control" value="factor">@lang('login.factor')</option>
            </select>
        </div>


        {{--end create model--}}

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin.close_model')}}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{trans('admin.add_data')}}</button>
        </div>


    </form>
</div>



<script>
    $('.dropify').dropify()
</script>
<script src="{{asset('assets/admin')}}/js/select2.js"></script>
<script src="{{asset('assets/admin')}}/plugins/select2/select2.full.min.js"></script>


