<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BranchStudentRequest;
use App\Http\Requests\DepartmentBranchRequest;
use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\DepartmentBranchStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentBranchStudentController extends Controller{

    public function index(request $request)
    {
        if ($request->ajax()) {
            $branchStudent = DepartmentBranchStudent::query()
            ->get();

            return Datatables::of($branchStudent)
                ->addColumn('action', function ($branchStudent) {
                    return '
                            <button type="button" data-id="' . $branchStudent->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $branchStudent->id . '" data-title="">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('department_branch_id', function ($branchStudent) {
                    return $branchStudent->branch->getTranslation('branch_name', app()->getLocale());
                })
                ->editColumn('user_id', function ($branchStudent) {
                    return $branchStudent->student->first_name . ' ' . $branchStudent->student->last_name;
                })
                ->editColumn('branch_restart_register', function ($branchStudent) {
                    if ($branchStudent->branch_restart_register == 1) {
                        return '<input class="tgl tgl-ios" id="cb3" type="checkbox" checked disabled/>
                    <label class="tgl-btn" dir="ltr" for="cb3"></label>';
                    } else {
                        return '<input class="tgl tgl-ios" id="cb4" type="checkbox"/>
                    <label class="tgl-btn" dir="ltr" for="cb4"></label>';
                    }
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.branch_students.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        $departments = Department::get();
        $students = User::query()
            ->select('id','identifier_id')
            ->where('user_type','student')
            ->where('user_status','active')
            ->get();

        return view('admin.branch_students.parts.create', compact('departments','students'));
    }
    // Create End

    // Store Start

    public function store(BranchStudentRequest $request)
    {
        $inputs = $request->all();

        if (DepartmentBranchStudent::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(DepartmentBranchStudent $userBranch)
    {
        $departments = Department::get();
        $students = User::where('user_type','student')->where('user_status','active')->get();
        return view('admin.branch_students.parts.edit', compact('students','userBranch', 'departments'));
    }
    // Edit End

    // Update Start

    public function update(BranchStudentRequest $request, DepartmentBranchStudent $userBranch)
    {
        if ($userBranch->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $branchStudent = DepartmentBranchStudent::where('id', $request->id)->firstOrFail();
        $branchStudent->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End

    public function getBranches(Request $request)
    {
        $id = $request->id;
        $branches = DepartmentBranch::query()
        ->where('department_id', $id)
            ->get()
            ->pluck('branch_name', 'id')
            ->toArray();


        if (count($branches) > 0) {
            return $branches;
        } else {
            return response()->json(404);
        }
    }
}
