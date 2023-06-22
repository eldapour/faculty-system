<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use Illuminate\Http\JsonResponse;
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
                ->editColumn('group_code', function ($groups) {
                    return $groups->getTranslation('group_code', app()->getLocale());
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.groups.index');
        }
    }

    public function create()
    {
        return view('admin.groups.parts.create');
    }


    public function store(GroupRequest $request): JsonResponse
    {


      $group =   Group::create([
            'group_name' => ['ar' => $request->group_name_ar,'en' => $request->group_name_en,'fr' => $request->group_name_fr],
            'group_code' => ['ar' => $request->group_code_ar,'en' => $request->group_code_en,'fr' => $request->group_code_fr],

        ]);
        if ($group->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(Group $group)
    {
        return view('admin.groups.parts.edit', compact('group'));
    }


    public function update(GroupRequest $request, Group $group): JsonResponse
    {

        $group->update([

            'group_name' => ['ar' => $request->group_name_ar,'en' => $request->group_name_en,'fr' => $request->group_name_fr],
            'group_code' => ['ar' => $request->group_code_ar,'en' => $request->group_code_en,'fr' => $request->group_code_fr],

        ]);

        if ($group->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }



    public function destroy(Request $request){

        $group = Group::where('id', $request->id)->firstOrFail();
        $group->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }
}
