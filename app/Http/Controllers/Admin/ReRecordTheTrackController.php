<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentBranch;
use App\Models\DepartmentBranchStudent;
use App\Models\DepartmentStudent;
use App\Models\Period;
use App\Models\Subject;
use App\Models\SubjectStudent;
use App\Models\SubjectUnitDoctor;
use App\Models\TrackReregister;
use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ReRecordTheTrackController extends Controller
{
    public function reregisterForm()
    {
        $period = Period::query()
            ->where('status', '=', 'start')
            ->first();

        $subjectStudent = DB::table('subject_students')
            ->join('subjects', 'subject_students.subject_id', '=', 'subjects.id')
            ->join('units', 'units.id', '=', 'subjects.unit_id')
            ->join('subject_unit_doctors', 'subject_unit_doctors.subject_id', '=', 'subject_students.subject_id')
            ->join('users', 'users.id', '=', 'subject_unit_doctors.user_id')
            ->join('groups', 'subjects.group_id', '=', 'groups.id')
            ->where('subject_students.user_id', '=', auth()->user()->id)
            ->where('subject_students.period', '=', $period->period)
            ->whereYear('subject_students.created_at', '=', $period->year_start)
            ->select("subjects.subject_name->" . lang() . " as subject", 'groups.group_name->ar as group', 'units.unit_name->ar as unit', 'users.first_name as user')
            ->get();

        $department = DepartmentStudent::query()
            ->where('user_id', '=', auth()->user()->id)
            ->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start)
            ->first();
        $branchs = DepartmentBranch::query()
            ->where('department_id', '=', $department->department_id)
            ->get();
        return view('admin.re_record_the_track.parts.reregister_submit', compact('subjectStudent', 'department', 'branchs'));
    } // Reregister form End

    public function reregisterFormTrack()
    {
        $period = Period::query()
            ->where('status', '=', 'start')
            ->first();

        $subjectStudent = DB::table('subject_students')
            ->join('subjects', 'subject_students.subject_id', '=', 'subjects.id')
            ->join('units', 'units.id', '=', 'subjects.unit_id')
            ->join('subject_unit_doctors', 'subject_unit_doctors.subject_id', '=', 'subject_students.subject_id')
            ->join('users', 'users.id', '=', 'subject_unit_doctors.user_id')
            ->join('groups', 'subjects.group_id', '=', 'groups.id')
            ->where('subject_students.user_id', '=', auth()->user()->id)
            ->where('subject_students.period', '=', $period->period)
            ->whereYear('subject_students.created_at', '=', $period->year_start)
            ->select("subjects.subject_name->" . lang() . " as subject", 'groups.group_name->ar as group', 'units.unit_name->ar as unit', 'users.first_name as user')
            ->get();


        $department = DepartmentStudent::query()
            ->where('user_id', '=', auth()->user()->id)
            ->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start)
            ->first();
        $branchs = DepartmentBranch::query()
            ->where('department_id', '=', $department->department_id)
            ->get();
        $subjects = Subject::where('department_id', '=', $department->department_id)->get();



        return view('admin.re_record_the_track.parts.reregister_Track_form', compact('subjectStudent', 'department', 'branchs','subjects'));
    } // Reregister form Track End

    public function reregisterFormStore(Request $request)
    {
        $period = \App\Models\Period::query()
            ->where('status', '=', 'start')
            ->first();
        $reregister = DepartmentBranchStudent::query()
            ->updateOrCreate([
                'user_id' => auth()->user()->id,
                'register_year' => $period->year_start,

            ],
                [
                    'user_id' => auth()->user()->id,
                    'department_branch_id' => $request->branch,
                    'register_year' => $period->year_start,
                    'branch_restart_register' => 1,
                ]);

        if ($reregister) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    } // reregister form store End

    public function reregisterTrack(Request $request)
    {
        $period = \App\Models\Period::query()
            ->where('status', '=', 'start')
            ->first();

            $departmentStudent = DepartmentStudent::query()
                ->where('user_id', '=', auth()->user()->id)
                ->where('year', '=', $period->year_start)
                ->where('period', '=', $period->period)
                ->latest()->first()
                ->update(['confirm_request' => 1]);
            if ($departmentStudent) {
                return response()->json(['status' => 200]);
            } else {
                return response()->json(['status' => 405]);
            }

    } // reregister form store End


}
