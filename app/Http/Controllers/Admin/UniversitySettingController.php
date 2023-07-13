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


        $universitySetting->update([
            'email' => $request->email,
            'logo' =>  $request->file('logo') != null ? $logoImage : $universitySetting->logo,
            'stamp_logo' =>  $request->file('stamp_logo') != null ? $stampLogoImage : $universitySetting->stamp_logo,
            "title" => ['ar' => $request->title_ar,'en' => $request->title_en,'fr' => $request->title_fr],
            "description" => ['ar' => $request->description_ar,'en' => $request->description_en,'fr' => $request->description_fr],
            "address" => ['ar' => $request->address_ar,'en' => $request->address_en,'fr' => $request->address_fr],
            'phone' => $request->phone,
            'facebook_link' => $request->facebook_link,
            'whatsapp_link' => $request->whatsapp_link,
            'youtube_link' => $request->youtube_link,
            'digital_student_platform' => route('student.login'),
            'colleges_digital_platform' => $request->colleges_digital_platform,
            'colleges_digital_magazine' => $request->colleges_digital_magazine,

        ]);
        if ($universitySetting->save()) {
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
