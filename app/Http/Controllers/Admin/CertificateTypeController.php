<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateTypesRequest;
use App\Models\CertificateType;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CertificateTypeController extends Controller
{
    public function index(request $request)
    {
        if ($request->ajax()) {
            $certificate_names = CertificateType::query()
            ->get();
            return Datatables::of($certificate_names)
                ->addColumn('action', function ($certificate_names) {
                    return '
                            <button type="button" data-id="' . $certificate_names->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $certificate_names->id . '" data-title="' . $certificate_names->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->addColumn('name', function ($certificate_names) {

                    if(lang() == 'ar'){
                        return $certificate_names->certificate_type_ar;

                    }elseif (lang() == 'en'){

                        return $certificate_names->certificate_type_en;

                    }else{

                        return $certificate_names->certificate_type_fr;

                    }
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.certificate_types.index');
        }
    }

    public function create()
    {
        return view('admin.certificate_types.parts.create');
    }


    public function store(CertificateTypesRequest $request): JsonResponse
    {

        $certificateType =  CertificateType::create([
            'certificate_type_ar' => $request->certificate_type_ar,
            'certificate_type_en' => $request->certificate_type_en,
            'certificate_type_fr' => $request->certificate_type_fr,
            'code' => $request->code,
        ]);
        if ($certificateType->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(CertificateType $certificateName)
    {
        return view('admin.certificate_types.parts.edit', compact('certificateName'));
    }


    public function update(CertificateTypesRequest $request, CertificateType $certificateName): JsonResponse
    {

        $certificateName->update([
            'certificate_type_ar' => $request->certificate_type_ar,
            'certificate_type_en' => $request->certificate_type_en,
            'certificate_type_fr' => $request->certificate_type_fr,
            'code' => $request->code,
        ]);
        if ($certificateName->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }



    public function destroy(Request $request){

        $certificate_names = CertificateType::where('id', $request->id)->firstOrFail();
        $certificate_names->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }
}
