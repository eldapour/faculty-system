<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DepartmentBranchStudentExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\BranchStudentRequest;
use App\Http\Requests\DepartmentBranchRequest;
use App\Imports\DepartmentBranchStudentImport;
use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\DepartmentBranchStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class DepartmentBranchStudentController extends Controller
{

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
                ->editColumn('department_id', function ($branchStudent) {
                    $department_id = $branchStudent->branch->department_id;
                    $department = Department::where('id', $department_id)
                        ->first();
                    return $department->department_name;

                })
                ->editColumn('branch_restart_register', function ($branchStudent) {
                    return '<input class="tgl tgl-ios like_active" disabled
                     id="like-' . $branchStudent->id . '" type="checkbox" ' .
                        ($branchStudent->branch_restart_register == 1 ? 'checked' : 'unchecked') . '/>
                  <label class="tgl-btn" dir="ltr" for="like-' . $branchStudent->id . '"></label>';
                })
                ->editColumn('identifier_id', function ($branchStudent) {
                    return $branchStudent->student->identifier_id;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.branch_students.index');
        }
    }

    public function create()
    {
        $departments = Department::get();
        $students = User::query()
            ->select('id', 'identifier_id')
            ->where('user_type', 'student')
            ->where('user_status', 'active')
            ->get();

        return view('admin.branch_students.parts.create', compact('departments', 'students'));
    }


    public function store(BranchStudentRequest $request): \Illuminate\Http\JsonResponse
    {
        $inputs = $request->all();

        if (DepartmentBranchStudent::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(DepartmentBranchStudent $userBranch)
    {
        $departments = Department::get();
        $students = User::where('user_type', 'student')->where('user_status', 'active')->get();
        return view('admin.branch_students.parts.edit', compact('students', 'userBranch', 'departments'));
    }


    public function update(BranchStudentRequest $request, DepartmentBranchStudent $userBranch): \Illuminate\Http\JsonResponse
    {
        if ($userBranch->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function destroy(Request $request)
    {
        $branchStudent = DepartmentBranchStudent::where('id', $request->id)->firstOrFail();
        $branchStudent->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


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


    public function exportDepartmentBranchStudent(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new DepartmentBranchStudentExport, 'DepartmentBranchStudent.xlsx');
    }

    public function importDepartmentBranchStudent(Request $request): \Illuminate\Http\JsonResponse
    {
        $import = Excel::import(new DepartmentBranchStudentImport(), $request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    } // end importDepartmentBranchStudent

}
