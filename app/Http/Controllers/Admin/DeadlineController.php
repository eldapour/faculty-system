<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deadline;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreDeadline;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
                ->editColumn('description', function ($deadlines) {
                    return '<td>'. $deadlines->description .'</td>';
                })
                ->addColumn('the_rest', function ($deadlines) {
                    $deadline_date_start = \Carbon\Carbon::parse($deadlines->deadline_date_start);
                    $deadline_date_end = \Carbon\Carbon::parse($deadlines->deadline_date_end);
                    $the_rest = $deadline_date_end->diff($deadline_date_start);
                    return '<td><a class="btn btn-danger text-white">'.  $the_rest->format('%a Days') .'</a></td>';
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


    public function store(StoreDeadline $request)
    {
        $inputs = $request->all();
        if (Deadline::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(Deadline $deadline)
    {
        return view('admin.deadlines.parts.edit', compact('deadline'));
    }


    public function update(Request $request, Deadline $deadline)
    {
        if ($deadline->update($request->all())) {
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
