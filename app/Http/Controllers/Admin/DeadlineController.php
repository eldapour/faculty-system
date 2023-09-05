<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deadline;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeadline;
use App\Http\Requests\DeadLineUpdateRequest;

class DeadlineController extends Controller
{

    public function index(request $request)
    {
        if ($request->ajax()) {
            $deadlines = Deadline::get();
            return Datatables::of($deadlines)
                ->addColumn('action', function ($deadlines) {
                    return '
                            <button type="button" data-id="' . $deadlines->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $deadlines->id . '" data-title="' . $deadlines->name_en . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('deadline_type', function ($deadlines) {

                    if($deadlines->deadline_type == 1){

                        return trans('deadline.process_exam');
                    }else{
                        return trans('deadline.process_degree');
                    }

                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.deadlines.index');
        }
    }

    public function create()
    {
        return view('admin.deadlines.parts.create');
    }


    public function store(StoreDeadline $request): JsonResponse
    {

       $deadline = Deadline::create([
            'deadline_date_start' => $request->deadline_date_start,
            'deadline_date_end' => $request->deadline_date_end,
            'period' => $request->period,
            'year' => $request->year,
            'deadline_type' => $request->deadline_type,
       ]);

        if ($deadline->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(Deadline $deadline)
    {
        return view('admin.deadlines.parts.edit', compact('deadline'));
    }


    public function update(DeadLineUpdateRequest $request, Deadline $deadline): JsonResponse
    {

        $deadline->update([
            'deadline_date_start' => $request->deadline_date_start,
            'deadline_date_end' => $request->deadline_date_end,
            'period' => $request->period,
            'year' => $request->year,
            'deadline_type' => $request->deadline_type,
        ]);

        if ($deadline->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function destroy(Request $request)
    {
        $deadlines = Deadline::where('id', $request->id)->firstOrFail();
        $deadlines->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

}
