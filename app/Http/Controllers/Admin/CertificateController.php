<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CertificateExport;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckForbidden;
use App\Imports\CertificateImport;
use App\Models\Certificate;
use App\Models\CertificateType;
use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\DepartmentBranchStudent;
use App\Models\Document;
use App\Models\Period;
use App\Models\SubjectExam;
use App\Models\SubjectExamStudent;
use App\Models\SubjectStudent;
use App\Models\SubjectUnitDoctor;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;


class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckForbidden::class)->except('registeration');
    }
    public function index(request $request){


        if ($request->ajax()) {
            $certificates = Certificate::query()
            ->get();

            return Datatables::of($certificates)
                ->addColumn('action', function ($certificates) {
                    return '
                            <button type="button" data-id="' . $certificates->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>

                       ';
                })
                ->editColumn('certificate_type_id', function ($certificates) {
                    return $certificates->certificateType->name;
                })
                ->editColumn('situation_with_management', function ($certificates) {

                    if($certificates->situation_with_management == 1){

                        return trans('certificate.true');

                    }else{

                        return trans('certificate.false');

                    }
                })
                ->editColumn('situation_with_treasury', function ($certificates) {

                    if($certificates->situation_with_treasury == 1){

                        return trans('certificate.true');

                    }else{

                        return trans('certificate.false');

                    }
                })

                ->editColumn('description_situation_with_management', function ($certificates) {

                    if($certificates->description_situation_with_management != null){

                        return $certificates->getTranslation('description_situation_with_management', app()->getLocale());

                    }else{

                        return trans('admin.no_notes');
                    }
                })

                ->editColumn('description_situation_with_treasury', function ($certificates) {

                    if($certificates->description_situation_with_treasury != null){

                        return $certificates->getTranslation('description_situation_with_treasury', app()->getLocale());

                    }else{
                        return trans('admin.no_notes');

                    }
                })

                ->addColumn('diploma_name', function ($certificates) {

                    if(lang() == 'ar'){

                        return $certificates->certificateType->certificate_type_ar;

                    }elseif (lang() == 'en'){

                        return $certificates->certificateType->certificate_type_en;

                    }else{

                        return $certificates->certificateType->certificate_type_fr;

                    }
                })

                ->addColumn('identifier_id', function ($certificates) {

                    return $certificates->user->identifier_id;

                })
                ->editColumn('user_id',function ($certificates){
                    return $certificates->user->first_name . ' ' . $certificates->user->last_name;
                })
                ->escapeColumns([])
                ->addIndexColumn()
                ->make(true);
        } else {
            return view('admin.certificates.index');
        }
    } // end  index

    public function create()
    {
        $users = User::query()
            ->select('id','identifier_id','first_name','last_name')
            ->where('user_type','=','student')
            ->get();

        $certificate_types = CertificateType::query()
            ->get();

        return view('admin.certificates.parts.create',compact('users','certificate_types'));
    }


    public function store(Request $request): JsonResponse
    {

        $request->validate([
            'certificate_type_id' => 'required|exists:certificate_types,id',
            'user_id'             => 'required|exists:users,id',
            'year'                => 'required|date_format:Y|after_or_equal:1900',
            'validation_year'     => 'required|date_format:Y|after_or_equal:1900',

        ]);

        $certificate = Certificate::create([
            'certificate_type_id' => $request->certificate_type_id,
            'validation_year'     => $request->validation_year,
            'year'                => $request->year,
            'user_id'             => $request->user_id
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

    public function update(Request $request, Certificate $certificate): JsonResponse
    {

        $request->validate([
            'year' => 'required|date_format:Y|after_or_equal:1900',
            'validation_year' => 'required|date_format:Y|after_or_equal:1900',
        ]);

        $certificate->update([

            'description_situation_with_management' => ['ar' => $request->description_situation_with_management_ar ,
                'en' => $request->description_situation_with_management_en ,
                'fr' => $request->description_situation_with_management_fr],

            'description_situation_with_treasury' => ['ar' => $request->description_situation_with_treasury_ar ,
                'en' => $request->description_situation_with_treasury_en ,
                'fr' => $request->description_situation_with_treasury_fr],

            'situation_with_management' => $request->situation_with_management,
            'situation_with_treasury' => $request->situation_with_treasury,
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
    }

    public function exportCertificate(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new CertificateExport, 'Certificate.xlsx');
    }

    public function importCertificate(Request $request): JsonResponse
    {
        $import = Excel::import(new CertificateImport(),$request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    }

    public function registeration(request $request){

        $period = Period::first();

        $data['semesters'] = SubjectStudent::query()
            ->where('user_id','=',auth()->user()->id)
            ->where('year', '>=', $period->year_start)
            ->where('year', '<=', $period->year_end)
            ->with(['subject.unit'])
            ->get();
        $data['user'] = User::findOrFail(auth()->user()->id);
        $data['manager'] = User::where('user_type','=','manger')->first(['first_name','last_name']);

        $data['department'] = DepartmentBranchStudent::where('user_id',auth()->user()->id)
            ->first('department_branch_id');
        $data['department'] = DepartmentBranch::where('id','=',$data['department']->department_branch_id ?? '')
            ->first('department_id');
        $data['department'] = Department::where('id','=',$data['department']->department_id ?? '')
            ->first('department_name');

        return view('admin.certificates.print_certificate',$data);

    } // end regiseration

    public function managerIndex(request $request){


        if ($request->ajax()) {
            $certificates = Certificate::query()
                ->where('situation_with_management' ,'=',0)
                ->Orwhere('situation_with_treasury' ,'=',0)
                ->get();

            return Datatables::of($certificates)
                ->addColumn('action', function ($certificates) {
                    return '
                            <button type="button" data-id="' . $certificates->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>

                       ';
                })
                ->editColumn('certificate_type_id', function ($certificates) {
                    return $certificates->certificateType->name;
                })
                ->editColumn('situation_with_management', function ($certificates) {

                    if($certificates->situation_with_management == 1){

                        return trans('certificate.true');

                    }else{

                        return trans('certificate.false');

                    }
                })
                ->editColumn('situation_with_treasury', function ($certificates) {

                    if($certificates->situation_with_treasury == 1){

                        return trans('certificate.true');

                    }else{

                        return trans('certificate.false');

                    }
                })

                ->editColumn('description_situation_with_management', function ($certificates) {

                    if($certificates->description_situation_with_management != null){

                        return $certificates->getTranslation('description_situation_with_management', app()->getLocale());

                    }else{

                        return trans('admin.no_notes');
                    }
                })

                ->editColumn('description_situation_with_treasury', function ($certificates) {

                    if($certificates->description_situation_with_treasury != null){

                        return $certificates->getTranslation('description_situation_with_treasury', app()->getLocale());

                    }else{
                        return trans('admin.no_notes');

                    }
                })

                ->addColumn('diploma_name', function ($certificates) {

                    if(lang() == 'ar'){

                        return $certificates->certificateType->certificate_type_ar;

                    }elseif (lang() == 'en'){

                        return $certificates->certificateType->certificate_type_en;

                    }else{

                        return $certificates->certificateType->certificate_type_fr;

                    }
                })

                ->addColumn('identifier_id', function ($certificates) {

                    return $certificates->user->identifier_id;

                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.certificates.managerIndex');
        }
    } // end manager index



    public function student_certificate_school_print($request_id)
    {
        $document = Document::find($request_id);
        $user = User::where(['id' => $document->user_id])->first();
//                dd($user);

        $period = Period::query()
            ->where('status', '=', 'start')
            ->first();

        $subject_exams = SubjectExam::query()
            ->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start)
            ->get();

        $subject_ids = SubjectExam::query()
            ->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start)
            ->pluck('subject_id')
            ->toArray();

        $doctor = SubjectUnitDoctor::query()
            ->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start)
            ->whereIn('subject_id', $subject_ids)
            ->first();

        $exam_code = SubjectExamStudent::query()
            ->where('period', '=', $period->period)
            ->where('user_id', '=', Auth::id())
            ->where('year', '=', $period->year_start)
            ->first();

        $section = SubjectExamStudent::query()
            ->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start)
            ->where('user_id', '=', Auth::id())
            ->first();

        return view('admin.certificates.school_certificate', compact([
            'period',
            'subject_exams',
            'doctor',
            'exam_code',
            'section',
            'period',
            'user'
        ]));
    }
}
