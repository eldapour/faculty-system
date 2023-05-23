<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('categories.store')}}" >
    @csrf
    <div class="form-group">
        <label for="name" class="form-control-label">الصورة</label>
        <input type="file" class="dropify" name="image" data-default-file="{{asset('assets/uploads/avatar.png')}}" accept="image/png,image/webp , image/gif, image/jpeg,image/jpg"/>
        <span class="form-text text-danger text-center">مسموح فقط بالصيغ التالية : png, gif, jpeg, jpg,webp</span>
    </div>
    <div class="form-group">
        <label for="name" class="form-control-label"> الاسم يالغه الانجليزية</label>
        <input type="text" class="form-control" name="name_ar" id="name_ar">
    </div>
    <div class="form-group">
        <label for="email" class="form-control-label">الاسم يالغة العربية</label>
        <input type="text" class="form-control" name="name_en" id="name_en">
    </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-primary" id="addButton">اضافة</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify()
</script>
