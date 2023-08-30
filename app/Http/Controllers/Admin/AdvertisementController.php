<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementUpdateRequest;
use App\Http\Requests\StoreAdvertisement;
use App\Traits\PhotoTrait;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    use PhotoTrait;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|JsonResponse
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $advertisements = Advertisement::get();

            return DataTables::of($advertisements)
                ->addColumn('action', function ($advertisements) {
                    return '
                            <button type="button" data-id="' . $advertisements->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $advertisements->id . '" data-title="' . $advertisements->getTranslation('title', app()->getLocale()) . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })

                ->editColumn('image', function ($advertisements) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset('uploads/advertisements/images/'.$advertisements->image) . '">
                    ';
                })
                ->editColumn('background_image', function ($advertisements) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset('uploads/advertisements/background_image/'.$advertisements->background_image) . '">
                    ';
                })
                ->editColumn('title', function ($advertisements) {
                    return  $advertisements->getTranslation('title', app()->getLocale());
                })
                ->editColumn('description', function ($advertisements) {
                    return $advertisements->getTranslation('description', app()->getLocale());
                })
                ->editColumn('service_id', function ($advertisements) {
                    return $advertisements->service->getTranslation('service_name', app()->getLocale());
                })
                ->editColumn('category_id', function ($advertisements) {
                    return $advertisements->category->getTranslation('category_name', app()->getLocale());
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.advertisements.index');
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['services'] = Service::all();
        return view('admin.advertisements.parts.create', compact('data'));
    }

    /**
     * @param StoreAdvertisement $request
     * @return JsonResponse
     * @throws \Buglinjo\LaravelWebp\Exceptions\CwebpShellExecutionFailed
     * @throws \Buglinjo\LaravelWebp\Exceptions\DriverIsNotSupportedException
     * @throws \Buglinjo\LaravelWebp\Exceptions\ImageMimeNotSupportedException
     */
    public function store(StoreAdvertisement $request): JsonResponse
    {
        if ($image = $request->file('image')) {

            $destinationPath = 'uploads/advertisements/images';
            $imagePath = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imagePath);
            $request['image'] = "$imagePath";
        }

        if ($file = $request->file('file')) {
            $file = $this->saveImage($request->file, 'uploads/advertisements/files', 'file');
        }// end of request file upload


        if ($backgroundImage = $request->file('background_image')) {

            $destinationPath = 'uploads/advertisements/background_image';
            $backgroundImagePath = date('YmdHis') . "." . $backgroundImage->getClientOriginalExtension();
            $backgroundImage->move($destinationPath, $backgroundImagePath);
            $request['background_image'] = "$backgroundImagePath";
        }

        $advertisement = Advertisement::create([
            "title" => ['ar' => $request->title_ar,'en' => $request->title_en,'fr' => $request->title_fr],
            "description" => ['ar' => $request->description_ar,'en' => $request->description_en,'fr' => $request->description_fr],
            'image' => $imagePath,
            'file' => $file,
            'background_image' => $backgroundImagePath,
            'category_id' => $request->category_id,
            'service_id' => $request->service_id
        ]);

        if ($advertisement->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    /**
     * @param Advertisement $advertisement
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Advertisement $advertisement)
    {
        $data['categories'] = Category::all();
        $data['services'] = Service::all();
        return view('admin.advertisements.parts.edit', compact('advertisement', 'data'));
    }

    /**
     * @param StoreAdvertisement $request
     * @param Advertisement $advertisement
     * @return JsonResponse
     * @throws \Buglinjo\LaravelWebp\Exceptions\CwebpShellExecutionFailed
     * @throws \Buglinjo\LaravelWebp\Exceptions\DriverIsNotSupportedException
     * @throws \Buglinjo\LaravelWebp\Exceptions\ImageMimeNotSupportedException
     */
    public function update(AdvertisementUpdateRequest $request, Advertisement $advertisement): JsonResponse
    {
        if ($image = $request->file('image')) {

            $destinationPath = 'uploads/advertisements/images';
            $imagePath = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imagePath);
            $request['image'] = "$imagePath";

            if(file_exists(public_path('uploads/advertisements/images/' . $advertisement->image))){

                unlink(public_path('uploads/advertisements/images/' . $advertisement->image));
            }
        }

        if ($file = $request->file('file')) {
            if (file_exists($advertisement->file)) {
                unlink($advertisement->file);
            }
            $file = $this->saveImage($request->file, 'uploads/advertisements/files', 'file');
        }// end of request file upload


        if ($backgroundImage = $request->file('background_image')) {
            $destinationPath = 'uploads/advertisements/background_image';
            $backgroundImagePath = date('YmdHis') . "." . $backgroundImage->getClientOriginalExtension();
            $backgroundImage->move($destinationPath, $backgroundImagePath);
            $request['background_image'] = "$backgroundImagePath";
            if(file_exists(public_path('uploads/advertisements/background_image/' . $advertisement->background_image))){

                unlink(public_path('uploads/advertisements/background_image/' . $advertisement->background_image));
            }
        }

        $advertisement->update([
            "title" => ['ar' => $request->title_ar,'en' => $request->title_en,'fr' => $request->title_fr],
            "description" => ['ar' => $request->description_ar,'en' => $request->description_en,'fr' => $request->description_fr],
            'image' => $request->file('image') != null ? $imagePath : $advertisement->image,
            'background_image' => $request->file('background_image') != null ? $backgroundImagePath : $advertisement->background_image,
            'category_id' => $request->category_id,
            'file' => $file,
            'service_id' => $request->service_id
        ]);


        if ($advertisement->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $advertisement = Advertisement::where('id', $request->id)->firstOrFail();
        $advertisement->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


}
