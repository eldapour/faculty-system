<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('subject.update', $subject->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $subject->id }}" name="id">
        <div class="form-group">
            <div class="row">


                <div class="col-md-12">
                    <label for="subject_name"
                           class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.arabic') }} </label>
                    <input type="text" class="form-control" name="subject_name_ar" id="subject_name_ar" value="{{$subject->getTranslation('subject_name','ar')}}">
                </div>

                <div class="col-md-12">
                    <label for="subject_name"
                           class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.english') }} </label>
                    <input type="text" class="form-control" name="subject_name_en" id="subject_name_en"  value="{{$subject->getTranslation('subject_name','en')}}">
                </div>

                <div class="col-md-12">
                    <label for="subject_name"
                           class="form-control-label">{{ trans('admin.name') . ' ' . trans('admin.france') }} </label>
                    <input type="text" class="form-control" name="subject_name_fr" id="subject_name_fr"  value="{{$subject->getTranslation('subject_name','fr')}}">
                </div>

            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-success" id="updateButton">{{ trans('admin.update') }}</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify();
    $(document).ready(function() {
        $('select').select2();
    });

</script>


<script>
    $('.dropify').dropify();
</script>
