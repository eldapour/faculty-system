<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentBranchStudent;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ReRecordTheTrackController extends Controller
{
    // Index start

    public function index(request $request)
    {
        if ($request->ajax()) {
            $record_students = DepartmentBranchStudent::get();
            return Datatables::of($record_students)
                ->addColumn('action', function ($record_students) {
                    return '
                            <button type="button" data-id="' . $record_students->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $record_students->id . '" data-title="' . $record_students->id . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.re_record_the_track.index');
        }
    }

    // Index End
}
