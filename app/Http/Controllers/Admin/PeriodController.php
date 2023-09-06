<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
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
//                ->addColumn('action', function ($periods) {
//                    return '
//                            <button type="button" id="status_btn_finished_' . $periods->id . '" data-id="' . $periods->id . '"  data-status="finished" class="btn btn-pill btn-danger-light status"><i class="fa fa-accessible-icon"></i> ' . trans("admin.period_finished") . '</button>
//
//
//                       ';
//                })

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

    public function store(Request $request): JsonResponse
    {
        $request->validate([

            'period_start_date' => 'nullable|date_format:Y-m-d|before_or_equal:period_end_date',
            'period_end_date' => 'nullable|date_format:Y-m-d',
            'period' => 'required|in:ربيعيه,خريفيه',
            'year_start' => 'required|date_format:Y|after_or_equal:1900|before_or_equal:year_end',
            'year_end' => 'required|date_format:Y|after_or_equal:1900',

        ]);


        $inputs = $request->all();

        $lastPeriod = Period::query()
            ->latest()
            ->first();

        if (Period::create($inputs)) {

            $lastPeriod->update(['status' => 'finished']);
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function status(Request $request)
    {

        $period = Period::query()
            ->where('id', '=', $request->id)
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
