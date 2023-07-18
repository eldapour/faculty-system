<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\DepartmentBranchStudent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    public function index(request $request)
    {
        if ($request->ajax()) {
            $departments = Department::get();
            return Datatables::of($departments)
                ->addColumn('action', function ($departments) {
                    return '
                            <button type="button" data-id="' . $departments->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $departments->id . '" data-title="' . $departments->getTranslation('department_name', app()->getLocale()) . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('department_name',function($departments){
                    return $departments->getTranslation('department_name', app()->getLocale());
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.department.index');
        }
    }


    public function create()
    {
        return view('admin.department.parts.create');
    }


    public function store(DepartmentRequest $request): JsonResponse
    {

        $department =  Department::create([
            'department_name' => ['ar' => $request->department_name_ar,'en' => $request->department_name_en,'fr' => $request->department_name_fr],
            'department_code' => $request->department_code,
        ]);
        if ($department->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(Department $department)
    {
        return view('admin.department.parts.edit', compact('department'));
    }


    public function update(DepartmentRequest $request, Department $department): JsonResponse
    {

        $department->update([

            'department_name' => ['ar' => $request->department_name_ar,'en' => $request->department_name_en,'fr' => $request->department_name_fr],
            'department_code' => $request->department_code,

        ]);
        if ($department->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    } // end update


    public function destroy(Request $request)
    {
        $departments = Department::where('id', $request->id)->firstOrFail();
        $departments->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end delete

    public function departmentStudent()
    {
            $departments = DB::table('department_branch_students')
            ->join('department_branches', 'department_branches.id', '=', 'department_branch_students.department_branch_id')
            ->join('departments', 'departments.id', '=', 'department_branches.department_id')
            ->select("departments.department_name->".lang()." as name",DB::raw('COUNT(department_branch_students.id) as student_count'))
            ->groupBy('departments.id')
            ->get();

            return view('admin.department.departmentStudent',compact('departments'));
    } // departmentStudent

}
