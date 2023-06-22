<?php

namespace App\Http\Controllers\Admin;

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
                ->addColumn('action', function ($subject_exam_student_results) {
                    return '
                            <button type="button" data-id="' . $subject_exam_student_results->id . '" '. (auth()->user()->user_type == 'student' ? 'hidden' : '') .' class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button '. (auth()->user()->user_type == 'student' ? 'hidden' : '') .' class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exam_student_results->id . '" data-title="' . $subject_exam_student_results->user->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                 ->addColumn('user', function ($subject_exam_student_results) {
                     return '<td>'. @$subject_exam_student_results->user->first_name .'</td>';
                 })
                 ->addColumn('subject_id', function ($subject_exam_student_results) {
                     return '<td>'. $subject_exam_student_results->subject->subject_name .'</td>';
                 })
                ->addColumn('identifier_id', function ($subject_exam_student_results) {
                    return '<td>'. $subject_exam_student_results->user->identifier_id .'</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exam_student_results.index');
        }
    }


    public function create()
    {
        $data['subject_exams'] = SubjectExam::all();

        $period = Period::query()
            ->where('status','=','start')
            ->first();

        $subjectDoctor = SubjectUnitDoctor::query()
            ->where('user_id','=',auth()->id())
            ->where('period','=',$period->period)
            ->where('year','=',$period->year_start)
            ->first();

        $idOfSubjectDoctor = $subjectDoctor->subject_id;

        $data['users'] = User::query()
        ->where('user_type', 'student')
            ->whereHas('subjects', fn(Builder $builder)=>
            $builder->where('subject_id','=',$subjectDoctor->subject_id)
                ->where('period','=',$period->period)
                ->where('year','=',$period->year_start)
            )
            ->get();

        return view('admin.subject_exam_student_results.parts.create', compact('data','idOfSubjectDoctor'));
    }


    public function store(SubjectExamStudentResultRequest $request): JsonResponse
    {
        $inputs = $request->all();
        if (SubjectExamStudentResult::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(SubjectExamStudentResult $subjectExamStudentResult)
    {
        return view('admin.subject_exam_student_results.parts.edit', compact('subjectExamStudentResult'));
    }


    public function update(Request $request, SubjectExamStudentResult $subjectExamStudentResult): JsonResponse
    {
        if ($subjectExamStudentResult->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function destroy(Request $request)
    {
        $subjectExamStudentResults = SubjectExamStudentResult::where('id', $request->id)->firstOrFail();
        $subjectExamStudentResults->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end delete


    public function exportSubjectExamStudentResult()
    {
        return Excel::download(new SubjectExamStudentResultExport(), 'SubjectExamStudentResult.xlsx');
    } // end export

    public function importSubjectExamStudentResult(Request $request)
    {
        $import = Excel::import(new SubjectExamStudentResultImport(), $request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    } // end import

}
