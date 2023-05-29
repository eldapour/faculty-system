<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\SubjectExam;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\SubjectExamStudent;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectExamStudentRequest;

class SubjectExamStudentController extends Controller
{
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $subject_exam_students = SubjectExamStudent::get();
            return Datatables::of($subject_exam_students)
                ->addColumn('action', function ($subject_exam_students) {
                    return '
                            <button type="button" data-id="' . $subject_exam_students->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exam_students->id . '" data-title="' . $subject_exam_students->id . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('subject_exam_id', function ($subject_exam_students) {
                    return '<td>' . $subject_exam_students->subjectExam->subject->subject_name . '</td>';
                })
                ->editColumn('user_id', function ($subject_exam_students) {
                    return '<td>' . $subject_exam_students->user->first_name . '</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exam_students.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        $data['users'] = User::all();
        $data['subject_exams'] = SubjectExam::all();
        return view('admin.subject_exam_students.parts.create', compact('data'));
    }
    // Create End

    // Store Start

    public function store(Request $request)
    {
        $inputs = $request->all();

        if (SubjectExamStudent::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(SubjectExamStudent $subjectExamStudent)
    {
        $data['users'] = User::all();
        $data['subject_exams'] = SubjectExam::all();
        return view('admin.subject_exam_students.parts.edit', compact('subjectExamStudent', 'data'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, SubjectExamStudent $subjectExamStudent)
    {
        if ($subjectExamStudent->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $subject_exam_student = SubjectExamStudent::where('id', $request->id)->firstOrFail();
        $subject_exam_student->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
