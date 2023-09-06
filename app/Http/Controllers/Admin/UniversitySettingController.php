<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UniversitySettingRequest;
use App\Traits\PhotoTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\UniversitySetting;

class UniversitySettingController extends Controller
{

    use PhotoTrait;

    public function index(request $request)
    {
        $university_settings = UniversitySetting::query()
        ->first();

        return view('admin.university_settings.index', compact('university_settings'));
    }

    public function update(UniversitySettingRequest $request, UniversitySetting $universitySetting): JsonResponse
    {

        $inputs = $request->all();

        if ($logo = $request->file('logo')) {

            $destinationPath = 'uploads/university_setting';
            $logoImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $logoImage);
            $request['logo'] = "$logoImage";

            if (file_exists(public_path('uploads/university_setting/'.$universitySetting->logo))) {
                unlink(public_path('uploads/university_setting/'.$universitySetting->logo));
            }
        }


        if ($stamp_logo = $request->file('stamp_logo')) {

            $destinationPath = 'uploads/university_setting';
            $stampLogoImage = date('YmdHis') . "." . $stamp_logo->getClientOriginalExtension();
            $stamp_logo->move($destinationPath, $stampLogoImage);
            $request['stamp_logo'] = "$stampLogoImage";

            if (file_exists(public_path('uploads/university_setting/'.$universitySetting->stamp_logo))) {
                unlink(public_path('uploads/university_setting/'.$universitySetting->stamp_logo));
            }
        }
        if ($universitySetting->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function maintenanceCheck(Request $request): JsonResponse
    {
        $maintenance = UniversitySetting::first();
        $data = $maintenance->update(['maintenance' => $request->check]);
        return response()->json(['status' => 200]);
    }
}
