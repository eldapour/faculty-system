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




    //new
    public function normal(Request $request){

        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $subject_exam_students = SubjectExamStudent::query()
                ->where('session','=','عاديه')
                ->where('user_id','=',Auth::id())
                ->where('year','=',$period->year_start)
                ->get();


            return Datatables::of($subject_exam_students)

                ->addColumn('identifier_id', function ($subject_exam_students) {
                    return  $subject_exam_students->user->identifier_id;
                })
                ->addColumn('code', function ($subject_exams) {

                    return  $subject_exams->subject->subject_name;
                })

                ->editColumn('group_id', function ($subject_exams) {
                    return $subject_exams->group->group_name;

                })

                ->addColumn('exam_date', function ($subject_exam_students) {

                    return @SubjectExam::query()
                    ->where('subject_id','=',$subject_exam_students->subject_id)
                    ->where('group_id','=',$subject_exam_students->group_id)
                    ->where('session','=',$subject_exam_students->session)
                    ->where('year','=',$subject_exam_students->year)
                    ->first()->exam_date;
                })

                ->addColumn('exam_day', function ($subject_exam_students) {
                    return @SubjectExam::query()
                        ->where('subject_id','=',$subject_exam_students->subject_id)
                        ->where('group_id','=',$subject_exam_students->group_id)
                        ->where('session','=',$subject_exam_students->session)
                        ->where('year','=',$subject_exam_students->year)
                        ->first()->exam_day;
                })


                ->addColumn('time_start', function ($subject_exam_students) {

                    return @SubjectExam::query()
                        ->where('subject_id','=',$subject_exam_students->subject_id)
                        ->where('group_id','=',$subject_exam_students->group_id)
                        ->where('session','=',$subject_exam_students->session)
                        ->where('year','=',$subject_exam_students->year)
                        ->first()->time_start;
                })

                ->addColumn('time_end', function ($subject_exam_students) {

                    return @SubjectExam::query()
                        ->where('subject_id','=',$subject_exam_students->subject_id)
                        ->where('group_id','=',$subject_exam_students->group_id)
                        ->where('session','=',$subject_exam_students->session)
                        ->where('year','=',$subject_exam_students->year)
                        ->first()->time_end;
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

            $subject_exam_students = SubjectExamStudent::query()
                ->where('session','=','استدراكيه')
                ->where('user_id','=',Auth::id())
                ->where('year','=',$period->year_start)
                ->get();


            return Datatables::of($subject_exam_students)

                ->addColumn('identifier_id', function ($subject_exam_students) {
                    return  $subject_exam_students->user->identifier_id;
                })
                ->addColumn('code', function ($subject_exams) {

                    return  $subject_exams->subject->subject_name;
                })

                ->editColumn('group_id', function ($subject_exams) {
                    return $subject_exams->group->group_name;

                })

                ->addColumn('exam_date', function ($subject_exam_students) {

                    return @SubjectExam::query()
                        ->where('subject_id','=',$subject_exam_students->subject_id)
                        ->where('group_id','=',$subject_exam_students->group_id)
                        ->where('session','=',$subject_exam_students->session)
                        ->where('year','=',$subject_exam_students->year)
                        ->first()->exam_date;
                })

                ->addColumn('exam_day', function ($subject_exam_students) {
                    return @SubjectExam::query()
                        ->where('subject_id','=',$subject_exam_students->subject_id)
                        ->where('group_id','=',$subject_exam_students->group_id)
                        ->where('session','=',$subject_exam_students->session)
                        ->where('year','=',$subject_exam_students->year)
                        ->first()->exam_day;
                })


                ->addColumn('time_start', function ($subject_exam_students) {

                    return @SubjectExam::query()
                        ->where('subject_id','=',$subject_exam_students->subject_id)
                        ->where('group_id','=',$subject_exam_students->group_id)
                        ->where('session','=',$subject_exam_students->session)
                        ->where('year','=',$subject_exam_students->year)
                        ->first()->time_start;
                })

                ->addColumn('time_end', function ($subject_exam_students) {

                    return @SubjectExam::query()
                        ->where('subject_id','=',$subject_exam_students->subject_id)
                        ->where('group_id','=',$subject_exam_students->group_id)
                        ->where('session','=',$subject_exam_students->session)
                        ->where('year','=',$subject_exam_students->year)
                        ->first()->time_end;
                })


                ->escapeColumns([])
                ->make(true);
        } else {
            return view('student.subject_exam_student.remedial');
        }
    }

}
