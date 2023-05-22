<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(request $request)
    {
        if ($request->ajax()) {
            $roles = Role::latest()->get();
            return DataTables::of($roles)
                ->addColumn('action', function ($roles) {
                    if ($roles->id == 1) {
                        return '<span class="badge badge-success">الدور لديه جميع الصلاحيات ولا يمكن تعديله</span>';
                    } else {
                        return '
                            <button type="button" data-id="' . $roles->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $roles->id . '" data-title="' . $roles->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                    }
                })
                ->editColumn('image', function ($roles) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($roles->image) . '">
                    ';
                })
                ->addColumn('permission', function ($roles) {
                    return count($roles->permissions) . ' من الصلاحيات ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.roles.index');
        }
    } // end of index

    public function create()

    {
        $permissions = Permission::get();

        return view('admin.roles.parts.create', compact('permissions'));

    } // end create

    public function store(Request $request)
    {
//        dd($request->input('permission'));
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));

        return response()->json(['status' => 200]);

    } // store


    public function edit($id)

    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.parts.edit', compact('role', 'permissions', 'rolePermissions'));
    } // edit


    public function update(Request $request, $id)

    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ],[
            'name.required' => 'الاسم مطلوب',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));

        return response()->json(['status' => 200]);
    }


    public function delete(Request $request)
    {
        DB::table("roles")->where('id', $request->id)->delete();
        DB::table('role_has_permissions')->where('role_id', $request->id)->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }
}
