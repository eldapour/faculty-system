<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\SubjectExam;
use App\Models\SubjectExamStudent;
use App\Models\SubjectExamStudentResult;
use App\Models\SubjectStudent;
use App\Models\SubjectUnitDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class SubjectExamStudentController extends Controller {


    public function normal(Request $request){

        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $subject_exams = SubjectExam::query()
                ->where('session','=','عاديه')
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($subject_exams)

                ->addColumn('identifier_id', function () {
                    return  Auth::user()->identifier_id;
                })
                ->addColumn('code', function ($subject_exams) {
                    return  $subject_exams->subject->code;
                })
                ->addColumn('group_id', function ($subject_exams) {
                    return $subject_exams->group_id;
                })

                ->addColumn('exam_code', function ($subject_exams) {

                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();

                    return @SubjectExamStudent::query()
                        ->where('session','=','عاديه')
                        ->where('user_id','=',Auth::id())
                        ->where('year','=',$period->year_start)
                        ->where('subject_id','=',$subject_exams->subject_id)
                        ->first()
                        ->exam_code;

                })
                ->addColumn('section', function ($subject_exams) {

                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();

                    return @SubjectExamStudent::query()
                        ->where('session','=','عاديه')
                        ->where('year','=',$period->year_start)
                        ->where('user_id','=',Auth::id())
                        ->where('subject_id','=',$subject_exams->subject_id)
                        ->first()
                        ->section;

                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('student.subject_exam_student.normal');
        }

    }

    public function remedial(Request $request){

        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $subject_exams = SubjectExam::query()
                ->where('session','=','استدراكيه')
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($subject_exams)

                ->addColumn('identifier_id', function () {
                    return  Auth::user()->identifier_id;
                })
                ->addColumn('code', function ($subject_exams) {
                    return  $subject_exams->subject->code;
                })
                ->addColumn('group', function ($subject_exams) {
                    $group_name = @SubjectStudent::where(['user_id'=>$subject_exams->user_id,
                        'subject_id'=>$subject_exams->subject_id
                        ,'year'=>$subject_exams->year])->first()->group;
                    return $group_name ? $group_name->group_name : '';
                })

                ->addColumn('exam_code', function ($subject_exams) {

                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();

                    return @SubjectExamStudent::query()
                        ->where('session','=','استدراكيه')
                        ->where('user_id','=',Auth::id())
                        ->where('year','=',$period->year_start)
                        ->where('subject_id','=',$subject_exams->subject_id)
                        ->first()
                        ->exam_code;

                })
                ->addColumn('section', function ($subject_exams) {

                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();

                    return SubjectExamStudent::query()
                        ->where('session','=','استدراكيه')
                        ->where('year','=',$period->year_start)
                        ->where('user_id','=',Auth::id())
                        ->where('subject_id','=',$subject_exams->subject_id)
                        ->first()
                        ->section;

                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('student.subject_exam_student.remedial');
        }
    }

}
