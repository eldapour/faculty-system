<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\SubjectStudent;
use App\Models\SubjectUnitDoctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class SubjectStudentController extends Controller{


    public function index(Request $request){
        if ($request->ajax()) {
            $period = Period::query()
                ->where('status', '=', 'start')
                ->first();
            $subject_students = SubjectStudent::query()
                ->where('period', '=', $period->period)
                ->where('user_id','=',Auth::id())
                ->where('year','=', $period->year_start)
                ->get();

            return Datatables::of($subject_students)

                ->addColumn('unit_id', function ($subject_exam_students) {
                    return $subject_exam_students->subject->unit->unit_name;
                })
                ->editColumn('subject_id', function ($subject_students) {
                    return $subject_students->subject->subject_name;
                })
                ->addColumn('group_id', function ($subject_students) {
                    return $subject_students->group->group_name;
                })

                ->addColumn('doctor_id', function ($subject_students) {

                    $period = Period::query()
                        ->where('status', '=', 'start')
                        ->first();

                    $doctor = @SubjectUnitDoctor::query()
                    ->where('subject_id','=',$subject_students->subject_id)
                        ->where('group_id','=',$subject_students->group_id)
                        ->where('period', '=', $period->period)
                        ->where('year','=', $period->year_start)
                        ->first()
                        ->doctor;
                    return @$doctor->first_name . " " . @$doctor->last_name;
                })

                ->escapeColumns([])
                ->make(true);
        } else {

            $period = Period::query()
                ->where('status', '=', 'start')
                ->first();

            return view('student.subjects.all', compact('period'));
        }
    }
}
