<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('categories.update',$find->id)}}" >
    @csrf
        @method('PUT')
        <input type="hidden" value="{{$find->id}}" name="id">
        <div class="form-group">
            <label for="name" class="form-control-label">{{__('admin.image')}}</label>
            <input type="file" id="testDrop" class="dropify" name="image" data-default-file="{{get_user_file($find->image)}}"/>
        </div>

        <div class="form-group">
            <label for="name" class="form-control-label"> {{__('admin.name_ar')}}</label>
            <input type="text" class="form-control" name="name_ar" id="name_ar" value="{{$find->name_ar}}">
        </div>
        <div class="form-group">
            <label for="email" class="form-control-label">{{__('admin.name_en')}}</label>
            <input type="text" class="form-control" name="name_en" id="name_en" value="{{$find->name_en}}">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.close')</button>
            <button type="submit" class="btn btn-success" id="updateButton">{{__('admin.update')}}</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
