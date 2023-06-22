<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Traits\PhotoTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
    use PhotoTrait;
    public function index(request $request)
    {
        if ($request->ajax()) {
            $sliders = Slider::get();
            return Datatables::of($sliders)
                ->addColumn('action', function ($sliders) {
                    return '
                            <button type="button" data-id="' . $sliders->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $sliders->id . '" data-title="' . $sliders->title[lang()] . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($sliders) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="'. asset($sliders->image) .'">
                    ';
                })
                ->editColumn('title', function ($sliders) {
                    return $sliders->title[lang()];
                })
                ->editColumn('description', function ($sliders) {
                    return $sliders->description[lang()];
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.sliders.index');
        }
    }

    public function create()
    {
        return view('admin.sliders.parts.create');
    }

    public function store(SliderRequest $request): JsonResponse
    {
        $inputs = $request->all();

        $inputs['image'] = $this->saveImage($inputs['image'],'uploads/sliders','photo');

        if (Slider::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(Slider $slider)
    {
        return view('admin.sliders.parts.edit', compact('slider'));
    }


    public function update(SliderRequest $request, Slider $slider): JsonResponse
    {
        $inputs = $request->all();

        if ($request->has('image')) {
            if (file_exists($slider->image)) {
                unlink($slider->image);
            }
            $inputs['image'] = $this->saveImage($request->image, 'uploads/sliders','photo');
        }

        if ($slider->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function destroy(Request $request)
    {
        $sliders = Slider::where('id', $request->id)->firstOrFail();
        $sliders->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }
}
