<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\ProcessDegree;
use Yajra\DataTables\DataTables;
use App\Models\SubjectUnitDoctor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProcessDegreeRequest;

class ProcessDegreeController extends Controller
{
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $process_degrees = ProcessDegree::get();
            return Datatables::of($process_degrees)
                ->addColumn('action', function ($process_degrees) {
                    return '
                            <button type="button" data-id="' . $process_degrees->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $process_degrees->id . '" data-title="' . $process_degrees->user . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('user_id', function () {
                    return '<td>' . auth()->user()->first_name . '</td>';
                })
                ->editColumn('request_status', function ($process_degrees) {
                    if ($process_degrees->request_status == 'new') {
                        return '<td>' . trans('admin.new') . '</td>';
                    }
                    if ($process_degrees->request_status == 'accept') {
                        return '<td>' . trans('admin.accept') . '</td>';
                    }
                    if ($process_degrees->request_status == 'refused') {
                        return '<td>' . trans('admin.refused') . '</td>';
                    }
                    if ($process_degrees->request_status == 'under_processing') {
                        return '<td>' . trans('admin.under_processing') . '</td>';
                    }
                })
                ->addColumn('subject', function ($process_degrees) {
                    return '<td>' . @$process_degrees->subject->subject_name . '</td>';
                })
                ->addColumn('doctor', function ($process_degrees) {
                    return '<td>' . @$process_degrees->doctor->first_name . '</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.process_degrees.index');
        }
    }
    // Index End

    // index Student
    public function processDegreeStudent(request $request)
    {
        if ($request->ajax()) {
            $process_degree_students = ProcessDegree::query()
                ->where('user_id', '=', Auth::id())
                ->get();

            return Datatables::of($process_degree_students)
                ->addColumn('action', function ($process_degree_students) {
                    return '

                             <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' .  $process_degree_students->id . '" data-title="'. $process_degree_students->user .'">
                                    <i class="fas fa-trash"></i>
                                ' . trans("admin.delete") . '

                            </button>
                       ';
                })
                ->editColumn('user_id', function () {
                    return '<td>' . auth()->user()->first_name . '</td>';
                })
                ->addColumn('subject', function ($process_degrees) {
                    return '<td>' . @$process_degrees->subject->subject_name . '</td>';
                })
                ->addColumn('doctor', function ($process_degrees) {
                    return '<td>' . @$process_degrees->doctor->first_name . '</td>';
                })
                ->editColumn('request_status', function ($process_degrees) {
                    return '<td><select class="form-control" data-id="' .  $process_degrees->id . '" onchange="updateRequestStatus(this, ' .  $process_degrees->id . ')">
                                <option ' . ($process_degrees->request_status == 'new' ? "selected" : "") . ' value="new">' . trans('admin.new') . '</option>
                                <option ' . ($process_degrees->request_status == 'accept' ? "selected" : "") . ' value="accept">' . trans('admin.accept') . '</option>
                                <option ' . ($process_degrees->request_status == 'refused' ? "selected" : "") . ' value="refused">' . trans('admin.refused') . '</option>
                                <option ' . ($process_degrees->request_status == 'under_processing' ? "selected" : "") . ' value="under_processing">' . trans('admin.under_processing') . '</option>
                            </select></td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.process_degrees.process_degree_students');
        }
    }

    // Create Start
    public function create()
    {
        $data['subjects'] = Subject::all();
        return view('admin.process_degrees.parts.create', compact('data'));
    }
    // Create End

    // Store Start

    public function store(ProcessDegreeRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        if (ProcessDegree::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(ProcessDegree $processDegree)
    {
        $data['students'] = User::where('user_type', 'student')->get();
        $data['subjects'] = Subject::all();
        $data['doctors'] = User::find($processDegree->doctor_id);
        return view('admin.process_degrees.parts.edit', compact('processDegree', 'data'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, ProcessDegree $processDegree)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        if ($processDegree->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $processDegree = ProcessDegree::where('id', $request->id)->firstOrFail();
        $processDegree->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End

    // Get Doctor
    public function getDoctor(Request $request)
    {
        $id = $request->id;
        $doctor = SubjectUnitDoctor::query()->join('users', 'subject_unit_doctors.user_id', '=', 'users.id')
            ->where('subject_id', $id)
            ->pluck('users.first_name', 'subject_unit_doctors.user_id')
            ->toArray();
        if (count($doctor) > 0) {
            return $doctor;
        } else {
            return response()->json(404);
        }
    }
     // Update Request Status
     public function RequestStatusDegree(Request $request)
     {
         $inputs = ProcessDegree::find($request->id)->update([
             'request_status' => $request->status,
         ]);

         return response()->json(['code' => 200,'status'=> $request->status ]);
     }
}
