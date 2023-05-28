<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use Yajra\DataTables\DataTables;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $groups = Group::get();
            return Datatables::of($groups)
                ->addColumn('action', function ($groups) {
                    return '
                            <button type="button" data-id="' . $groups->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $groups->id . '" data-title="' . $groups->group_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('group_name', function ($groups) {
                    return $groups->getTranslation('group_name', app()->getLocale());
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.groups.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        return view('admin.groups.parts.create');
    }
    // Create End

    // Store Start

    public function store(GroupRequest $request)
    {
        $inputs = $request->all();
        if (Group::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Group $group)
    {
        return view('admin.groups.parts.edit', compact('group'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, Group $group)
    {
        if ($group->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $group = Group::where('id', $request->id)->firstOrFail();
        $group->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
