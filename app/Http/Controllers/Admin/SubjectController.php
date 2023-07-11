<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\Group;
use App\Models\Unit;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\DataTables;
use App\Models\Subject;

class SubjectController extends Controller
{

    // index start
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
                ->editColumn('unit_id', function ($subjects) {
                    return '<td>'. $subjects->unit->unit_name .'</td>';
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


    public function create()
    {
        $data['groups'] = Group::all();
        $data['units'] = Unit::query()
            ->select('id','unit_name')
            ->get();

        $data['departments'] = Department::all();
        return view('admin.subjects.parts.create', compact('data'));
    }

    public function store(SubjectRequest $request): JsonResponse
    {
        $data = [
            'subject_name' => ['ar' => $request->subject_name_ar,'en' => $request->subject_name_en,'fr' => $request->subject_name_fr],
           'group_id' => $request->group_id,
           'code' => $request->code,
            'department_id' => $request->department_id,
            'department_branch_id' => $request->department_branch_id,
            'unit_id' => $request->unit_id,
        ];

        if (Subject::create($data)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function edit(Subject $subject)
    {
        $data['groups'] = Group::all();
        $data['departments'] = Department::all();
        $data['units'] = Unit::query()
            ->select('id','unit_name')
            ->get();
        return view('admin.subjects.parts.edit', compact('subject', 'data'));
    }


    public function update(SubjectRequest $request, Subject $subject): JsonResponse
    {

        $data = [
            'subject_name' => ['ar' => $request->subject_name_ar, 'en' => $request->subject_name_en, 'fr' => $request->subject_name_fr],
            'group_id' => $request->group_id,
            'code' => $request->code,
            'department_id' => $request->department_id,
            'department_branch_id' => $request->department_branch_id,
            'unit_id' => $request->unit_id,
        ];


        if ($subject->update($data)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }



    public function destroy(Request $request)
    {
        $subjects = Subject::where('id', $request->id)->firstOrFail();
        $subjects->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


}
