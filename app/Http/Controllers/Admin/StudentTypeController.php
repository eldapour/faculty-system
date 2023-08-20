<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckForbidden;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\StudentType;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class StudentTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware(CheckForbidden::class);
    }

    public function index(request $request)
    {
        if ($request->ajax()) {
            $types = StudentType::query()
                ->latest()->get();

            return Datatables::of($types)
                ->addColumn('action', function ($types) {
                    return '
                            <button type="button" data-id="' . $types->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                       ';

                    $delete = '<button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $types->id . '" data-title="' . $types->student_type . '">
                                    <i class="fas fa-trash"></i>
                            </button>';
                })
                ->editColumn('student_type', function ($types) {
                    return $types->student_type;
                })
                ->editColumn('notes', function ($types) {
                    if ($types->notes != null) {
                        return $types->notes;
                    } else {
                        return trans('admin.no_notes');
                    }
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.student_type.index');
        }
    } // end  of index


    public function create()
    {
        return view('admin.student_type.parts.create');
    } // end  of create


    public function store(Request $request)
    {
        $inputs = $request->all();
        if (StudentType::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    } // end  of store

    public function edit($id)
    {
        $find = StudentType::findOrFail($id);
        return view('admin.student_type.parts.edit', compact('find'));
    } // end  of edit


    public function update(Request $request, $id)
    {
        $type = StudentType::findOrFail($id);
        $data = $request->except('_token', '_method');

        $type->update($data);
        return response()->json(['status' => 200]);
    } // end  of update

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $type = StudentType::findOrFail($request->id);

        $type->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end of destroy
}
