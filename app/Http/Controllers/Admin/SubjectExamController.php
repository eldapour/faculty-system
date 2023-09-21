<?php

namespace App\Http\Controllers\Admin;

use App\Models\Period;
use App\Models\ProcessDegree;
use App\Models\SubjectExamStudent;
use App\Models\SubjectStudent;
use App\Models\SubjectUnitDoctor;
use DateTime;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Department;
use App\Models\SubjectExam;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
                ->where('status', '=', 'start')
                ->first();

            $subject_exams = SubjectExam::query()
                ->where('year', '=', $period->year_start)
                ->get();

            return Datatables::of($subject_exams)
                ->addColumn('actions', function ($subject_exams) {
                    return '
                        <button type="button" data-id="' . $subject_exams->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                   ';
                })

                ->editColumn('subject_id', function ($subject_exams) {
                    return $subject_exams->subject->subject_name;
                })
                ->addColumn('group_id', function ($subject_exams) {
                    return @$subject_exams->group->group_name;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exams.index');
        }
    }


    public function create()
    {
        $groups = Group::query()
            ->select('id', 'group_name')
            ->get();

        $departments = Department::query()
            ->select('id', 'department_name')
            ->get();

        return view('admin.subject_exams.parts_normal.create', compact('departments', 'groups'));
    }

    public function createRemedial()
    {
        $groups = Group::query()
            ->select('id', 'group_name')
            ->get();

        $departments = Department::query()
            ->select('id', 'department_name')
            ->get();

        return view('admin.subject_exams.parts_remedial.create', compact('departments', 'groups'));
    }


    public function store(SubjectExamRequest $request): JsonResponse
    {
        $inputs = $request->all();

        if (SubjectExam::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(SubjectExam $subjectExam)
    {
        $groups = Group::query()
            ->select('id', 'group_name')
            ->get();

        $departments = Department::query()
            ->select('id', 'department_name')
            ->get();

        $branches = DepartmentBranch::find($subjectExam->department_branch_id);
        $subjects = Subject::find($subjectExam->subject_id);
        return view('admin.subject_exams.parts_normal.edit', compact('subjectExam', 'groups', 'departments', 'subjects', 'branches'));
    }

    public function show(SubjectExam $subjectExam)
    {
        $groups = Group::query()
            ->select('id', 'group_name')
            ->get();

        $departments = Department::query()
            ->select('id', 'department_name')
            ->get();

        $branches = DepartmentBranch::find($subjectExam->department_branch_id);
        $subjects = Subject::find($subjectExam->subject_id);
        return view('admin.subject_exams.parts_remedial.edit', compact('subjectExam', 'groups', 'departments', 'subjects', 'branches'));
    }

    public function update(SubjectExamRequest $request, SubjectExam $subjectExam): JsonResponse
    {
        if ($subjectExam->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function destroy(Request $request)
    {
        $subject_exam = SubjectExam::where('id', $request->id)->firstOrFail();
        $subject_exam->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


    public function getSubject(Request $request): \Illuminate\Support\Collection
    {

        return Subject::query()
            ->where('department_branch_id', '=', $request->department_branch_id)
            ->pluck('subject_name', 'id');

    }



    public function student_exam_print()
    {


        $subject_exam_students = SubjectExamStudent::query()
            ->where('period', '=',period()->period)
            ->where('session', '=','عاديه')
            ->where('year', '=', period()->year_start)
            ->where('user_id', '=', Auth::id())
            ->get();

        $array = [];
        $subjects = SubjectExamStudent::query()
            ->where('period', '=',period()->period)
            ->where('session', '=','عاديه')
            ->where('year', '=', period()->year_start)
            ->where('user_id', '=', Auth::id())
            ->with(['subject_exam.subject'])
            ->get();

        foreach ($subjects as $subject){

            $array[] = $subject->subject_exam->subject->id;
        }


        return view('admin.subject_exams.print', compact('subject_exam_students','array'));

    }


    public function student_exam_print_2()
    {


        $subject_exam_students = SubjectExamStudent::query()
            ->where('period', '=',period()->period)
            ->where('session', '=','استدراكيه')
            ->where('year', '=', period()->year_start)
            ->where('user_id', '=', Auth::id())
            ->get();

        $array = [];
        $subjects = SubjectExamStudent::query()
            ->where('period', '=',period()->period)
            ->where('session', '=','استدراكيه')
            ->where('year', '=', period()->year_start)
            ->where('user_id', '=', Auth::id())
            ->with(['subject_exam.subject'])
            ->get();

        foreach ($subjects as $subject){

            $array[] = $subject->subject_exam->subject->id;
        }

        return view('admin.subject_exams.print_2', compact('subject_exam_students','array'));

    }//end fun



    public function ProcessDegreeDetails($id)
    {
        $subjectExam = SubjectExam::query()
            ->findOrFail($id);

        $period = Period::query()
            ->where('status','=','start')
            ->first();

        $processDegrees = ProcessDegree::query()
            ->with(['user','doctor','subject'])
            ->where('subject_id', $subjectExam->subject_id)
            ->where('year', $period->year_start)
            ->where('period', $period->session)
            ->get();

        return view('admin.subject_exams.details.processDegreeDetails', compact('processDegrees'));
    }

    public function changeRequestStatus(Request $request): JsonResponse
    {

        $processDegrees = ProcessDegree::query()
            ->where('id', $request->id)
            ->first();

        $processDegrees->update(['request_status' => $request->request_status]);

        if ($processDegrees->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }
}
