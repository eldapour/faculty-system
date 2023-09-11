<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProcessDegreeExport;
use App\Imports\ProcessDegreeImport;
use App\Models\User;
use App\Models\Period;
use App\Models\Subject;
use App\Models\ProcessExam;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\ProcessDegree;
use Yajra\DataTables\DataTables;
use App\Models\SubjectUnitDoctor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SubjectExamStudentResult;
use App\Http\Requests\ProcessDegreeRequest;
use Maatwebsite\Excel\Facades\Excel;

class ProcessDegreeController extends Controller
{
    public function index(Request $request)
    {
        $process_degrees = ProcessDegree::get();

        if ($request->ajax()) {
            return Datatables::of($process_degrees)
                ->addColumn('action', function ($process_degrees) {
                    return '<button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal" data-id="' .
                        $process_degrees->id .
                        '" data-title="' .
                        $process_degrees->user .
                        '">
                        <i class="fas fa-trash"></i>
                    </button>';
                })
                ->addColumn('user_id', function () {
                    return '<td>' . auth()->user()->first_name . '</td>';
                })
                ->addColumn('request_status', function ($process_degrees) {
                    if ($process_degrees->request_status === 'refused') {
                        return '<td><a class="btn btn-danger text-white">' . trans('admin.refused') . '</a></td>';
                    } elseif ($process_degrees->request_status === 'accept') {
                        return '<td><a class="btn btn-success text-white">' . trans('admin.accept') . '</a></td>';
                    } else {
                        return '<select class="form-control" data-id="' .
                            $process_degrees->id .
                            '" onchange="updateRequestStatus(this, ' .
                            $process_degrees->id .
                            ')">
                         <option selected disabled   value="">' .
                            trans('admin.select') .
                            '</option>
                            <option ' .
                            ($process_degrees->request_status == 'accept' ? 'selected' : '') .
                            ' value="accept">' .
                            trans('admin.accept') .
                            '</option>
                            <option ' .
                            ($process_degrees->request_status == 'refused' ? 'selected' : '') .
                            ' value="refused">' .
                            trans('admin.refused') .
                            '</option>
                            <option ' .
                            ($process_degrees->request_status == 'under_processing' ? 'selected' : '') .
                            ' value="under_processing">' .
                            trans('admin.under_processing') .
                            '</option>
                        </select>';
                    }
                })
                ->addColumn('subject', function ($process_degrees) {
                    return '<td>' . @$process_degrees->subject->subject_name . '</td>';
                })
                ->addColumn('identifier_id', function ($process_degrees) {
                    return $process_degrees->user->identifier_id;
                })
                ->addColumn('student_name', function ($process_degrees) {
                    return $process_degrees->user->first_name . ' ' . $process_degrees->user->last_name;
                })
                ->editColumn('doctor_id', function ($process_degrees) {
                    return $process_degrees->doctor->first_name . ' ' . $process_degrees->doctor->last_name;
                })
                ->addColumn('request_date', function ($process_degrees) {
                    return $process_degrees->created_at->format('Y-m-d');
                })
                ->addColumn('subject_id', function ($process_degrees) {
                    return $process_degrees->subject->subject_name;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.process_degrees.index');
        }
    }

    public function processDegreeStudent(Request $request)
    {
        $period = Period::query()
            ->where('status', 'start')
            ->first();

        $process_degree_students = ProcessDegree::query()
            ->where('user_id', '=', Auth::user()->id)
            ->where('year', '=', $period->year_start)
            ->get();

        if ($request->ajax()) {
            return Datatables::of($process_degree_students)
                ->addColumn('action', function ($process_degree_students) {
                    return '
                <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                        data-id="' .
                        $process_degree_students->id .
                        '" data-title="' .
                        $process_degree_students->user .
                        '">
                        <i class="fas fa-trash"></i>
                </button>
           ';
                })
                ->addColumn('subject', function ($process_degree_students) {
                    return '<td>' . @$process_degree_students->subject->subject_name . '</td>';
                })
                ->addColumn('unit', function ($process_degree_students) {
                    return '<td>' . @$process_degree_students->subject->unit->unit_name . '</td>';
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
                    if ($process_degree_students->request_status == 'new') {
                        return '<td><a class="btn btn-primary text-white">' . trans('admin.new') . '<a/></td>';
                    }
                    if ($process_degree_students->request_status == 'accept') {
                        return '<td><a class="btn btn-success text-white">' . trans('admin.accept') . '</a></td>';
                    }
                    if ($process_degree_students->request_status == 'refused') {
                        return '<td><a class="btn btn-danger text-white">' . trans('admin.refused') . '<a/></td>';
                    }
                    if ($process_degree_students->request_status == 'under_processing') {
                        return '<td><a class="btn btn-warning text-white">' . trans('admin.under_processing') . '<a/></td>';
                    }
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.process_degrees.process_degree_students');
        }
    }

    public function create()
    {
        $data['subjects'] = Subject::all();
        return view('admin.process_degrees.parts.create', compact('data'));
    }



    public function store(ProcessDegreeRequest $request): JsonResponse

    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        if (ProcessDegree::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function edit(ProcessDegree $processDegree)
    {
        $data['students'] = User::query()
            ->where('user_type', 'student')
            ->get();

        $data['subjects'] = Subject::query()->get();

        $data['doctors'] = User::find($processDegree->doctor_id);
        return view('admin.process_degrees.parts.edit', compact('processDegree', 'data'));
    }

    public function editUpdateDegree($id)
    {
        $process_degrees = ProcessDegree::find($id);
            $old_degree = SubjectExamStudentResult::query()
            ->where('user_id', $process_degrees->user_id)
                ->where('year', $process_degrees->year)
                ->where('period', $process_degrees->period)
                ->where('subject_id', $process_degrees->subject_id)
                ->first();
        return view('admin.process_degrees.parts.update_degree', compact('old_degree','process_degrees'));
    }

    public function update(Request $request, ProcessDegree $processDegree): JsonResponse
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        if ($processDegree->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function destroy(Request $request)
    {
        $processDegree = ProcessDegree::query()
            ->where('id', $request->id)
            ->firstOrFail();

        $processDegree->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    public function getDoctor(Request $request)
    {
        $id = $request->id;
        $doctor = SubjectUnitDoctor::query()
            ->join('users', 'subject_unit_doctors.user_id', '=', 'users.id')
            ->where('subject_id', $id)
            ->pluck('users.first_name', 'subject_unit_doctors.user_id')
            ->toArray();

        if (count($doctor) > 0) {
            return $doctor;
        } else {
            return response()->json(404);
        }
    }

    public function RequestStatusDegree(Request $request): JsonResponse
    {
        $inputs = ProcessDegree::find($request->id)->update([
            'request_status' => $request->status,
        ]);

        return response()->json(['code' => 200, 'status' => $request->status]);
    }

    public function updateDegree(Request $request): JsonResponse
    {
        $inputs = SubjectExamStudentResult::query()
            ->where('id', $request->id)
            ->first();

        if ($inputs->exam_degree < $request->studentDegree) {
            return response()->json(['code' => 505]);
        } else {
            SubjectExamStudentResult::find($request->id)->update(['student_degree' => $request->studentDegree,]);
                  ProcessDegree::query()
                ->where('id','=',$request->process_degree_id)
                ->first()->update([
                    'student_degree_after_request' => $request->studentDegree,
                    'processing_date' => Carbon::now()->format('Y-m-d')
                ]);
            return response()->json(['code' => 200]);
        }
    }

    public function history()
    {
        $doctorSubjects = SubjectUnitDoctor::where('user_id', auth()->user()->id)
            ->pluck('subject_id')
            ->toArray();

        $history = ProcessDegree::query()
            ->whereIn('subject_id', $doctorSubjects)
            ->get(['id', 'user_id', 'created_at', 'period']);
        return view('admin.process_degrees.history', compact('history'));
    } // end process degree history

    public function normal(Request $request)
    {
        $doctorSubjects = SubjectUnitDoctor::where('user_id', auth()->user()->id)
            ->pluck('subject_id')
            ->toArray();
        $process_degrees = ProcessDegree::query()
            ->where('period', '=', 'عاديه')
            ->whereIn('subject_id', $doctorSubjects)
            ->get();

        if ($request->ajax()) {
            return DataTables::of($process_degrees)
                ->addColumn('action', function ($process_degrees) {
                    return '<button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal" data-id="' .
                        $process_degrees->id .
                        '" data-title="' .
                        $process_degrees->user .
                        '">
                        <i class="fas fa-trash"></i>
                    </button>';
                })
                ->addColumn('user_id', function ($process_degrees) {
                    return '<td>' . $process_degrees->user->first_name . ' ' . $process_degrees->user->last_name . '</td>';
                })
                ->addColumn('request_status', function ($process_degrees) {
                    if ($process_degrees->request_status === 'refused') {
                        return '<td><a class="btn btn-danger text-white">' . trans('admin.refused') . '</a></td>';
                    } elseif ($process_degrees->request_status === 'accept') {
                        return '<td><a class="btn btn-success text-white">' . trans('admin.accept') . '</a></td>';
                    } else {
                        return '<select class="form-control" data-id="' .
                            $process_degrees->id .
                            '" onchange="updateRequestStatus(this, ' .
                            $process_degrees->id .
                            ')">
                            <option ' .
                            ($process_degrees->request_status == 'accept' ? 'selected' : '') .
                            ' value="accept">' .
                            trans('admin.accept') .
                            '</option>
                            <option ' .
                            ($process_degrees->request_status == 'refused' ? 'selected' : '') .
                            ' value="refused">' .
                            trans('admin.refused') .
                            '</option>
                            <option ' .
                            ($process_degrees->request_status == 'under_processing' ? 'selected' : '') .
                            ' value="under_processing">' .
                            trans('admin.under_processing') .
                            '</option>
                        </select>';
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
            return view('admin.process_degrees.normal');
        }
    }

    public function catchUp(Request $request)
    {
        $process_degrees = ProcessDegree::query()
            ->where('period', '=', 'استدراكيه')
            ->where('doctor_id', '=', Auth::user()->id)
            ->get();

        if ($request->ajax()) {
            return DataTables::of($process_degrees)
                ->addColumn('action', function ($process_degrees) {
                    return '<button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal" data-id="' .
                        $process_degrees->id .
                        '" data-title="' .
                        $process_degrees->user .
                        '">
                        <i class="fas fa-trash"></i>
                    </button>';
                })
                ->addColumn('user_id', function () {
                    return '<td>' . auth()->user()->first_name . '</td>';
                })
                ->addColumn('request_status', function ($process_degrees) {
                    if ($process_degrees->request_status === 'refused') {
                        return '<td><a class="btn btn-danger text-white">' . trans('admin.refused') . '</a></td>';
                    } elseif ($process_degrees->request_status === 'accept') {
                        return '<td><a class="btn btn-success text-white">' . trans('admin.accept') . '</a></td>';
                    } else {
                        return '<select class="form-control" data-id="' .
                            $process_degrees->id .
                            '" onchange="updateRequestStatus(this, ' .
                            $process_degrees->id .
                            ')">
                            <option disabled   value="">' .
                            trans('admin.select') .
                            '</option>
                            <option ' .
                            ($process_degrees->request_status == 'accept' ? 'selected' : '') .
                            ' value="accept">' .
                            trans('admin.accept') .
                            '</option>
                            <option ' .
                            ($process_degrees->request_status == 'refused' ? 'selected' : '') .
                            ' value="refused">' .
                            trans('admin.refused') .
                            '</option>
                            <option ' .
                            ($process_degrees->request_status == 'under_processing' ? 'selected' : '') .
                            ' value="under_processing">' .
                            trans('admin.under_processing') .
                            '</option>
                        </select>';
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
            return view('admin.process_degrees.catch_up');
        }
    }

    public function export()
    {
        return Excel::download(new ProcessDegreeExport(), 'ProcessDegree.xlsx');
    }

    public function import(Request $request): JsonResponse
    {
        $import = Excel::import(new ProcessDegreeImport(), $request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    }
}
