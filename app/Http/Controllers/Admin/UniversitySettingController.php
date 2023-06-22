<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UniversitySettingRequest;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\UniversitySetting;

class UniversitySettingController extends Controller
{

    use PhotoTrait;

    // Index Start
    public function index(request $request)
    {
        $university_settings = UniversitySetting::first();
        return view('admin.university_settings.index', compact('university_settings'));
    }
    // Index End

    // Update Start
    public function update(UniversitySettingRequest $request, UniversitySetting $universitySetting)
    {
        $inputs = $request->all();

        if ($request->has('logo')) {
            if (file_exists($universitySetting->logo)) {
                unlink($universitySetting->logo);
            }
            $inputs['logo'] = $this->saveImage($request->logo, 'uploads/university_setting', 'photo');
        }

        if ($universitySetting->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }// Edit End

    /**
     * @param Request $request
     * @return void
     */
    public function maintenanceCheck(Request $request)
    {
        $maintenance = UniversitySetting::first();
        $data = $maintenance->update(['maintenance' => $request->check]);
        return response()->json(['status' => 200]);
    }
}
