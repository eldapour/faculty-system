<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\Group;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Subject;

class SubjectController extends Controller
{
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $subjects = Subject::get();
            return Datatables::of($subjects)
                ->addColumn('action', function ($subjects) {
                    return '
                            <button type="button" data-id="' . $subjects->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subjects->id . '" data-title="' . $subjects->subject_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('subject_name', function ($subjects) {
                    return $subjects->getTranslation('subject_name', app()->getLocale());
                })
                ->editColumn('group_id', function ($subjects) {
                    return '<td>'. $subjects->group->group_name .'</td>';
                })
                ->editColumn('department_id', function ($subjects) {
                    return '<td>'. $subjects->department->department_name .'</td>';
                })
                ->editColumn('department_branch_id', function ($subjects) {
                    return '<td>'. $subjects->department_branch->branch_name .'</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subjects.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        $data['groups'] = Group::all();
        $data['departments'] = Department::all();
        return view('admin.subjects.parts.create', compact('data'));
    }
    // Create End

    // Store Start

    public function store(SubjectRequest $request)
    {
        $inputs = $request->all();
        if (Subject::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Subject $subject)
    {
        $data['groups'] = Group::all();
        $data['departments'] = Department::all();
        return view('admin.subjects.parts.edit', compact('subject', 'data'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, Subject $subject)
    {
        if ($subject->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $subjects = Subject::where('id', $request->id)->firstOrFail();
        $subjects->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
