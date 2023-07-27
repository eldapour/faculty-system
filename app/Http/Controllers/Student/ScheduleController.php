<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\DepartmentBranchStudent;
use App\Models\DepartmentStudent;
use App\Models\Group;
use App\Models\Period;
use App\Models\Schedule;
use App\Models\Unit;
use App\Models\User;
use App\Traits\PhotoTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ScheduleController extends Controller{


    use PhotoTrait;
    public function allSchedules(Request $request)
    {


        if($request->ajax()) {


            $department = DepartmentStudent::query()
                ->where('user_id','=',Auth::id())
                ->first();

            $schedules = Schedule::query()
                ->where('department_id','=',$department->department_id)
            ->latest()
                ->get();


            return Datatables::of($schedules)

                ->editColumn('department_id', function ($schedules) {

                    return $schedules->department->getTranslation('department_name', app()->getLocale());
                })
                ->editColumn('unit_id', function ($schedules) {

                    return $schedules->unit->getTranslation('unit_name', app()->getLocale());
                })->editColumn('pdf_upload', function ($schedules) {

                        return '
                    <a href="'. asset("uploads/schedules/".$schedules->pdf_upload)  .'" class="btn btn-pill btn-primary-light processing">'.trans('admin.schedule_pdf_upload').'</a>';
                })

                ->escapeColumns([])
                ->make(true);
        }else{
            return view('student.schedules.all');
        }
    }



}
