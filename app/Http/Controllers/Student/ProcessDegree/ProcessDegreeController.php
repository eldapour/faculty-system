<?php

namespace App\Http\Controllers\Student\ProcessDegree;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessDegreeRequest;
use App\Models\Category;
use App\Models\Deadline;
use App\Models\Period;
use App\Models\ProcessDegree;
use App\Models\ProcessExam;
use App\Models\Subject;
use App\Models\SubjectExamStudent;
use App\Models\SubjectUnitDoctor;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ProcessDegreeController extends Controller
{

    public function get_all_process_degrees(request $request)
    {
        $period = Period::query()
            ->where('status', '=', 'start')
            ->first();

        if ($request->ajax()) {

            $process_degrees = ProcessDegree::query()
                ->where('year', '=', $period->year_start)
                ->where('period', '=', $period->session)
                ->where('user_id', '=', Auth::id())
                ->latest()
                ->get();


            return Datatables::of($process_degrees)
                ->addColumn('action', function ($process_degrees) {

                    $period = Period::query()
                        ->where('status', '=', 'start')
                        ->first();

                    $deadline = Deadline::query()
                        ->where('year', '=', $period->year_start)
                        ->where('period', '=', $period->period)
                        ->where('deadline_type', '=', 1)
                        ->first();

                    if ($deadline->deadline_end_date < Carbon::now()->format('Y-m-d')) {

                        return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $process_degrees->id . '" data-title="' . $process_degrees->user->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                    } else {

                        return '
                            <button disabled class="btn btn-pill btn-danger-light" data-toggle="modal">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                    }

                })
                ->addColumn('identifier_id', function ($process_degrees) {
                    return $process_degrees->user->identifier_id;
                })
                ->addColumn('request_date', function ($process_degrees) {
                    return $process_degrees->created_at->format('Y-m-d');
                })
                ->addColumn('subject_id', function ($process_degrees) {
                    return $process_degrees->subject->subject_name;
                })
                ->editColumn('request_status', function ($process_degrees) {
                    if ($process_degrees->request_status == 'new') {

                        return trans('process_exam.new');

                    } elseif ($process_degrees->request_status == 'accept') {

                        return trans('process_exam.accept');

                    } elseif ($process_degrees->request_status == 'refused') {

                        return trans('process_exam.refused');

                    } else {
                        return trans('process_exam.under_processing');
                    }
                })
                ->escapeColumns([])
                ->make(true);
        } else {


            return view('student.process_degree.all_process_degree');
        }
    }


    public function normalCreate($id)
    {

        $period = Period::query()
            ->where('status', '=', 'start')
            ->first();

        $subject = Subject::query()
            ->where('id','=',$id)
            ->first();

        $doctor_id = SubjectUnitDoctor::query()
            ->where('subject_id','=',$subject->id)
            ->where('year', '=',$period->year_start)
            ->first()->id;


        $subjectExamStudent = SubjectExamStudent::query()
            ->where('year','=',$period->year_start)
            ->where('subject_id','=',$subject->id)
            ->where('user_id','=',Auth::id())
            ->first();

        return view('student.process_degree.normal.create',compact('period','subject','doctor_id','subjectExamStudent'));
    }


    public function normalStore(Request $request): JsonResponse
    {

        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        if (ProcessDegree::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }

    }


    public function remedialCreate($id)
    {

        $period = Period::query()
            ->where('status', '=', 'start')
            ->first();

        $subject = Subject::query()
            ->where('id','=',$id)
            ->first();

        $doctor_id = SubjectUnitDoctor::query()
            ->where('subject_id','=',$subject->id)
            ->where('year', '=',$period->year_start)
            ->first()->id;


        $subjectExamStudent = SubjectExamStudent::query()
            ->where('year','=',$period->year_start)
            ->where('subject_id','=',$subject->id)
            ->where('user_id','=',Auth::id())
            ->first();

        return view('student.process_degree.remedial.create',compact('period','subject','doctor_id','subjectExamStudent'));

    }


    public function remedialStore(Request $request): JsonResponse
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        if (ProcessDegree::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }

    }

}
