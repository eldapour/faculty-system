<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Department;
use App\Models\SubjectExam;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectExamRequest;
use App\Models\DepartmentBranch;

class SubjectExamController extends Controller
{
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $subject_exams = SubjectExam::get();
            return Datatables::of($subject_exams)
                ->addColumn('action', function ($subject_exams) {
                    return '
                            <button type="button" data-id="' . $subject_exams->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exams->id . '" data-title="' . $subject_exams->subject->subject_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('subject_id', function ($subject_exams) {
                    return '<td>' . $subject_exams->subject->subject_name . '</td>';
                })
                ->editColumn('group_id', function ($subject_exams) {
                    return '<td>' . $subject_exams->group->group_name . '</td>';
                })
                ->editColumn('exam_day', function ($subject_exams) {
                    $date = new DateTime($subject_exams->exam_day);
                    return '<td>' . $date->format('l') . '</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exams.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        $groups = Group::query()
            ->select('id', 'group_name')
            ->get();
            $departments = Department::query()
            ->select('id','department_name')
            ->get();
        return view('admin.subject_exams.parts.create', compact('departments', 'groups'));
    }
    // Create End

    // Store Start

    public function store(SubjectExamRequest $request)
    {
        $inputs = $request->all();

        if (SubjectExam::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(SubjectExam $subjectExam)
    {
        $groups = Group::query()
            ->select('id', 'group_name')
            ->get();
            $departments = Department::query()
            ->select('id','department_name')
            ->get();
            $branches = DepartmentBranch::find($subjectExam->department_branch_id);
            $subjects = Subject::find($subjectExam->subject_id);
        return view('admin.subject_exams.parts.edit', compact('subjectExam', 'groups', 'departments', 'subjects', 'branches'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, SubjectExam $subjectExam)
    {
        if ($subjectExam->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $subject_exam = SubjectExam::where('id', $request->id)->firstOrFail();
        $subject_exam->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End

    // Get Subject
    public function getSubject(Request $request)
{
    $department_id = $request->department_id;
    $group_id = $request->group_id;

    $subjects = Subject::query()
        ->where('department_id', $department_id)
        ->when($group_id, function ($query) use ($group_id) {
            return $query->where('group_id', $group_id);
        })
        ->get()
        ->pluck('subject_name', 'id')
        ->toArray();

    if (count($subjects) > 0) {
        return $subjects;
    } else {
        return response()->json(404);
    }
}

}
