<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DepartmentStudentExport;
use App\Http\Controllers\Controller;
use App\Imports\DepartmentStudentImport;
use App\Models\Department;
use App\Models\DepartmentStudent;
use App\Models\Period;
use App\Models\SubjectExam;
use App\Models\SubjectExamStudent;
use App\Models\SubjectUnitDoctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class DepartmentStudentController extends Controller
{
    public function index(request $request)
    {
        if ($request->ajax()) {
            $departmentStudent = DepartmentStudent::query()
                ->get();

            return Datatables::of($departmentStudent)
                ->addColumn('action', function ($departmentStudent) {
                    return '
                            <button type="button" data-id="' . $departmentStudent->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $departmentStudent->id . '" data-title="">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('department_id', function ($departmentStudent) {
                    return $departmentStudent->department->department_name;
                })
                ->editColumn('confirm_request', function ($departmentStudent) {
                    return '<input class="tgl tgl-ios like_active" disabled
                     id="like-' . $departmentStudent->id . '" type="checkbox" ' .
                        ($departmentStudent->confirm_request == 1 ? 'checked' : 'unchecked') . '/>
                  <label class="tgl-btn" dir="ltr" for="like-' . $departmentStudent->id . '"></label>';
                })
                ->editColumn('user_id', function ($departmentStudent) {
                    return $departmentStudent->user->identifier_id;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.department_students.index');
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

        return view('admin.department_students.parts.create', compact('departments', 'students'));
    }


    public function store(Request $request): \Illuminate\Http\JsonResponse
    {

        $request->validate([
            'user_id' => 'required',
            'department_id' => 'required',
            'year' => 'required|after_or_equal:1900',
            'period' => 'required',
            'confirm_request' => 'nullable',
        ]);

        if (DepartmentStudent::create([
            'user_id' => $request->user_id,
            'department_id' => $request->department_id,
            'year' => $request->year,
            'period' => $request->period,
            'confirm_request' => $request->confirm_request,
        ])) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(DepartmentStudent $departmentStudent)
    {
        $departments = Department::get();
        $students = User::where('user_type', 'student')->where('user_status', 'active')->get();
        return view('admin.department_students.parts.edit', compact('students', 'departments','departmentStudent'));
    }


    public function update(Request $request, DepartmentStudent $departmentStudent): \Illuminate\Http\JsonResponse
    {

        $request->validate([
            'user_id' => 'required',
            'department_id' => 'required',
            'year' => 'required|after_or_equal:1900',
            'period' => 'required',
            'confirm_request' => 'nullable',
        ]);

        if ($departmentStudent->update([
            'user_id' => $request->user_id,
            'department_id' => $request->department_id,
            'year' => $request->year,
            'period' => $request->period,
            'confirm_request' => $request->confirm_request,
        ])) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function destroy(Request $request)
    {
        $departmentStudent = DepartmentStudent::where('id', $request->id)->firstOrFail();
        $departmentStudent->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }




    public function exportDepartmentStudents(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new DepartmentStudentExport(), 'DepartmentStudent.xlsx');
    }

    public function importDepartmentStudents(Request $request): \Illuminate\Http\JsonResponse
    {
        $import = Excel::import(new DepartmentStudentImport(), $request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    } // end importDepartmentBranchStudent


}
