<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use PhotoTrait;
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $admins = Admin::latest()->get();
            return Datatables::of($admins)
                ->addColumn('action', function ($admins) { {
                        return '
                            <button type="button" data-id="' . $admins->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $admins->id . '" data-title="' . $admins->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                    }
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin/admin/index');
        }
    }

    public function create()
    {
        return view('admin.admin.parts.create');
    }

    public function store (Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/uploads', $name);
        }

        $inputs['name'] = $request->name;
        $inputs['email'] = $request->email;
        $inputs['password'] = Hash::make($request->password);
        $admin = Admin::create($inputs);
        if ($admin) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }
    public function edit(Admin $admin)
    {
        return view('admin.admin.parts.edit', compact('admin'));
    }
}
