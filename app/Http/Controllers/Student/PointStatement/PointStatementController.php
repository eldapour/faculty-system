<?php

namespace App\Http\Controllers\Student\PointStatement;
use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\PointStatement;
use App\Models\SubjectExam;
use App\Models\SubjectExamStudent;
use App\Models\SubjectUnitDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PointStatementController extends Controller{



    public function pointStatementStudent(Request $request){


        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $pointStatements = PointStatement::query()
                ->where('user_id', '=', auth()->user()->id)
                ->where('course','=',$period->session)
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($pointStatements)


                ->addColumn('identifier_id', function ($pointStatements) {
                    return  $pointStatements->user->identifier_id;
                })
                ->editColumn('user_id', function ($pointStatements) {
                    return  $pointStatements->user->first_name . " " . $pointStatements->user->last_name;
                })
                ->editColumn('element_id', function ($pointStatements) {
                    return  $pointStatements->element->name_ar;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('student.point_statement.all');
        }
    }

}
