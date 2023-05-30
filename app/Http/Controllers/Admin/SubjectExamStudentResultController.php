<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\SubjectExam;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\SubjectExamStudentResult;
use App\Http\Requests\SubjectExamStudentResultRequest;

class SubjectExamStudentResultController extends Controller
{
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $subject_exam_student_results = SubjectExamStudentResult::get();
            return Datatables::of($subject_exam_student_results)
                ->addColumn('action', function ($subject_exam_student_results) {
                    return '
                            <button type="button" data-id="' . $subject_exam_student_results->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exam_student_results->id . '" data-title="' . $subject_exam_student_results->user->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                 ->addColumn('user', function ($subject_exam_student_results) {
                     return '<td>'. @$subject_exam_student_results->user->first_name .'</td>';
                 })
                 ->addColumn('subject_exam', function ($subject_exam_student_results) {
                     return '<td>'. @$subject_exam_student_results->exam->subject->subject_name .'</td>';
                 })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exam_student_results.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        $data['subject_exams'] = SubjectExam::all();
        $data['users'] = User::where('user_type', 'student')->get();
        return view('admin.subject_exam_student_results.parts.create', compact('data'));
    }
    // Create End

    // Store Start

    public function store(SubjectExamStudentResultRequest $request)
    {
        $inputs = $request->all();
        if (SubjectExamStudentResult::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(SubjectExamStudentResult $subjectExamStudentResult)
    {
        $data['subject_exams'] = SubjectExam::all();
        $data['users'] = User::where('user_type', 'student')->get();
        return view('admin.subject_exam_student_results.parts.edit', compact('subjectExamStudentResult', 'data'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, SubjectExamStudentResult $subjectExamStudentResult)
    {
        if ($subjectExamStudentResult->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $subjectExamStudentResults = SubjectExamStudentResult::where('id', $request->id)->firstOrFail();
        $subjectExamStudentResults->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
