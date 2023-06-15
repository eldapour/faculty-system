<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Models\Group;
use App\Models\Subject;
use App\Models\SubjectStudent;
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
                            <button '. (auth()->user()->user_type == 'student' ? 'hidden' : '') .' type="button" data-id="' . $subject_exam_students->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button '. (auth()->user()->user_type == 'student' ? 'hidden' : '') .' class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exam_students->id . '" data-title="'. $subject_exam_students->subject->subject_name .'">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('subject_id', function ($subject_exam_students) {
                    return '<td>' . $subject_exam_students->subject->subject_name . '</td>';
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
        $data['users'] = User::get();
        $data['groups'] = Group::get();
        $data['departments'] = Department::get();
        $group_ids = Group::pluck('id')->toArray();
        $data['subject_exams'] = SubjectExam::whereIn('group_id', $group_ids)->get();
        return view('admin.subject_exam_students.parts.create')->with($data);
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
        $data['groups'] = Group::get();
        $data['departments'] = Department::get();
        $group_ids = Group::pluck('id')->toArray();
        $subjects = Subject::find($subjectExamStudent->subject_id);
        $user = User::find($subjectExamStudent->user_id);
        return view('admin.subject_exam_students.parts.edit', compact('subjectExamStudent', 'subjects', 'user'))->with($data);
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

    public function getStudent(Request $request)
    {
        $user_ids = SubjectStudent::where('group_id', '=', $request->group_id)
            ->where('subject_id', '=', $request->subject_id)->pluck('user_id')->toArray();
        $users = User::whereIn('id', $user_ids)->pluck('identifier_id', 'id')->toArray();

        if (count($users) > 0) {
            return $users;
        } else {
            return response()->json(404);
        }
    }

    public function getSubject(Request $request)
    {
        $subjects = Subject::where('group_id', '=', $request->id)
            ->pluck('subject_name', 'id')
            ->toArray();

        if (count($subjects) > 0) {
            return $subjects;
        } else {
            return response()->json(404);
        }
    }
}
