<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubjectExamStudentExport;
use App\Http\Middleware\CheckForbidden;
use App\Imports\SubjectExamStudentImport;
use App\Models\Department;
use App\Models\Group;
use App\Models\Period;
use App\Models\UniversitySetting;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\DataTables;
use App\Models\SubjectExamStudent;
use App\Http\Controllers\Controller;

class SubjectExamStudentController extends Controller
{

    public function __construct()
    {
        $this->middleware(CheckForbidden::class)->except(['index','printSubjectExamStudent']);
    }

    public function index(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status', '=', 'start')
                ->first();

            $subject_exam_students = SubjectExamStudent::query()
                ->where('period', '=', $period->period)
                ->where('year', '=', $period->year_start)
                ->get();

            return Datatables::of($subject_exam_students)
                ->addColumn('action', function ($subject_exam_students) {
                    return '
                            <button ' . (auth()->user()->user_type == 'student' ? 'hidden' : '') . ' type="button" data-id="' . $subject_exam_students->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button ' . (auth()->user()->user_type == 'student' ? 'hidden' : '') . ' class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exam_students->id . '" data-title="' . $subject_exam_students->subject->subject_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->addColumn('identifier_id', function ($subject_exam_students) {
                    return $subject_exam_students->user->identifier_id;
                })
                ->addColumn('group', function ($subject_exam_students) {
                    return $subject_exam_students->subject->group->getTranslation('group_name', app()->getLocale());
                })

                ->addColumn('code', function ($subject_exam_students) {
                    return $subject_exam_students->subject->code;
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exam_students.index');
        }
    }


    public function edit(SubjectExamStudent $subjectExamStudent)
    {
        $groups = Group::query()
            ->select('id', 'group_name')
            ->get();

        $units = Unit::query()
            ->select('id', 'unit_name')
            ->get();

        $departments = Department::query()
            ->select('id', 'department_name')
            ->get();

        $subjects = Subject::query()
            ->select('id', 'subject_name')
            ->get();

        $users = User::query()
            ->select('id','identifier_id')
            ->where('user_type','=','student')
            ->get();

        return view('admin.subject_exam_students.parts.edit',compact('subjectExamStudent','groups','units','departments','subjects','users'));
    }


    public function update(Request $request, SubjectExamStudent $subjectExamStudent): JsonResponse
    {
        if ($subjectExamStudent->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function destroy(Request $request)
    {
        $subject_exam_student = SubjectExamStudent::where('id', $request->id)->firstOrFail();
        $subject_exam_student->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


    public function allSubjects(Request $request): Collection
    {


        return Subject::query()
            ->where('group_id', '=', $request->group_id)
            ->where('department_branch_id', '=', $request->department_branch_id)
            ->where('unit_id', '=', $request->unit_id)
            ->pluck('subject_name', 'id');
    }


    //get all students with subject_id

    public function allStudents(Request $request): Collection
    {

        $period = Period::query()
            ->where('status', '=', 'start')
            ->first();


        return User::query()
            ->where('user_type', '=', 'student')
            ->whereHas('subjects', fn(Builder $builder) => $builder->where('subject_id', $request->subject_id)
                ->where('period', '=', $period->period)
                ->where('year', '=', $period->year_start)

            )
            ->pluck('first_name', 'id');
    } // end of all students


    public function exportSubjectExamStudent(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new SubjectExamStudentExport(), 'SubjectExamStudent.xlsx');
    } // end exportSubjectExamStudent


    public function importSubjectExamStudent(Request $request): JsonResponse
    {
        $import = Excel::import(new SubjectExamStudentImport(), $request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    } // end importSubjectExamStudent

    public function printSubjectExamStudent()
    {
        $user = User::query()->findOrFail(auth()->user()->id);
        $settings = UniversitySetting::query()->first();
        $periods = Period::query()->first();
        $qrcode = QrCode::size(300)->generate(route('printSubjectExamStudent',$user->id));
        return view('admin.subject_exam_students.parts.print',compact([
            'user',
            'settings',
            'periods',
            'qrcode'
        ]));
    }



    public function normalSES(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status', '=', 'start')
                ->first();

            $subject_exam_students = SubjectExamStudent::query()
                ->where('period', '=', $period->period)
                ->where('session','=','عاديه')
                ->where('year', '=', $period->year_start)
                ->get();

            return Datatables::of($subject_exam_students)
                ->addColumn('action', function ($subject_exam_students) {
                    return '
                            <button ' . (auth()->user()->user_type == 'student' ? 'hidden' : '') . ' type="button" data-id="' . $subject_exam_students->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button ' . (auth()->user()->user_type == 'student' ? 'hidden' : '') . ' class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exam_students->id . '" data-title="' . $subject_exam_students->subject->subject_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->addColumn('identifier_id', function ($subject_exam_students) {
                    return $subject_exam_students->user->identifier_id;
                })
                ->addColumn('group', function ($subject_exam_students) {
                    return $subject_exam_students->subject->group->getTranslation('group_name', app()->getLocale());
                })

                ->addColumn('code', function ($subject_exam_students) {
                    return $subject_exam_students->subject->code;
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exam_students.index');
        }
    } // end of normal index


    public function catchupSES(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status', '=', 'start')
                ->first();

            $subject_exam_students = SubjectExamStudent::query()
                ->where('period', '=', $period->period)
                ->where('session','=','استدراكيه')
                ->where('year', '=', $period->year_start)
                ->get();

            return Datatables::of($subject_exam_students)
                ->addColumn('action', function ($subject_exam_students) {
                    return '
                            <button ' . (auth()->user()->user_type == 'student' ? 'hidden' : '') . ' type="button" data-id="' . $subject_exam_students->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button ' . (auth()->user()->user_type == 'student' ? 'hidden' : '') . ' class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exam_students->id . '" data-title="' . $subject_exam_students->subject->subject_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->addColumn('identifier_id', function ($subject_exam_students) {
                    return $subject_exam_students->user->identifier_id;
                })
                ->addColumn('group', function ($subject_exam_students) {
                    return $subject_exam_students->subject->group->getTranslation('group_name', app()->getLocale());
                })

                ->addColumn('code', function ($subject_exam_students) {
                    return $subject_exam_students->subject->code;
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exam_students.catch_up');
        }
    } // end of catch_up index


}
