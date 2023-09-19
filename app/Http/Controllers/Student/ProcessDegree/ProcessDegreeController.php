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
use App\Models\SubjectExamStudentResult;
use App\Models\SubjectStudent;
use App\Models\SubjectUnitDoctor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ProcessDegreeController extends Controller
{

    public function get_all_process_degrees(request $request)
    {


        if ($request->ajax()) {

            $process_degrees = ProcessDegree::query()
                ->where('year', '=', period()->year_start)
                ->where('user_id', '=', Auth::id())
                ->latest()
                ->get();


            return Datatables::of($process_degrees)
                ->addColumn('action', function ($process_degrees) {


                    if ($process_degrees->request_status == 'new') {

                        return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $process_degrees->id . '" data-title="' . $process_degrees->user->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                    } else {

                      return 'Delete Not Access';
                    }

                })
                ->addColumn('identifier_id', function ($process_degrees) {
                    return $process_degrees->user->identifier_id;
                })
                ->addColumn('student_name', function ($process_degrees) {
                    return $process_degrees->user->first_name." ".$process_degrees->user->last_name;
                })
                ->addColumn('doctor_name', function ($process_degrees) {
                    return @$process_degrees->doctor->first_name." ".@$process_degrees->doctor->last_name;
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

        $subject_student = SubjectStudent::query()
            ->where('subject_id','=',$id)
            ->where('year', '=',period()->year_start)
            ->where('period', '=',period()->period)
            ->where('user_id','=',Auth::id())
            ->first();


        $subject = Subject::query()
            ->where('id','=',$id)
            ->first();

        $doctor_id = SubjectUnitDoctor::query()
            ->where('subject_id','=',$id)
            ->where('group_id','=',$subject_student->group_id)
            ->where('year', '=',period()->year_start)
            ->first()->user_id;


        $subjectExamStudent = SubjectExamStudent::query()
            ->whereHas('subject_exam', fn(Builder $builder)=>
            $builder->where('subject_id','=',$id)
            )
            ->where('year','=',period()->year_start)
            ->where('user_id','=',Auth::id())
            ->first();

        $subjectExamStudentResult = SubjectExamStudentResult::query()
            ->where('year','=',period()->year_start)
            ->where('period','عاديه')
            ->where('subject_id','=',$subject->id)
            ->where('user_id','=',Auth::id())
            ->first();

        return view('student.process_degree.normal.create',compact('subjectExamStudentResult','subject','doctor_id','subjectExamStudent'));
    }


    public function normalStore(ProcessDegreeRequest $request): JsonResponse
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

        $subject_student = SubjectStudent::query()
            ->where('subject_id','=',$id)
            ->where('year', '=',period()->year_start)
            ->where('period', '=',period()->period)
            ->where('user_id','=',Auth::id())
        ->first();

        $subject = Subject::query()
            ->where('id','=',$id)
            ->first();

        $doctor_id = SubjectUnitDoctor::query()
            ->where('subject_id','=',$id)
            ->where('group_id','=',$subject_student->group_id)
            ->where('year', '=',period()->year_start)
            ->first()->user_id;


        $subjectExamStudent = SubjectExamStudent::query()
            ->whereHas('subject_exam', fn(Builder $builder)=>
            $builder->where('subject_id','=',$id)
            )
            ->where('year','=',period()->year_start)
            ->where('user_id','=',Auth::id())
            ->first();

        $subjectExamStudentResult = SubjectExamStudentResult::query()
            ->where('year','=',period()->year_start)
            ->where('period','استدراكيه')
            ->where('subject_id','=',$subject->id)
            ->where('user_id','=',Auth::id())
            ->first();

        return view('student.process_degree.remedial.create',compact('subjectExamStudentResult','subject','doctor_id','subjectExamStudent'));

    }


    public function remedialStore(ProcessDegreeRequest $request): JsonResponse
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        if (ProcessDegree::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }

    }


    public function destroy(Request $request)
    {
        $subjects = ProcessDegree::where('id', $request->id)->firstOrFail();
        $subjects->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }
}
