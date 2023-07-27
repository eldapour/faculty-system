<link href="{{asset('assets/admin')}}/plugins/select2/select2.min.css" rel="stylesheet"/>
<div class="modal-header">
    <h5 class="modal-title" id="example-Modal3">{{trans('admin.add_document')}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('document-store')}}" >
        @csrf


        <div class="form-group mb-3">
            <label class="form-label">{{trans('admin.document_type')}}</label>
            <select name="document_type_id"  class="form-control select2" data-placeholder="Choose user document type">
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->getTranslation('document_name', app()->getLocale())}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12 mb-3">
                <label for="name_ar" class="form-control-label">سحب بالوكاله</label><br>
                <input type="radio"  name="check" value="yes"> نعم <br>
                <input type="radio"  name="check" value="no">  لا  <br>

        </div>

      <div class="check-radio">
          <div class="col-md-12 mb-3">
              <label for="name_ar" class="form-control-label">{{trans('admin.person_name')}}</label>
              <input type="text" class="form-control" name="person_name" id="person_name">
          </div>


          <div class="col-md-12 mb-3">
              <label for="name_ar" class="form-control-label">{{trans('admin.national_id_of_person')}}</label>
              <input type="text" class="form-control" name="national_id_of_person" id="national_id_of_person">
          </div>


          <div class="col-md-12 mb-3">
              <label for="name_ar" class="form-control-label">{{trans('admin.card_image')}}</label>
              <input type="file" class="form-control" name="card_image" id="card_image">
          </div>


      </div>

        <div class="form-group mb-3">
            <label class="form-label">{{trans('admin.pull_type')}}</label>
            <select name="pull_type"  class="form-control select2" data-placeholder="Choose user pull type">
                <option value="temporary">{{trans('admin.temporary')}}</option>
                <option value="final">{{trans('admin.final')}}</option>
            </select>
        </div>


        <div class="col-md-12 mb-3">
            <label for="name_ar" class="form-control-label">{{trans('admin.pull_date')}}</label>
            <input type="date" class="form-control" name="pull_date" id="pull_date">
        </div>

        <div class="col-md-12 mb-3">
            <label for="name_ar" class="form-control-label">{{trans('admin.pull_return')}}</label>
            <input type="date" class="form-control" name="pull_return" id="pull_return">
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

<script>

    $('input[type=radio][name=check]').change(function() {

        if (this.value == 'yes') {

            $(".check-radio").show();

        }else if (this.value == 'no') {

            $(".check-radio").hide();

        }

    });
</script>
<script src="{{asset('assets/admin')}}/js/select2.js"></script>
<script src="{{asset('assets/admin')}}/plugins/select2/select2.full.min.js"></script>



