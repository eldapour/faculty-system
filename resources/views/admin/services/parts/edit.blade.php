<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('city.update', $city->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $city->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="name_ar" class="form-control-label">الاسم بالعربي</label>
                    <input type="text" class="form-control" value="{{ $city->name_ar }}" name="name_ar" required>
                </div>
                <div class="col-md-6">
                    <label for="name_en" class="form-control-label">الاسم بالانجليزي</label>
                    <input type="text" class="form-control" value="{{ $city->name_en }}" name="name_en" required>
                </div>
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
