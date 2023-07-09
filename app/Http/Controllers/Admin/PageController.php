<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Category;
use App\Models\Page;
use App\Traits\PhotoTrait;
use Buglinjo\LaravelWebp\Exceptions\CwebpShellExecutionFailed;
use Buglinjo\LaravelWebp\Exceptions\DriverIsNotSupportedException;
use Buglinjo\LaravelWebp\Exceptions\ImageMimeNotSupportedException;
use Illuminate\Http\JsonResponse;
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
                    if (count($pages->images) > 0) {
                        return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($pages->images[0]) . '">
                    ';
                    } else {
                        return trans('admin.No results');
                    }
                })
                ->editColumn('title', function ($pages) {
                    return $pages->title[lang()];
                })
                ->editColumn('category_id', function ($pages) {
                    return $pages->category->category_name[lang()];
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.pages.index');
        }
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.pages.parts.create', compact('categories'));
    }


    public function store(PageRequest $request): JsonResponse
    {
        $inputs = $request->all();

        $images = [];
        $files = [];
        if ($request->file('images')) {

            foreach ($request->file('images') as $image) {
                $images[] = $this->saveImage($image, 'uploads/pagesImage', 'photo');
            }
        }

        if ($request->file('files')) {

            foreach ($request->file('files') as $file) {
                $files[] = $this->saveImage($file, 'uploads/pagesFiles', 'photo');
            }
        }

        $inputs['images'] = $images;
        $inputs['files'] = $files;

        if (Page::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(Page $page)
    {
        $categories = Category::get();
        return view('admin.pages.parts.edit', compact('page', 'categories'));
    }


    public function update(Request $request, Page $page)
    {
        $inputs = $request->all();

        $images = [];
        $files = [];

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $this->saveImage($image, 'uploads/pagesImage', 'photo');
            }
            foreach ($page->images as $image) {

                if (file_exists($image)) {
                    unlink($image);
                }
            }
        } else {
            $request->except('images');
            foreach ($page->images as $image) {
            $images[] = $image;
            }
        }



        if ($request->file('files')) {

            foreach ($request->file('files') as $file) {
                $files[] = $this->saveImage($file, 'uploads/pagesFiles', 'photo');
            }
        }

        $inputs['images'] = $images;
        $inputs['files'] = $files;

        if ($page->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function destroy(Request $request)
    {
        $pages = Page::where('id', $request->id)->firstOrFail();
        $pages->delete();
        return response(['message' => trans('admin.deleted_successfully'), 'status' => 200], 200);
    }


}
