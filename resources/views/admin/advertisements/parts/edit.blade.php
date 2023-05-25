<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('advertisements.update', $advertisement->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $advertisement->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}_Ar</label>
                    <input type="text" class="form-control" value="{{ $advertisement->title[lang()] }}" name="title[ar]" required>
                </div>
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}_En</label>
                    <input type="text" class="form-control" value="{{ $advertisement->title[lang()] }}" name="title[en]" required>
                </div>
                <div class="col-md-4">
                    <label for="title" class="form-control-label">{{ trans('admin.title') }}_Fr</label>
                    <input type="text" class="form-control" value="{{ $advertisement->title[lang()] }}" name="title[fr]" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="image" class="form-control-label">{{ trans('admin.image') }}</label>
                    <input type="file" name="image" class="dropify" data-default-file="{{ asset($advertisement->image) }}">
                </div>
                <div class="col-md-6">
                    <label for="background_image"
                        class="form-control-label">{{ trans('admin.background_image') }}</label>
                    <input type="file" name="background_image" class="dropify" data-default-file="{{ asset($advertisement->background_image) }}"">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="category_id" class="form-control-label">{{ trans('admin.category') }}</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($data['categories'] as $category)
                        <option value="{{ $category->id }}" style="text-align: center" {{ ($category->category_id == $advertisement->category_id ) ? 'selected' : " " }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="service_id" class="form-control-label">{{ trans('admin.service') }}</label>
                    <select name="service_id" class="form-control" required>
                        @foreach ($data['services'] as $service)
                        <option value="{{ $service->id }}" style="text-align: center" {{ ($service->service_id == $advertisement->sevice_id ) ? 'selected' : " " }}>{{ $service->service_name[lang()] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}_Ar</label>
                    <textarea name="description[ar]" class="form-control" rows="8"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}_En</label>
                    <textarea name="description[en]" class="form-control" rows="8"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') }}_Fr</label>
                    <textarea name="description[fr]" class="form-control" rows="8"></textarea>
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
    $('.dropify').dropify()
</script>
