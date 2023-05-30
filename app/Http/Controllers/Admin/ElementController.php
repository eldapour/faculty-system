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
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $elements = Element::get();
            return Datatables::of($elements)
                ->addColumn('action', function ($elements) {
                    return '
                            <button type="button" data-id="' . $elements->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $elements->id . '" data-title="' . $elements->name[lang()] . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('name', function ($elements) {
                    return '<td>'. $elements->name[lang()] .'</td>';
                })
                ->editColumn('department_branch_id ', function ($elements) {
                    return '<td>'. $elements->department_branch->branch_name[lang()] .'</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.elements.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        $data['department_branchs'] = DepartmentBranch::all();
        return view('admin.elements.parts.create', compact('data'));
    }
    // Create End

    // Store Start

    public function store(ElementRequest $request)
    {
        $inputs = $request->all();
        if (Element::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Element $element)
    {
        $data['department_branchs'] = DepartmentBranch::all();
        return view('admin.elements.parts.edit', compact('element', 'data'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, Element $element)
    {
        if ($element->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $element = Element::where('id', $request->id)->firstOrFail();
        $element->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
