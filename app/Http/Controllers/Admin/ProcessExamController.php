<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\CheckForbidden;
use Carbon\Carbon;
use DateTime;
use App\Models\User;
use App\Models\Period;
use App\Traits\PhotoTrait;
use App\Models\ProcessExam;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProcessExamRequest;

class ProcessExamController extends Controller
{
    use PhotoTrait;

    public function __construct()
    {
        $this->middleware(CheckForbidden::class)->except('processExamStudent');
    }

    public function index(request $request)
    {
        if ($request->ajax()) {

            $period = \App\Models\Period::query()
                ->where('status','=','start')
                ->first();

            $process_exams = ProcessExam::query()
                ->where('year','=',$period->year_start)
                ->where('period','=',$period->period)
                ->latest()
                ->get();

            return Datatables::of($process_exams)
                ->addColumn('action', function ($process_exams) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $process_exams->id . '" data-title="' . $process_exams->user->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })

                ->editColumn('attachment_file', function ($process_degrees) {
                    return '<td><a style="width: 100%" target="_blank" class="btn btn-success" href="' . asset('uploads/process_exams/'.$process_degrees->attachment_file) . '">' . '  <i class="fa fa-file-pdf"></i></a></td>';
                })
                ->addColumn('identifier_id', function ($process_degrees) {
                    return $process_degrees->user->identifier_id;
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
            return view('admin.process_exams.index');
        }
    }

    public function processExamStudent(Request $request)
    {
        $subject_exam_id = $request->id;
        $period = Period::query()
                ->where('status', '=', 'start')
                ->first();

        $process_exam_students = ProcessExam::query()
                ->where('user_id', '=', Auth::id())
                ->where('period', '=', $period->period)
                ->where('year', '=', $period->year_start)
                ->get();

        if ($request->ajax()) {
            return Datatables::of($process_exam_students)
                ->addColumn('action', function ($process_exam_students) {
                    return '
                <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal" '. ($process_exam_students->request_status == 'accept' ? 'hidden' : '') .'
                        data-id="' . $process_exam_students->id . '" data-title="' . $process_exam_students->user->first_name . '">
                        <i class="fas fa-trash"></i>
                </button>
            ';
                })
                ->editColumn('attachment_file', function ($process_exam_students) {
                    return '<td><a target="_blank" class="btn btn-success" href="' . asset($process_exam_students->attachment_file) . '">' . trans('admin.pdf') . '  <i class="fa fa-file-pdf"></i></a></td>';
                })
                ->editColumn('period', function ($process_exam_students) {
                    return '<td><a target="_blank" class="btn btn-warning"> ' . $process_exam_students->period . ' <i class="fa fa-leaf"></i></a></td>';
                })
                ->editColumn('year', function ($process_exam_students) {
                    $date = new DateTime($process_exam_students->year);
                    return '<td>' . $date->format('Y') . '</td>';
                })
                ->editColumn('request_status', function ($process_exam_students) {
                    if ($process_exam_students->request_status == 'new')
                        return '<td><a class="btn btn-primary text-white">' . trans('admin.new') . '<a/></td>';
                    if ($process_exam_students->request_status == 'accept')
                        return '<td><a class="btn btn-success text-white">' . trans('admin.accept') . '</a></td>';
                    if ($process_exam_students->request_status == 'refused')
                        return '<td><a class="btn btn-danger text-white">' . trans('admin.refused') . '<a/></td>';
                    if ($process_exam_students->request_status == 'under_processing')
                        return '<td><a class="btn btn-warning text-white">' . trans('admin.under_processing') . '<a/></td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.process_exams.procees_exam_students', compact('subject_exam_id'));
        }
    }

    public function create()
    {
        $updated_at = ProcessExam::query()->select('updated_at');
        $data['users'] = User::where('user_type', 'student')->get();
        return view('admin.process_exams.parts.create', compact('data', 'updated_at'));
    }

    public function store(ProcessExamRequest $request): JsonResponse
    {
        $inputs = $request->all();

        if ($request->hasFile('attachment_file')) {
            $inputs['attachment_file'] = $this->saveImage($request->attachment_file, 'uploads/process_exams', 'pdf');
        }

        if (ProcessExam::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(ProcessExam $processExam)
    {
        $data['users'] = User::all();
        return view('admin.process_exams.parts.edit', compact('processExam', 'data'));
    }


    public function update(Request $request, ProcessExam $processExam): JsonResponse
    {
        $inputs = $request->all();

        if ($request->hasFile('attachment_file')) {
            $inputs['attachment_file'] = $this->saveImage($request->attachment_file, 'uploads/process_exams', 'pdf');
        }

        if ($processExam->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }



    public function destroy(Request $request)
    {
        $processExam = ProcessExam::where('id', $request->id)->firstOrFail();
        $processExam->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


    public function updateRequestStatus(Request $request): JsonResponse
    {
        $inputs = ProcessExam::find($request->id)->update([
            'request_status' => $request->status,
            'processing_request_date' => Carbon::now()->format('Y-m-d')
        ]);

        return response()->json(['code' => 200, 'status' => $request->status]);
    }
}
