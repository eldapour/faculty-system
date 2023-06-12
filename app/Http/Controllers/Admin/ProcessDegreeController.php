<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Period;
use App\Models\Subject;
use App\Models\ProcessExam;
use Illuminate\Http\Request;
use App\Models\ProcessDegree;
use Yajra\DataTables\DataTables;
use App\Models\SubjectUnitDoctor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SubjectExamStudentResult;
use App\Http\Requests\ProcessDegreeRequest;

class ProcessDegreeController extends Controller
{
    // Index Start
    public function index(Request $request)
    {
        $degree_old = [];
        $process_degrees = ProcessDegree::get();
        foreach ($process_degrees as $degree) {
            if ($degree->request_status == 'accept') {
                $degree_old = SubjectExamStudentResult::select('id', 'student_degree', 'exam_degree')->where('user_id', $degree->user_id)
                    ->where('year', $degree->year)
                    ->where('period', $degree->period)
                    ->where('subject_id', $degree->subject_id)
                    ->first();
            }
            if ($request->ajax()) {
                // dd($degree_old);

                return Datatables::of($process_degrees)
                    ->addColumn('action', function ($process_degrees) {
                        return '
                        <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                data-id="' . $process_degrees->id . '" data-title="' . $process_degrees->user . '">
                                <i class="fas fa-trash"></i>
                        </button>
                   ';
                    })
                    ->addColumn('user_id', function () {
                        return '<td>' . auth()->user()->first_name . '</td>';
                    })
                    ->addColumn('request_status', function ($process_degrees) {
                        return '<select class="form-control" data-id="' . $process_degrees->id . '" onchange="updateRequestStatus(this, ' . $process_degrees->id . ')">
                <option ' . ($process_degrees->request_status == 'new' ? "selected" : "") . ' value="new">' . trans('admin.new') . '</option>
                <option ' . ($process_degrees->request_status == 'accept' ? "selected" : "") . ' value="accept">' . trans('admin.accept') . '</option>
                <option ' . ($process_degrees->request_status == 'refused' ? "selected" : "") . ' value="refused">' . trans('admin.refused') . '</option>
                <option ' . ($process_degrees->request_status == 'under_processing' ? "selected" : "") . ' value="under_processing">' . trans('admin.under_processing') . '</option>
            </select>';
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
                return view('admin.process_degrees.index', compact('degree_old'));
            }
        }
    }


    // index Student
    public function processDegreeStudent(Request $request)
    {
        $period = Period::query()
                ->where('status', '=', 'start')
                ->first();
        $process_degree_students = ProcessDegree::query()
                ->where('user_id', '=', Auth::id())
                ->where('period', '=', $period->period)
                ->where('year', '=', $period->year_start)
                ->get();
        if ($request->ajax()) {
            return Datatables::of($process_degree_students)
            ->addColumn('action', function ($process_degree_students) {
                return '
                <button type="button" data-id="' . $process_degree_students->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                        data-id="' . $process_degree_students->id . '" data-title="' . $process_degree_students->user . '">
                        <i class="fas fa-trash"></i>
                </button>
           ';
            })
            ->addColumn('subject', function ($process_degree_students) {
                return '<td>' . @$process_degree_students->subject->subject_name . '</td>';
            })
            ->addColumn('doctor', function ($process_degree_students) {
                return '<td>' . @$process_degree_students->doctor->first_name . '</td>';
            })
            ->editColumn('period', function ($process_degree_students) {
                return '<td>' . @$process_degree_students->period . '</td>';
            })
            ->editColumn('year', function ($process_degree_students) {
                return '<td>' . @$process_degree_students->year . '</td>';
            })
            ->editColumn('section', function ($process_degree_students) {
                return '<td>' . @$process_degree_students->section . '</td>';
            })
            ->editColumn('exam_code', function ($process_degree_students) {
                return '<td>' . @$process_degree_students->exam_code . '</td>';
            })
            ->editColumn('request_status', function ($process_degree_students) {
                if ($process_degree_students->request_status == 'new')
                    return '<td><a class="btn btn-primary text-white">' . trans('admin.new') . '<a/></td>';
                if ($process_degree_students->request_status == 'accept')
                    return '<td><a class="btn btn-success text-white">' . trans('admin.accept') . '</a></td>';
                if ($process_degree_students->request_status == 'refused')
                    return '<td><a class="btn btn-danger text-white">' . trans('admin.refused') . '<a/></td>';
                if ($process_degree_students->request_status == 'under_processing')
                    return '<td><a class="btn btn-warning text-white">' . trans('admin.under_processing') . '<a/></td>';
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

        return response()->json(['code' => 200, 'status' => $request->status]);
    }

    public function updateDegree(Request $request)
    {
        $inputs = SubjectExamStudentResult::find($request->id)->update([
            'student_degree' => $request->student_degree,
        ]);

        return response()->json(['code' => 200]);
    }
}
