<?php

namespace App\Http\Controllers\Manger;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckForbidden;
use App\Models\SubjectExamStudent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubjectExamStudentController extends Controller
{

    public function __construct()
    {
        $this->middleware(CheckForbidden::class);
    }

    public function index(request $request)
    {
        if ($request->ajax()) {

            $subject_exam_students = SubjectExamStudent::query()
                ->where('year', '=', period()->year_start)
                ->get();

            return Datatables::of($subject_exam_students)

                ->addColumn('identifier_id', function ($subject_exam_students) {
                    return  $subject_exam_students->user->identifier_id;
                })
                ->addColumn('exam_code', function ($subject_exam_students) {
                    return  $subject_exam_students->subject_exam->exam_code;
                })
                ->addColumn('code', function ($subject_exams) {

                    return  $subject_exams->subject_exam->subject->subject_name;
                })

                ->editColumn('group_id', function ($subject_exams) {
                    return $subject_exams->subject_exam->group->group_name;

                })

                ->addColumn('user', function ($subject_exams) {
                    return $subject_exams->user->first_name . ' ' . $subject_exams->user->last_name;

                })

                ->addColumn('exam_date', function ($subject_exam_students) {

                    return $subject_exam_students->subject_exam->exam_date;
                })

                ->addColumn('exam_day', function ($subject_exam_students) {

                    return $subject_exam_students->subject_exam->exam_day;
                })


                ->addColumn('time_start', function ($subject_exam_students) {

                    return $subject_exam_students->subject_exam->time_start;
                })

                ->addColumn('time_end', function ($subject_exam_students) {

                    return $subject_exam_students->subject_exam->time_end;
                })


                ->escapeColumns([])
                ->make(true);
        } else {
            return view('manger.subject_exam_students.index');
        }
    }
}
