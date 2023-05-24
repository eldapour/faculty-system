<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
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
                                    data-id="' . $departments->id . '" data-title="' . $departments->department_name[lang()] . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('department_name',function($departments){
                    return $departments->department_name[lang()];
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.department.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        return view('admin.department.parts.create');
    }
    // Create End

    // Store Start

    public function store(DepartmentRequest $request)
    {
        $inputs = $request->all();
        if (Department::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Department $department)
    {
        return view('admin.department.parts.edit', compact('department'));
    }
    // Edit End

    // Update Start

    public function update(DepartmentRequest $request, Department $department)
    {
        if ($department->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $departments = Department::where('id', $request->id)->firstOrFail();
        $departments->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
