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

        if ($request->ajax()) {


            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->where('period','=','عاديه')
                ->where('user_id','=',Auth::id())
                ->where('year','=',period()->year_start)
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


                    $doctor =  @SubjectUnitDoctor::query()
                        ->where('subject_id','=',$subject_exam_student_results->subject_id)
                        ->where('year','=',period()->year_start)
                        ->first()
                        ->doctor;

                    return @$doctor->first_name . " " . @$doctor->last_name;

                })
                ->addColumn('add_request', function ($subject_exam_student_results) {
                    $processing_request = Deadline::query()
                    ->where('deadline_type',1)
                        ->where('deadline_date_start','<=', Carbon::now())
                        ->where('deadline_date_end','>=', Carbon::now())
                        ->where('year','=',period()->year_start)
                        ->where('period','=', period()->period)
                        ->count();

                    $process_degree = ProcessDegree::query()
                        ->where('period','=','عاديه')
                        ->where('user_id','=',Auth::id())
                        ->where('year','=',period()->year_start)
                        ->where('subject_id','=',$subject_exam_student_results->subject_id)
                        ->count();


                    $html = '';
                    if($processing_request > 0){

                        if($process_degree > 0){

                            $html .= '
                            <button type="button" class="btn btn-pill btn-danger"> ' . trans('student_result.add_before_request_button') . '  </button>
                       ';

                        }else{

                            $html .= '
                            <button type="button" data-id="' . $subject_exam_student_results->subject_id . '" class="btn btn-pill btn-info-light add-request"> ' . trans('student_result.add_request_button') . '  </button>
                       ';
                        }

                    } else if($process_degree > 0){

                        $html .= '
                            <button type="button" class="btn btn-pill btn-danger"> ' . trans('student_result.add_before_request_button') . '  </button>
                       ';

                    }else{
                        $html .= '
                            <button type="button" class="btn btn-pill btn-danger"> ' . trans('student_result.cancel_request_button') . '  </button>
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


        if ($request->ajax()) {


            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->where('period','=','استدراكيه')
                ->where('user_id','=',Auth::id())
                ->where('year','=',period()->year_start)
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


                    $doctor =  @SubjectUnitDoctor::query()
                        ->where('subject_id','=',$subject_exam_student_results->subject_id)
                        ->where('year','=',period()->year_start)
                        ->first()
                        ->doctor;

                    return @$doctor->first_name . " " . @$doctor->last_name;

                })
                ->addColumn('add_request', function ($subject_exam_student_results) {
                    $processing_request = Deadline::query()
                        ->where('deadline_type',1)
                        ->where('deadline_date_start','<=', Carbon::now())
                        ->where('deadline_date_end','>=', Carbon::now())
                        ->where('year','=',period()->year_start)
                        ->where('period','=', period()->period)
                        ->count();

                    $process_degree = ProcessDegree::query()
                        ->where('period','=','استدراكيه')
                        ->where('user_id','=',Auth::id())
                        ->where('year','=',period()->year_start)
                        ->where('subject_id','=',$subject_exam_student_results->subject_id)
                        ->count();


                    $html = '';
                    if($processing_request > 0){

                        if( $process_degree > 0){

                            $html .= '
                            <button type="button" class="btn btn-pill btn-danger"> ' . trans('student_result.add_before_request_button') . '  </button>
                       ';

                        }else{

                            $html .= '
                            <button type="button" data-id="' . $subject_exam_student_results->subject_id . '" class="btn btn-pill btn-info-light add-request"> ' . trans('student_result.add_request_button') . '  </button>
                       ';
                        }

                    }else{
                        $html .= '
                            <button type="button" class="btn btn-pill btn-danger"> ' . trans('student_result.cancel_request_button') . '  </button>
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
