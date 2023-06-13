<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Models\Unit;
use App\Models\User;
use App\Models\Group;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SubjectStudent;
use Yajra\DataTables\DataTables;
use App\Models\SubjectUnitDoctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectStudentRequest;
use App\Http\Requests\SubjectUnitDoctorRequest;

class SubjectUnitDoctorController extends Controller
{
    // Index Start
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
                ->editColumn('group_id', function ($subject_unit_doctors) {
                    return'<td>'. $subject_unit_doctors->group->group_name .'</td>';
                })
                ->editColumn('unit_id', function ($subject_unit_doctors) {
                    return'<td>'. $subject_unit_doctors->unit->unit_name .'</td>';
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
    // Index End

    // Create Start
    public function create()
    {
        $data['users'] = User::where('user_type', 'doctor')->get();
        $data['subjects'] = Subject::all();
        $data['groups'] = Group::all();
        $data['units'] = Unit::all();
        return view('admin.subject_unit_doctors.parts.create', compact('data'));
    }
    // Create End

    // Store Start

    public function store(SubjectUnitDoctorRequest $request)
    {
        $inputs = $request->all();

        if (SubjectUnitDoctor::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(SubjectUnitDoctor $subjectUnitDoctor)
    {
       $data['users'] = User::all();
       $data['subjects'] = Subject::all();
       $data['groups'] = Group::all();
       $data['units'] = Unit::all();
        return view('admin.subject_unit_doctors.parts.edit', compact('subjectUnitDoctor', 'data'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, SubjectUnitDoctor $subjectUnitDoctor)
    {
        if ($subjectUnitDoctor->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $subject_unit_doctors = SubjectUnitDoctor::where('id', $request->id)->firstOrFail();
        $subject_unit_doctors->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End

    public function getUnit(Request $request)
    {
        $id = $request->id;
        $unit = Subject::query()
        ->where('unit_id', $id)
            ->get()
            ->pluck('subject_name', 'id')
            ->toArray();


        if (count($unit) > 0) {
            return $unit;
        } else {
            return response()->json(404);
        }
    }
}
