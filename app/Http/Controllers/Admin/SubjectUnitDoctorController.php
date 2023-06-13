<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use DateTime;
use App\Models\Unit;
use App\Models\User;
use App\Models\Group;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\SubjectStudent;
use Yajra\DataTables\DataTables;
use App\Models\SubjectUnitDoctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectStudentRequest;
use App\Http\Requests\SubjectUnitDoctorRequest;

class SubjectUnitDoctorController extends Controller
{


    public function index(request $request)
    {
        if ($request->ajax()) {
            $subject_unit_doctors = SubjectUnitDoctor::get();
            return Datatables::of($subject_unit_doctors)
                ->addColumn('action', function ($subject_unit_doctors) {
                    return '
                            <button type="button" data-id="' . $subject_unit_doctors->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_unit_doctors->id . '" data-title="' . $subject_unit_doctors->doctor->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('user_id', function ($subject_unit_doctors) {
                    return'<td>'. $subject_unit_doctors->doctor->first_name .'</td>';
                })
                ->editColumn('subject_id', function ($subject_unit_doctors) {
                    return'<td>'. $subject_unit_doctors->subject->subject_name .'</td>';
                })
                ->addColumn('group_id', function ($subject_unit_doctors) {
                    return'<td>'. $subject_unit_doctors->subject->group->group_name .'</td>';
                })
                ->addColumn('unit_id', function ($subject_unit_doctors) {
                    return'<td>'. $subject_unit_doctors->subject->unit->unit_name .'</td>';
                })
                ->editColumn('year', function ($subject_unit_doctors) {
                    $date = new DateTime($subject_unit_doctors->year);
                    return '<td>' . $date->format('Y') . '</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_unit_doctors.index');
        }
    }


    public function create()
    {
        $data['users'] = User::query()
        ->where('user_type', 'doctor')
            ->get();

        $data['subjects'] = Subject::query()
            ->select('id','subject_name')
            ->get();

        $data['groups'] = Group::all();
        $data['units'] = Unit::query()
            ->select('id','unit_name')
            ->get();

        $data['departments'] = Department::query()
            ->select('id','department_name')
            ->get();

        return view('admin.subject_unit_doctors.parts.create', compact('data'));
    }



    public function store(SubjectUnitDoctorRequest $request): JsonResponse
    {
        $inputs = $request->all();

        if (SubjectUnitDoctor::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }



    public function edit(SubjectUnitDoctor $subjectUnitDoctor)
    {
        $data['users'] = User::query()
            ->where('user_type', 'doctor')
            ->get();

        $data['subjects'] = Subject::query()
            ->select('id','subject_name')
            ->get();

        $data['groups'] = Group::all();
        $data['units'] = Unit::query()
            ->select('id','unit_name')
            ->get();

        $data['departments'] = Department::query()
            ->select('id','department_name')
            ->get();


        return view('admin.subject_unit_doctors.parts.edit', compact('subjectUnitDoctor', 'data'));
    }


    public function update(SubjectUnitDoctorRequest $request, SubjectUnitDoctor $subjectUnitDoctor): JsonResponse
    {
        if ($subjectUnitDoctor->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }



    public function destroy(Request $request)
    {
        $subject_unit_doctors = SubjectUnitDoctor::where('id', $request->id)->firstOrFail();
        $subject_unit_doctors->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }



    public function getAllSubjectsOfUnitId(Request $request): \Illuminate\Support\Collection
    {



        return Subject::query()
        ->where('group_id','=', $request->group_id)
        ->where('unit_id','=', $request->unit_id)
        ->where('department_branch_id','=',$request->department_branch_id)
            ->pluck('subject_name', 'id');


    }
}
