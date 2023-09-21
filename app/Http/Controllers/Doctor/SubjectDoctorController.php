<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckForbidden;
use App\Models\SubjectUnitDoctor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubjectDoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckForbidden::class);
    }


    public function index(request $request)
    {
        if ($request->ajax()) {

            $subject_unit_doctors = SubjectUnitDoctor::query()
                ->where('period', '=', period()->period)
                ->where('year', '=', period()->year_start)
                ->where('user_id','=',auth()->id())
                ->get();

            return Datatables::of($subject_unit_doctors)

                ->editColumn('subject_id', function ($subject_unit_doctors) {
                    return  $subject_unit_doctors->subject->subject_name ;
                })

                ->addColumn('code', function ($subject_unit_doctors) {
                    return  $subject_unit_doctors->subject->code ;
                })
                ->addColumn('unit_id', function ($subject_unit_doctors) {
                    return  $subject_unit_doctors->subject->unit->unit_name ;
                })


                ->addColumn('department_id', function ($subject_unit_doctors) {
                    return  $subject_unit_doctors->subject->department->department_name ;
                })


                ->addColumn('department_branch_id', function ($subject_unit_doctors) {
                    return  $subject_unit_doctors->subject->department_branch->branch_name ;

                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('doctor.subjects.index');
        }
    }
}
