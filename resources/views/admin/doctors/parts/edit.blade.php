<link href="{{asset('assets/admin')}}/plugins/select2/select2.min.css" rel="stylesheet"/>
<div class="modal-header">
    <h5 class="modal-title" id="example-Modal3">{{trans('admin.edit_model')}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('doctors.update',$doctor->id)}}" >
        @csrf
        @method('PUT')


        <input type="hidden" name="id" id="id" value="{{$doctor->id}}">

        <div class="form-group">
            <label for="name" class="form-control-label">{{trans('admin.image_user')}}</label>
            <input type="file" class="dropify" name="image"
                   data-default-file="{{ asset('uploads/users/'.$doctor->image) }}"
                   value="{{ asset('uploads/users/'.$doctor->image) }}"
                   accept="image/png, image/gif, image/jpeg,image/jpg"/>
            <span class="form-text text-danger text-center">accept only png, gif, jpeg, jpg</span>
        </div>


        <div class="form-group">
            <label for="name" class="form-control-label">{{trans('admin.first_name')}}</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="{{$doctor->first_name}}">
        </div>


        <div class="form-group">
            <label for="name" class="form-control-label">{{trans('admin.last_name')}}</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="{{$doctor->last_name}}">
        </div>


        <div class="form-group">
            <label for="name" class="form-control-label">{{trans('student.first_name_latin')}}</label>
            <input type="text" class="form-control" name="first_name_latin" id="first_name_latin" value="{{$doctor->first_name_latin}}">
        </div>




        <div class="form-group">
            <label for="name" class="form-control-label">{{trans('student.last_name_latin')}}</label>
            <input type="text" class="form-control" name="last_name_latin" id="last_name_latin" value="{{$doctor->last_name_latin}}">
        </div>

        <div class="form-group">
            <label for="email" class="form-control-label">{{trans('admin.email')}} </label>
            <input type="text" class="form-control" name="email" id="email" value="{{$doctor->email}}">
        </div>

        <div class="form-group">
            <label for="password" class="form-control-label">{{trans('admin.password')}}</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>


        <div class="form-group" id="job">
            <label for="email" class="form-control-label">{{trans('admin.job_id')}}</label>
            <input type="number" class="form-control" name="job_id" id="job_id" value="{{$doctor->job_id}}">
        </div>


        <div class="form-group">
            <label class="form-label">{{trans('admin.user_type')}}</label>
            <select name="professor_position" id="type" class="form-control select2" data-placeholder="Choose professor_position">
                @foreach($professor_positions as $professor_position)
                    <option class="form-control" value="{{$professor_position}}" {{$doctor->professor_position == $professor_position ? 'selected' : ''}}>{{$professor_position}}</option>

                @endforeach

            </select>
        </div>


        {{--end create model--}}

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin.close_model')}}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{trans('admin.edit_model')}}</button>
        </div>


    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
<script src="{{asset('assets/admin')}}/js/select2.js"></script>
<script src="{{asset('assets/admin')}}/plugins/select2/select2.full.min.js"></script>
