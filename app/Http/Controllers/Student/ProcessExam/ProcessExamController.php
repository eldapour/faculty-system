<?php

namespace App\Http\Controllers\Student\ProcessExam;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessExamRequest;
use App\Models\Deadline;
use App\Models\Period;
use App\Models\ProcessExam;
use App\Models\ReasonsRedress;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ProcessExamController extends Controller{

    public function get_all_process_exams(request $request)
    {
        $period = Period::query()
            ->where('status','=','start')
            ->first();


        if ($request->ajax()) {

            $process_exams = ProcessExam::query()
                ->where('year','=',$period->year_start)
                ->where('period','=',$period->period)
                ->where('user_id','=',Auth::id())
                ->latest()
                ->get();

            return Datatables::of($process_exams)


                ->addColumn('action', function ($process_exams) {
                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();

                    $deadline = Deadline::query()
                        ->where('year','=',$period->year_start)
                        ->where('period','=',$period->period)
                        ->where('deadline_type','=',0)
                        ->first();
                    if($deadline->deadline_end_date < Carbon::now()->format('Y-m-d')){

                        return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $process_exams->id . '" data-title="' . $process_exams->user->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                    }else{

                        return '
                            <button disabled class="btn btn-pill btn-danger-light" data-toggle="modal">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                    }

                })

                ->editColumn('attachment_file', function ($process_exams) {
                    return '<td><a target="_blank" class="btn btn-success" href="' . asset('uploads/process_exams/'.$process_exams->attachment_file) . '">' . '  <i class="fa fa-file-pdf"></i></a></td>';
                })
                ->addColumn('identifier_id', function ($process_exams) {
                    return $process_exams->user->identifier_id;
                })
                ->addColumn('reason', function ($process_exams) {
                    return $process_exams->reasonRedress->name;
                })

               ->editColumn('user_id', function ($process_exams) {
                    return $process_exams->user->first_name . " " . $process_exams->user->last_name;
                })

                ->editColumn('request_status', function ($process_exams) {
                    if($process_exams->request_status == 'new'){

                        return trans('process_exam.new');

                    }elseif ($process_exams->request_status == 'accept'){

                        return trans('process_exam.accept');

                    } elseif ($process_exams->request_status == 'refused'){

                        return trans('process_exam.refused');

                    }else{
                        return trans('process_exam.under_processing');
                    }
                })

                ->escapeColumns([])
                ->make(true);
        } else {

            $processExamCount = ProcessExam::query()
                ->where('year','=',$period->year_start)
                ->where('period','=',$period->period)
                ->where('user_id','=',Auth::id())
                ->count();

            return view('student.process_exam.all_process_exams',compact('processExamCount'));
        }
    }

    public function create_process_exam()
    {
        $data['reasons'] = ReasonsRedress::get();

        return view('student.process_exam.parts.create',$data);
    }

    public function store_process_exam(ProcessExamRequest $request): JsonResponse
    {
        if ($image = $request->file('attachment_file')) {

            $destinationPath = 'uploads/process_exams';
            $attachment_file = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $attachment_file);
            $request['attachment_file'] = "$attachment_file";
        }

        $addProcessExam = ProcessExam::create([
            'user_id' => Auth::id(),
            'attachment_file' => $attachment_file,
            'period' => $request->period,
            'year' => $request->year,
            'request_date' => Carbon::now()->format('Y-m-d'),
            'reason' => $request->reason,
        ]);

        if ($addProcessExam->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function delete_process_exam(Request $request)
    {
        $processExam = ProcessExam::where('id', $request->id)->firstOrFail();
        $processExam->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


}
