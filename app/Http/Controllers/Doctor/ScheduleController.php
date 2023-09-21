<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ScheduleController extends Controller{

    use PhotoTrait;
    public function index(Request $request)
    {
        if($request->ajax()) {
            $schedules = Schedule::query()
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
            return view('doctor.schedules.get_all_schedules');
        }
    }


}
