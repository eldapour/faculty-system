<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CertificateExport;
use App\Http\Controllers\Controller;
use App\Imports\CertificateImport;
use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class CertificateController extends Controller
{
    public function index(request $request)
    {
        if ($request->ajax()) {
            $certificates = Certificate::query()
            ->get();

            return Datatables::of($certificates)
                ->addColumn('action', function ($certificates) {
                    return '
                            <button type="button" data-id="' . $certificates->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>

                       ';
                })
                ->editColumn('diploma_name', function ($certificates) {
                    return $certificates->getTranslation('diploma_name', app()->getLocale());
                })
                ->editColumn('created_at', function ($admins) {
                    return $admins->created_at->diffForHumans();
                })
                ->editColumn('user_id', function ($certificates) {
                    return $certificates->user->first_name  .' ' . $certificates->user->last_name;
                })
                ->addColumn('identifier_id', function ($certificates) {

                    return $certificates->user->identifier_id;

                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.certificates.index');
        }
    }

    public function create()
    {
        $users = User::query()
            ->select('id','identifier_id','first_name','last_name')
            ->where('user_type','=','student')
            ->get();


        return view('admin.certificates.parts.create',compact('users'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'diploma_name_ar' => 'required',
            'diploma_name_en' => 'required',
            'diploma_name_fr' => 'required',
            'user_id' => 'required|exists:users,id',
            'year' => 'required|date_format:Y',
            'validation_year' => 'required|date_format:Y',

        ]);

        $certificate = Certificate::create([

            'diploma_name' => ['ar' => $request->diploma_name_ar ,'en' => $request->diploma_name_en ,'fr' => $request->diploma_name_fr],
            'validation_year' => $request->validation_year,
            'year' => $request->year,
            'user_id' => $request->user_id
        ]);

        if ($certificate->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.parts.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {

        $request->validate([
            'diploma_name_ar' => 'required',
            'diploma_name_en' => 'required',
            'diploma_name_fr' => 'required',
            'year' => 'required|date_format:Y',
            'validation_year' => 'required|date_format:Y',
        ]);

        $certificate->update([

            'diploma_name' => ['ar' => $request->diploma_name_ar ,'en' => $request->diploma_name_en ,'fr' => $request->diploma_name_fr],
            'validation_year' => $request->validation_year,
            'year' => $request->year,
        ]);

        if ($certificate->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function delete(Request $request){

        $certificate = Certificate::query()
        ->where('id', $request->id)
            ->firstOrFail();

        $certificate->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // Delete

    public function exportCertificate()
    {
        return Excel::download(new CertificateExport, 'Certificate.xlsx');
    } // end export

    public function importCertificate(Request $request)
    {
        $import = Excel::import(new CertificateImport(), $request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    } // end question import

}
