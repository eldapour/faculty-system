<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInternalAd;
use App\Models\InternalAd;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class InternalAdController extends Controller
{
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $internal_ads = InternalAd::get();
            return Datatables::of($internal_ads)
                ->addColumn('action', function ($internal_ads) {
                    return '
                            <button type="button" data-id="' . $internal_ads->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $internal_ads->id . '" data-title="' . $internal_ads->name_en . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.internal_ads.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        return view('admin.internal_ads.parts.create');
    }
    // Create End

    // Store Start

    public function store(StoreInternalAd $request)
    {
        $inputs = $request->all();
        if (InternalAd::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(InternalAd $internalAd)
    {
        return view('admin.internal_ads.parts.edit', compact('internalAd'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, InternalAd $internalAd)
    {
        if ($internalAd->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $internal_ads = InternalAd::where('id', $request->id)->firstOrFail();
        $internal_ads->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
