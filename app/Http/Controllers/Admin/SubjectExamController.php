<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectExamRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\SubjectExam;
use App\Models\Subject;
use App\Models\Group;

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
                                    data-id="' . $subject_exams->id . '" data-title="' . $subject_exams->id . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('subject_id', function ($subject_unit_doctors) {
                    return'<td>'. $subject_unit_doctors->subject->subject_name .'</td>';
                })
                ->editColumn('group_id', function ($subject_unit_doctors) {
                    return'<td>'. $subject_unit_doctors->group->group_name .'</td>';
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
        $data['subjects'] = Subject::all();
        $data['groups'] = Group::all();
        return view('admin.subject_exams.parts.create', compact('data'));
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
       $data['subjects'] = Subject::all();
       $data['groups'] = Group::all();
        return view('admin.subject_exams.parts.edit', compact('subjectExam', 'data'));
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
}
