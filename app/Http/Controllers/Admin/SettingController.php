<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Requests\StoreSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index(request $request)
    {
        if ($request->ajax()) {
            $settings = Setting::get();
            return Datatables::of($settings)
                ->addColumn('action', function ($settings) {
                    return '
                            <button type="button" data-id="' . $settings->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $settings->id . '" data-title="' . $settings->name_en . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('setting_name', function ($settings) {
                    return '<td>'. $settings->setting_name .'</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.settings.index');
        }
    }

    public function create()
    {
        return view('admin.settings.parts.create');
    }

    public function store(StoreSetting $request): JsonResponse
    {
       $inputs = $request->all();
        if (Setting::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(Setting $setting)
    {
        return view('admin.settings.parts.edit', compact('setting'));
    }


    public function update(Request $request, Setting $setting): JsonResponse
    {

        if ($setting->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function destroy(Request $request)
    {
        $Settings = Setting::where('id', $request->id)->firstOrFail();
        $Settings->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

}
