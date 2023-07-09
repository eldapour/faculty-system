<?php

namespace App\Http\Controllers\Admin;

use App\Models\Period;
use App\Models\SubjectExamStudent;
use App\Models\SubjectUnitDoctor;
use DateTime;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Department;
use App\Models\SubjectExam;
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
                ->where('status', '=', 'start')
                ->first();

            $subject_exams = SubjectExam::query()
                ->where('period', '=', $period->period)
                ->where('year', '=', $period->year_start)
                ->get();

            return Datatables::of($subject_exams)
                ->addColumn('action', function ($subject_exams) {
                    return '
                            <a class="btn btn-primary" href="' . route('processExamStudent', $subject_exams->id) . '">' . trans('admin.remedial') . '<i class="fa fa-pen"></i></a>
                       ';
                })
                ->editColumn('subject_id', function ($subject_exams) {
                    return '<td>' . $subject_exams->subject->subject_name . '</td>';
                })
                ->addColumn('group_id', function ($subject_exams) {
                    return '<td>' . $subject_exams->subject->group->group_name . '</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exams.index');
        }
    }

    // Start remedialSession
    public function remedialSession(Request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status', '=', 'start')
                ->first();

            $subject_exams = SubjectExam::query()
                ->where('period', '=', $period->period)
                ->where('year', '=', $period->year_start)
                ->where('session', 'استدراكيه')
                ->get();

            return Datatables::of($subject_exams)
                ->addColumn('action', function ($subject_exams) {
                    return '
                            <button type="button" data-id="' . $subject_exams->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exams->id . '" data-title="' . $subject_exams->subject->subject_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                            <a class="btn btn-primary" href="' . route('process_exams.index') . '">' . trans('admin.remedial') . '<i class="fa fa-pen"></i></a>
                       ';
                })
                ->editColumn('subject_id', function ($subject_exams) {
                    return '<td>' . $subject_exams->subject->subject_name . '</td>';
                })
                ->addColumn('group_id', function ($subject_exams) {
                    return '<td>' . $subject_exams->subject->group->group_name . '</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exams.remedial_session');
        }
    }

    public function normalSession(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status', '=', 'start')
                ->first();

            $subject_exams = SubjectExam::query()
                ->where('period', '=', $period->period)
                ->where('year', '=', $period->year_start)
                ->where('session', 'عاديه')
                ->get();

            return Datatables::of($subject_exams)
                ->addColumn('action', function ($subject_exams) {
                    return '
                            <button type="button" data-id="' . $subject_exams->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exams->id . '" data-title="' . $subject_exams->subject->subject_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                            <a class="btn btn-primary" href="' . route('processExamStudent', $subject_exams->id) . '">' . trans('admin.remedial') . '<i class="fa fa-pen"></i></a>
                       ';
                })
                ->editColumn('subject_id', function ($subject_exams) {
                    return '<td>' . $subject_exams->subject->subject_name . '</td>';
                })
                ->addColumn('group_id', function ($subject_exams) {
                    return '<td>' . $subject_exams->subject->group->group_name . '</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exams.normal_session');
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

    public function update(Request $request, SubjectExam $subjectExam)
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
            ->where('group_id', '=', $request->group_id)
            ->pluck('subject_name', 'id');

    } // end of get subject

    public function student_exam_print(Request $request)
    {
        $period = Period::query()
            ->where('status', '=', 'start')
            ->first();

        $subject_exams = SubjectExam::query()
            ->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start)
            ->get();

        $subject_ids = SubjectExam::query()
            ->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start)
            ->pluck('subject_id')
            ->toArray();

        $doctor = SubjectUnitDoctor::query()
            ->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start)
            ->whereIn('subject_id', $subject_ids)
            ->first();

        $exam_code = SubjectExamStudent::query()
            ->where('period', '=', $period->period)
            ->where('user_id', '=', Auth::id())
            ->where('year', '=', $period->year_start)
            ->whereIn('subject_id', $subject_ids)
            ->first();
        $section = SubjectExamStudent::query()
            ->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start)
            ->where('user_id', '=', Auth::id())
            ->whereIn('subject_id', $subject_ids)
            ->first();

        return view('admin.subject_exams.print', compact([
            'period',
            'subject_exams',
            'doctor',
            'exam_code',
            'section',
            'period'
        ]));
    }

}
