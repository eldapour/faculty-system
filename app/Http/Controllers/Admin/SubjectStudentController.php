<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubjectStudentExport;
use App\Http\Middleware\CheckForbidden;
use App\Imports\SubjectStudentImport;
use App\Models\TrackReregister;
use DateTime;
use App\Models\User;
use App\Models\Group;
use App\Models\Period;
use App\Models\Subject;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\SubjectStudent;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SubjectStudentRequest;

class SubjectStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckForbidden::class)->except('Studentindex');
    }

    public function index(request $request)
    {
        if ($request->ajax()) {
            $periods = Period::query()
                ->where('status', '=', 'start')
                ->first();
            $subject_students = SubjectStudent::query()
                ->where('period', '=', $periods->period)
                ->where('year', '>=', $periods->year_start)
                ->where('year', '<=', $periods->year_end)
                ->get();

            return Datatables::of($subject_students)

                ->addColumn('user', function ($subject_exam_students) {
                    return $subject_exam_students->user->first_name  . ' ' . $subject_exam_students->user->first_name;
                })
                ->editColumn('subject_id', function ($subject_students) {
                    return $subject_students->subject->subject_name;
                })
                ->addColumn('department', function ($subject_students) {
                    return $subject_students->subject->department->getTranslation('department_name',app()->getLocale());
                })
                ->addColumn('department_branch', function ($subject_students) {
                    return $subject_students->subject->department_branch->getTranslation('branch_name',app()->getLocale());
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_students.index');
        }
    }


    public function create()
    {
        $data['users'] = User::query()
            ->where('user_type', '=', 'student')
            ->select('id', 'identifier_id')
            ->get();


        $data['subjects'] = Subject::all();
        $data['groups'] = Group::all();
        $data['departments'] = Department::all();
        return view('admin.subject_students.parts.create', compact('data'));
    }


    public function store(SubjectStudentRequest $request): \Illuminate\Http\JsonResponse
    {


        $user = User::query()
            ->where('id', '=', $request->user_id)
            ->first();

        if ($user->subjects()->syncWithPivotValues($request->subject_id,
            ['group_id' => $request->group_id,
                'year' => $request->year,
                'period' => $request->period
            ]
        )) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function edit(SubjectStudent $subjectStudent)
    {


        $data['subjects'] = Subject::all();
        $data['groups'] = Group::all();
        return view('admin.subject_students.parts.edit', compact('subjectStudent', 'data'));
    }


    public function update(Request $request, SubjectStudent $subjectStudent)
    {

        if ($subjectStudent->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function destroy(Request $request)
    {

        $subject_students = SubjectStudent::where('id', $request->id)->firstOrFail();
        $subject_students->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    public function Studentindex(request $request)
    {
        if ($request->ajax()) {
            $periods = Period::query()
                ->where('status', '=', 'start')
                ->first();
            $subject_students = SubjectStudent::query()
                ->where('period', '=', $periods->period)
                ->where('user_id',Auth::user()->id)
                ->where('year', '>=', $periods->year_start)
                ->where('year', '<=', $periods->year_end)
                ->get();

            return Datatables::of($subject_students)

                ->addColumn('user_code', function ($subject_exam_students) {
                    return $subject_exam_students->user->identifier_id;
                })
                ->editColumn('subject_id', function ($subject_students) {
                    return $subject_students->subject->subject_name;
                })
                ->addColumn('group_id', function ($subject_students) {
                    return $subject_students->subject->group->group_name;
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_students.Studentindex');
        }
    } // end function

    public function exportSubjectStudent()
    {
        return Excel::download(new SubjectStudentExport(), 'subject student.xlsx');
    }

    public function importSubjectStudent(Request $request)
    {
        $import = Excel::import(new SubjectStudentImport(),$request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    }


}
