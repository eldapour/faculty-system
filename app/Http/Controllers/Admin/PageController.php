<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Category;
use App\Models\Page;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    use PhotoTrait;

    public function index(request $request)
    {
        if ($request->ajax()) {
            $pages = Page::get();
            return Datatables::of($pages)
                ->addColumn('action', function ($pages) {
                    return '
                            <button type="button" data-id="' . $pages->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $pages->id . '" data-title="' . $pages->title[lang()] . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($pages) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($pages->image[0]) . '">
                    ';
                })
                ->editColumn('title', function ($pages) {
                    return $pages->title;
                })
                ->editColumn('description', function ($pages) {
                    return \Str::limit($pages->description, 100);
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.pages.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        $categories = Category::get();
        return view('admin.pages.parts.create', compact('categories'));
    }
    // Create End

    // Store Start

    public function store(PageRequest $request)
    {
        $inputs = $request->all();

        foreach ($inputs['images'] as $image) {
            $inputs['images'] = $this->saveImage($image, 'uploads/pagesImage', 'photo');
        }

        if (Page::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Slider $slider)
    {
        return view('admin.sliders.parts.edit', compact('slider'));
    }
    // Edit End

    // Update Start

    public function update(SliderRequest $request, Slider $slider)
    {
        $inputs = $request->all();

        if ($request->has('image')) {
            if (file_exists($slider->image)) {
                unlink($slider->image);
            }
            $inputs['image'] = $this->saveImage($request->image, 'uploads/sliders', 'photo');
        }

        if ($slider->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $pages = Slider::where('id', $request->id)->firstOrFail();
        $pages->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
