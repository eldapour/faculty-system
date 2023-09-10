<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\InternalAd;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreInternalAd;
use App\Http\Middleware\CheckForbidden;
use App\Http\Requests\InternalAdUpdateRequest;

class InternalAdController extends Controller
{
    use PhotoTrait;
    public function __construct()
    {
        $this->middleware(CheckForbidden::class)->except('indexDoctor','detailsDoctor');
    }

    public function index(request $request)
    {
        if ($request->ajax()) {
            $internal_ads = InternalAd::query()
            ->get();

            return Datatables::of($internal_ads)
                ->addColumn('action', function ($internal_ads) {
                    return '
                            <button type="button" data-id="' . $internal_ads->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $internal_ads->id . '" data-title="' . $internal_ads->getTranslation('title', app()->getLocale()) . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('title', function ($internal_ads) {
                    return  $internal_ads->getTranslation('title', app()->getLocale());
                })
                ->editColumn('description', function ($internal_ads) {
                    return $internal_ads->getTranslation('description', app()->getLocale());
                })
                ->editColumn('service_id', function ($internal_ads) {
                    return $internal_ads->service->getTranslation('service_name', app()->getLocale());
                })
                ->addColumn('status', function ($internal_ads) {
                    return '<input class="tgl tgl-ios like_active" data-id="' . $internal_ads->id . '" name="like_active" id="like-' . $internal_ads->id . '" type="checkbox" ' . ($internal_ads->status == "show" ? 'checked' : 'unchecked') . '/>
                    <label class="tgl-btn" dir="ltr" for="like-' . $internal_ads->id . '"></label>';
                })
                ->editColumn('url_ads', function ($internal_ads) {
                    if ($internal_ads->url_ads != null) {
                        return '<a href="' . asset($internal_ads->url_ads) . '" download><button class="btn btn-primary">'.trans('admin.download').'</button></a>';
                    } else {
                        return '<a href="' . asset("uploads/users/default/avatar2.jfif") . '" download>
                                    <img alt="image" class="avatar avatar-md rounded-circle" src="' . asset("uploads/users/default/avatar2.jfif") . '">
                                </a>';
                    }
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.internal_ads.index');
        }
    }


    public function internalAdsStudent(Request $request)
    {
        if ($request->ajax()) {
            $internal_ads = InternalAd::query()
                ->latest()->get();
            return Datatables::of($internal_ads)
                ->addColumn('action', function ($internal_ads) {
                    return '
                    <button type="button" data-id="' . $internal_ads->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                       ';
                })
                ->editColumn('title', function ($internal_ads) {
                    return $internal_ads->getTranslation('title', app()->getLocale());
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.internal_ads.internal_ads_student.index')->with('internal_ads');
        }
    }


    public function editInternalStudent($id)
    {
        $internal_ads = InternalAd::query()
        ->findOrFail($id);
        return view('admin.internal_ads.parts_students.edit', compact('internal_ads'));
    }

    public function create()
    {
        $data['services'] = Service::query()
            ->get();
        return view('admin.internal_ads.parts.create', compact('data'));
    }


    public function store(StoreInternalAd $request): JsonResponse
{
    $inputs = $request->all();


    if ($request->hasFile('url_ads')) {
        $file = $request->file('url_ads');
        $inputs['url_ads'] = $this->saveImage($file, 'uploads/internal_ads', 'pdf');
    }
    // dd($inputs);
    if (InternalAd::create($inputs)) {
        return response()->json(['status' => 200]);
    } else {
        return response()->json(['status' => 405]);
    }
}



    public function edit(InternalAd $internalAd)
    {
        $data['services'] = Service::get();
        return view('admin.internal_ads.parts.edit', compact('internalAd', 'data'));
    }


    public function update(InternalAdUpdateRequest $request,InternalAd $internalAd)
    {
        $inputs = $request->all();

        if ($request->hasFile('url_ads')) {
            $file = $request->file('url_ads');
            $inputs['url_ads'] = $this->saveImage($file, 'uploads/internal_ads', 'pdf');
        }

        if ($internalAd->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function destroy(Request $request)
    {
        $internal_ads = InternalAd::query()
        ->where('id', $request->id)
            ->firstOrFail();

        $internal_ads->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


    public function makeActive(Request $request): JsonResponse
    {
        $like = $request->status;
        $internal_ads = InternalAd::findOrFail($request->id);
        $internal_ads->status = $like;
        if ($internal_ads->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }// Function 

    public function indexDoctor()
    {
        $ads = InternalAd::latest()->get();
        return view('admin.internal_ads.internal_ads_doctor.index',compact('ads'));
    }

    public function detailsDoctor($id)
    {
        $ad = InternalAd::findOrFail($id);
        return view('admin.internal_ads.internal_ads_doctor.details',compact('ad'));
    }
}
