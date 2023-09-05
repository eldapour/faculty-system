<?php

namespace App\Http\Controllers\Student;
use App\Models\Deadline;
use App\Models\Period;
use App\Models\ProcessDegree;
use App\Models\SubjectStudent;
use App\Models\SubjectUnitDoctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\SubjectExamStudentResult;

class SubjectExamStudentResultController extends Controller
{

    public function normal(request $request)
    {
        $period = Period::query()
            ->where('status','=','start')
            ->first();

        if ($request->ajax()) {


            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->where('period','=','عاديه')
                ->where('user_id','=',Auth::id())
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($subject_exam_student_results)

                ->editColumn('user_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->first_name . " " . $subject_exam_student_results->user->last_name;
                })

                ->addColumn('identifier_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->identifier_id;
                })
                 ->addColumn('subject_id', function ($subject_exam_student_results) {
                     return $subject_exam_student_results->subject->subject_name;
                 })

                ->addColumn('group_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->group->group_name;
                 })
                ->addColumn('unit_id', function ($subject_exam_student_results) {
                     return @$subject_exam_student_results->subject->unit->unit_code;
                 })

                ->addColumn('doctor', function ($subject_exam_student_results) {
                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();

                    $doctor =  @SubjectUnitDoctor::query()
                        ->where('subject_id','=',$subject_exam_student_results->subject_id)
                        ->where('year','=',$period->year_start)
                        ->first()
                        ->doctor;

                    return @$doctor->first_name . " " . @$doctor->last_name;

                })
                ->addColumn('add_request', function ($subject_exam_student_results) use($period) {
                    $processing_request = Deadline::where('deadline_type','0')->where('deadline_date_start','<=', Carbon::now())->where('deadline_date_end','>=', Carbon::now())->count();
                    // طلب معالجه النتيجه
                    $processing_order = ProcessDegree::where(['period'=>'عاديه','user_id'=>Auth::id(),'year'=>$period->year_start,'subject_id'=>$subject_exam_student_results->subject_id])->count();
//                    dd($processing_order);
                    $html = '';
                    if($processing_request > 0 && $processing_order < 1){
                        $html .= '
                            <button type="button" data-id="' . $subject_exam_student_results->subject_id . '" class="btn btn-pill btn-info-light add-request"> ' . trans('student_result.add_request_button') . '  </button>
                       ';
                    }
                    return $html;
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('student.subject_exam_student_result.normal');
        }
    }


    public function remedial(request $request)
    {
        $period = Period::query()
            ->where('status','=','start')
            ->first();

        if ($request->ajax()) {


            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->where('period','=','استدراكيه')
                ->where('user_id','=',Auth::id())
                ->where('year','=',$period->year_start)
                ->get();
            return Datatables::of($subject_exam_student_results)
                ->editColumn('user_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->first_name . " " . $subject_exam_student_results->user->last_name;
                })
                ->addColumn('identifier_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->identifier_id;
                })
                ->addColumn('subject_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->subject->subject_name;
                })
                ->addColumn('group_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->group->group_name;
                 })
                ->addColumn('unit_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->subject->unit->unit_code;
                })
                ->addColumn('doctor_id', function ($subject_exam_student_results) {
                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();
                    $doctor =  SubjectUnitDoctor::query()
                        ->where('subject_id','=',$subject_exam_student_results->subject_id)
                        ->where('year','=',$period->year_start)
                        ->first();
                    return @$doctor->doctor->first_name . " " . @$doctor->doctor->last_name;
                })
                ->addColumn('add_request', function ($subject_exam_student_results) use ($period)  {
                    $processing_request = Deadline::where('deadline_type','0')->where('deadline_date_start','<=', Carbon::now())->where('deadline_date_end','>=', Carbon::now())->count();
                    // طلب معالجه النتيجه
                    $processing_order = ProcessDegree::where(['period'=>'استدراكيه','user_id'=>Auth::id(),'year'=>$period->year_start,'subject_id'=>$subject_exam_student_results->subject_id])->count();
                    $html = '';
                    if($processing_request > 0 && $processing_order < 1){
                        $html .= '
                            <button type="button" data-id="' . $subject_exam_student_results->id . '" class="btn btn-pill btn-info-light add-request"> ' . trans('student_result.add_request_button') . ' </button>

                       ';
                    }
                   return $html;


                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('student.subject_exam_student_result.remedial');
        }
    }



}
