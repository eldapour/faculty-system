<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdvertisement;
use App\Traits\PhotoTrait;
use Yajra\DataTables\DataTables;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{

    use PhotoTrait;


    public function index(request $request)
    {
        if ($request->ajax()) {
            $advertisements = Advertisement::get();
            return Datatables::of($advertisements)
                ->addColumn('action', function ($advertisements) {
                    return '
                            <button type="button" data-id="' . $advertisements->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $advertisements->id . '" data-title="' . $advertisements->title[lang()] . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('title', function ($advertisements) {
                    return'<td>'. $advertisements->title[lang()] .'</td>';
                })
                ->editColumn('image', function ($advertisements) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($advertisements->image) . '">
                    ';
                })
                ->editColumn('background_image', function ($advertisements) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($advertisements->background_image) . '">
                    ';
                })
                ->editColumn('description', function ($advertisements) {
                    return'<td>'. $advertisements->description[lang()] .'</td>';
                })
                ->editColumn('category_id', function ($advertisements) {
                    return'<td>'. $advertisements->category->category_name[lang()] .'</td>';
                })
                ->editColumn('service_id', function ($advertisements) {
                    return'<td>'. $advertisements->service->service_name[lang()] .'</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.advertisements.index');
        }
    }

    public function create()
    {
        $data['categories'] = Category::all();
        $data['services'] = Service::all();
        return view('admin.advertisements.parts.create', compact('data'));
    }

    public function store(StoreAdvertisement $request)
    {
        $inputs = $request->all();

        if ($request->has('image')) {
            $inputs['image'] = $this->saveImage($request->image, 'uploads/advertisements/images', 'photo');
        }
        if ($request->has('background_image')) {
            $inputs['background_image'] = $this->saveImage($request->background_image, 'uploads/advertisements/background_image', 'photo');
        }
        if (Advertisement::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function edit(Advertisement $advertisement)
    {
        $data['categories'] = Category::all();
        $data['services'] = Service::all();
        return view('admin.advertisements.parts.edit', compact('advertisement', 'data'));
    }

    public function update(Request $request, Advertisement $advertisement)
    {

        $inputs = $request->all();

        if ($request->has('image')) {
            if (file_exists($advertisement->image)) {
                unlink($advertisement->image);
            }
            $inputs['image'] = $this->saveImage($request->image, 'uploads/advertisements/images','photo');
        }

        if ($request->has('background_image')) {
            if (file_exists($advertisement->background_image)) {
                unlink($advertisement->background_image);
            }
            $inputs['background_image'] = $this->saveImage($request->background_image, 'uploads/advertisements/background_image','photo');
        }

        if ($advertisement->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function destroy(Request $request)
    {
        $advertisement = Advertisement::where('id', $request->id)->firstOrFail();
        $advertisement->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


}
