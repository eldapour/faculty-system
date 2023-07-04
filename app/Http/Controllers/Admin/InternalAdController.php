<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\InternalAd;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreInternalAd;

class InternalAdController extends Controller
{

    public function index(request $request)
    {
        if ($request->ajax()) {
            $internal_ads = InternalAd::get();
            return Datatables::of($internal_ads)
                ->addColumn('action', function ($internal_ads) {
                    return '
                            <button type="button" data-id="' . $internal_ads->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $internal_ads->id . '" data-title="' . $internal_ads->title[lang()] . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('title', function ($internal_ads) {
                    return '<td>' . $internal_ads->title[lang()] . '</td>';
                })
                ->editColumn('description', function ($internal_ads) {
                    return '<td>' . $internal_ads->description[lang()] . '</td>';
                })
                ->editColumn('service_id', function ($internal_ads) {
                    return '<td>' . $internal_ads->service->service_name[lang()] . '</td>';
                })
                ->addColumn('status', function ($internal_ads) {
                    return '<input class="tgl tgl-ios like_active" data-id="' . $internal_ads->id . '" name="like_active" id="like-' . $internal_ads->id . '" type="checkbox" ' . ($internal_ads->status == "show" ? 'checked' : 'unchecked') . '/>
                    <label class="tgl-btn" dir="ltr" for="like-' . $internal_ads->id . '"></label>';
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.internal_ads.index');
        }
    }

    // internal ads students start

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
                ->editColumn('title', function($internal_ads) {
                    return '<td>'. $internal_ads->getTranslation('title', app()->getLocale()) .'</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.internal_ads.internal_ads_student.index')->with('internal_ads');
        }
    }

    // internal ads students end

    public function editInternalStudent($id)
    {
        $internal_ads = InternalAd::findOrFail($id);
        return view('admin.internal_ads.parts_students.edit', compact('internal_ads'));
    }

    public function create()
    {
        $data['services'] = Service::get();
        return view('admin.internal_ads.parts.create', compact('data'));
    }


    public function store(StoreInternalAd $request): JsonResponse
    {
        $inputs = $request->all();
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


    public function update(Request $request, InternalAd $internalAd)
    {
        if ($internalAd->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }



    public function destroy(Request $request)
    {
        $internal_ads = InternalAd::where('id', $request->id)->firstOrFail();
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
    }

    // Function End
}
