<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckForbidden;
use App\Models\SubjectExamStudent;
use App\Models\SubjectExamStudentResult;
use App\Models\SubjectUnitDoctor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubjectExamStudentResultController extends Controller{

    public function __construct()
    {
        $this->middleware(CheckForbidden::class);
    }


    public function index(request $request)
    {
        if ($request->ajax()) {

            $subject_ids = SubjectUnitDoctor::query()
                ->where('period', '=', period()->period)
                ->where('year', '=', period()->year_start)
                ->where('user_id','=',auth()->id())
                ->pluck('subject_id')
                ->toArray();


            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->whereIn('subject_id',$subject_ids)
                ->where('year', '=', period()->year_start)
                ->get();

            return Datatables::of($subject_exam_student_results)

                ->editColumn('user_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->first_name . ' ' . $subject_exam_student_results->user->last_name;
                })


                ->addColumn('group_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->group->group_name;
                })
                ->editColumn('subject_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->subject->subject_name;
                })
                ->addColumn('identifier_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->identifier_id;
                })

                ->addColumn('exam_number', function ($subject_exam_student_results) {

                    return @SubjectExamStudent::query()
                        ->where('year','=',period()->year_start)
                        ->where('period','=',period()->period)
                        ->with('subject_exam')
                        ->whereHas('subject_exam', fn(Builder $builder) =>

                        $builder->where('subject_id', '=', $subject_exam_student_results->subject_id))
                        ->first()->exam_number;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('doctor.subject_exam_student_result.get_all_subject_exam_student_results');
        }
    }

}
