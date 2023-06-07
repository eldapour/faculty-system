<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PeriodController extends Controller
{

    public function index(request $request)
    {
        if ($request->ajax()) {
            $periods = Period::query()
                ->get();

            return Datatables::of($periods)
                ->addColumn('action', function ($periods) {
                    return '
                            <button type="button" id="status_btn_finished_'.$periods->id.'" data-id="' . $periods->id . '"  data-status="finished" class="btn btn-pill btn-danger-light status"><i class="fa fa-accessible-icon"></i> '.trans("admin.period_finished").'</button>
                            
                           
                       ';
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.periods.index');
        }
    }

    public function create()
    {

        return view('admin.periods.parts.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'period_start_date' => 'nullable|date_format:Y-m-d',
            'period_end_date' => 'nullable|date_format:Y-m-d',
            'period' => 'required|in:ربيعيه,خريفيه',
            'session' => 'required|in:عاديه,استدراكيه',
            'year_start' => 'required|date_format:Y',
            'year_end' => 'required|date_format:Y',

        ]);


        $inputs = $request->all();
        if (Period::create($inputs)) {

            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }




    public function status(Request $request)
    {

        $period = Period::query()
            ->where('id','=',$request->id)
            ->first();

        $period->update([
            'status' => $request->status,

        ]);


        if ($period->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


}
