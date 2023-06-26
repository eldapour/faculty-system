<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentBranchRequest;
use App\Models\Department;
use App\Models\DepartmentBranch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentBranchController extends Controller
{
    public function index(request $request)
    {
        if ($request->ajax()) {
            $branches = DepartmentBranch::get();
            return Datatables::of($branches)
                ->addColumn('action', function ($branches) {
                    return '
                            <button type="button" data-id="' . $branches->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $branches->id . '" data-title="' . $branches->getTranslation('branch_name', app()->getLocale()) . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('branch_name',function($branches){
                    return $branches->getTranslation('branch_name', app()->getLocale());
                })
                ->editColumn('department_id',function($branches){
                    return $branches->department->getTranslation('department_name', app()->getLocale());
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.branches.index');
        }
    }

    public function create()
    {
        $departments = Department::query()
            ->select('id','department_name')
            ->get();

        return view('admin.branches.parts.create',compact('departments'));
    }


    public function store(DepartmentBranchRequest $request): JsonResponse
    {
        $data = [

           'branch_name' => ['ar' => $request->branch_name_ar,
               'en' => $request->branch_name_en,
               'fr' => $request->branch_name_fr],
            'department_id' => $request->department_id,
            'department_branch_code' => $request->department_branch_code,


        ];

        if (DepartmentBranch::create($data)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(DepartmentBranch $branch)
    {
        $departments = Department::get();
        return view('admin.branches.parts.edit', compact('branch','departments'));
    }


    public function update(DepartmentBranchRequest $request, DepartmentBranch $branch): JsonResponse
    {

        $data = [

            'branch_name' => ['ar' => $request->branch_name_ar,
                'en' => $request->branch_name_en,
                'fr' => $request->branch_name_fr],
            'department_id' => $request->department_id,
            'department_branch_code' => $request->department_branch_code,

        ];
        if ($branch->update($data)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }



    public function destroy(Request $request)
    {
        $branch = DepartmentBranch::where('id', $request->id)->firstOrFail();
        $branch->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

}
