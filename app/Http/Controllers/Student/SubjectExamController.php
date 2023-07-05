<?php

namespace App\Http\Controllers\Student;

use App\Models\Period;
use App\Models\SubjectExamStudent;
use App\Models\SubjectUnitDoctor;
use DateTime;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Department;
use App\Models\SubjectExam;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectExamRequest;
use App\Models\DepartmentBranch;

class SubjectExamController extends Controller
{

    public function index(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $subject_exams = SubjectExam::query()
                ->where('period','=',$period->period)
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($subject_exams)

                ->addColumn('unit_id', function ($subject_exams) {
                    return  $subject_exams->subject->unit->unit_name;
                })
                ->editColumn('subject_id', function ($subject_exams) {
                    return  $subject_exams->subject->subject_name;
                })
                ->addColumn('group_id', function ($subject_exams) {
                    return $subject_exams->subject->group->group_name;
                })
                ->addColumn('time', function ($subject_exams) {
                    return $subject_exams->time_start . ' - ' . $subject_exams->time_end;
                })
                ->addColumn('doctor_id', function ($subject_exams) {

                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();

                   return SubjectUnitDoctor::query()
                        ->where('period','=',$period->period)
                        ->where('year','=',$period->year_start)
                        ->where('subject_id','=',$subject_exams->subject_id)
                       ->first()
                       ->doctor
                       ->first_name;

                })
                ->addColumn('exam_code', function ($subject_exams) {

                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();

                    return SubjectExamStudent::query()
                        ->where('period','=',$period->period)
                        ->where('user_id','=',Auth::id())
                        ->where('year','=',$period->year_start)
                        ->where('subject_id','=',$subject_exams->subject_id)
                        ->first()
                        ->exam_code;

                })
                ->addColumn('section', function ($subject_exams) {

                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();

                    return SubjectExamStudent::query()
                        ->where('period','=',$period->period)
                        ->where('year','=',$period->year_start)
                        ->where('user_id','=',Auth::id())
                        ->where('subject_id','=',$subject_exams->subject_id)
                        ->first()
                        ->section;

                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exams.students.index');
        }
    }



}
