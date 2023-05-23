<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deadline;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreDeadline;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    // Index Start
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
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.deadlines.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        return view('admin.deadlines.parts.create');
    }
    // Create End

    // Store Start

    public function store(StoreDeadline $request)
    {
        $inputs = $request->all();
        if (Deadline::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Deadline $deadlines)
    {
        return view('admin.deadlines.parts.edit', compact('deadlines'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, Deadline $deadlines)
    {
        if ($deadlines->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $deadlines = Deadline::where('id', $request->id)->firstOrFail();
        $deadlines->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
