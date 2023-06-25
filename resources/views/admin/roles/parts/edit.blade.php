<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('roles.update',$role->id)}}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$role->id}}" name="id">
        <div class="form-group">
            <label for="name" class="form-control-label">الاسم</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}" required="required">
        </div>
        <div class="form-group">
            <label class="form-control-label">الصلاحيات</label>
            <hr>
            <div class="row">
                @foreach($permissions as $permission)
                    {{--                <div class="badge badge-primary m-2">--}}
                    {{--                    <input type="checkbox"--}}
                    {{--                           class=""--}}
                    {{--                           {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} name="permission[]"--}}
                    {{--                           value="{{ $permission->id }}" id="{{ $permission->id }}">--}}
                    {{--                    <label for="{{ $permission->id }}" class="m-2">{{ $permission->name }}</label>--}}
                    {{--                </div>--}}
                    <div class="col-6">
                        <label class="switch">
                            <input type="checkbox" role="switch" name="permission[]" value="{{ $permission->id }}"
                                   {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                   id="{{ $permission->id }}">
                            <span class="slider round"></span>
                        </label>
                        <label class="form-control-label" for="{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-success" id="updateButton">تحديث</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
