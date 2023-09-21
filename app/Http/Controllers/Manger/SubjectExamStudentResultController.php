<?php

namespace App\Http\Controllers\Manger;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckForbidden;
use App\Models\SubjectExamStudentResult;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubjectExamStudentResultController extends Controller{

    public function __construct()
    {
        $this->middleware(CheckForbidden::class);
    }


    public function normal(request $request)
    {
        if ($request->ajax()) {

            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->where('period', '=','عاديه')
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
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('manger.subject_exam_student_results.normal');
        }
    }



    public function remedial(request $request)
    {
        if ($request->ajax()) {

            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->where('period', '=','استدراكيه')
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
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('manger.subject_exam_student_results.remedial');
        }
    }
}
