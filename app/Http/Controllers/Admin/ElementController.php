<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ElementRequest;
use App\Models\DepartmentBranch;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Element;

class ElementController extends Controller
{

    public function index(request $request)
    {
        if ($request->ajax()) {
            $elements = Element::get();
            return Datatables::of($elements)
                ->addColumn('action', function ($elements) {
                    return '
                            <button type="button" data-id="' . $elements->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $elements->id . '" data-title="' . $elements->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('name', function ($elements) {
                    return '<td>'. $elements->name .'</td>';
                })
                ->editColumn('department_branch_id ', function ($elements) {
                    return '<td>'. $elements->department_branch->branch_name .'</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.elements.index');
        }
    }

    public function create()
    {
        $data['department_branchs'] = DepartmentBranch::all();
        return view('admin.elements.parts.create', compact('data'));
    }


    public function store(ElementRequest $request)
    {
        $inputs = $request->all();
        if (Element::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function edit(Element $element)
    {
        $data['department_branchs'] = DepartmentBranch::all();
        return view('admin.elements.parts.edit', compact('element', 'data'));
    }


    public function update(Request $request, Element $element): \Illuminate\Http\JsonResponse
    {
        if ($element->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function destroy(Request $request)
    {
        $element = Element::where('id', $request->id)->firstOrFail();
        $element->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

}
