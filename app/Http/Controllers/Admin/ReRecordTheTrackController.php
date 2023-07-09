<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentBranchStudent;
use App\Models\Period;
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
        $subjectStudent = DB::table('subject_students')
            ->join('subjects','subject_students.subject_id','=','subjects.id')
            ->join('units','units.id','=','subjects.unit_id')
            ->join('subject_unit_doctors','subject_unit_doctors.subject_id','=','subject_students.subject_id')
            ->join('users','users.id','=','subject_unit_doctors.user_id')
            ->join('groups','subjects.group_id','=','groups.id')
            ->where('subject_students.user_id','=',auth()->user()->id)
            ->select("subjects.subject_name->".lang()." as subject",'groups.group_name->ar as group','units.unit_name->ar as unit','users.first_name as user')
            ->get();
        return view('admin.re_record_the_track.parts.reregister_submit',compact('subjectStudent'));
    } // Reregister form End

    public function reregisterFormStore(Request $request)
    {
        $period = Period::query()->first();
        $reregister = TrackReregister::query()
            ->where('user_id','=',$request->user_id)
            ->where('year','>=',Carbon::parse($period->year_start)->format('Y'))
            ->where('year','<=',Carbon::parse($period->year_end)->format('Y'))
            ->first();
        if (!$reregister){
            $reregister = TrackReregister::query()
            ->create([
                'user_id' => auth()->user()->id,
                'year' => Carbon::now()->format('Y'),
                'status' => 1,
            ]);
        }else {
            $reregister->status = 1;
            $reregister->save();
        }
        if ($reregister){
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    } // reregister form store End
}
