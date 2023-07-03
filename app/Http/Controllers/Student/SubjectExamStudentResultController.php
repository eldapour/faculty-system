<?php

namespace App\Http\Controllers\Student;
use App\Exports\SubjectExamStudentResultExport;
use App\Imports\SubjectExamStudentResultImport;
use App\Models\Period;
use App\Models\SubjectUnitDoctor;
use App\Models\User;
use App\Models\SubjectExam;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\SubjectExamStudentResult;
use App\Http\Requests\SubjectExamStudentResultRequest;

class SubjectExamStudentResultController extends Controller
{

    public function index(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->where('period','=',$period->period)
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($subject_exam_student_results)

                 ->addColumn('user', function ($subject_exam_student_results) {
                     return $subject_exam_student_results->user->first_name;
                 })
                 ->addColumn('subject_id', function ($subject_exam_student_results) {
                     return $subject_exam_student_results->subject->subject_name ;
                 })
                ->addColumn('identifier_id', function ($subject_exam_student_results) {
                    return  $subject_exam_student_results->user->identifier_id ;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.students.subject_exam_student_results.index');
        }
    }




}
