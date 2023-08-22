<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ElementExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ElementRequest;
use App\Imports\ElementImport;
use App\Models\Department;
use App\Models\DepartmentBranch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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

                                    data-id="' . $elements->id . '" data-title="' . $elements->name_ar . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })

                ->editColumn('department_id ', function ($elements) {
                    return $elements->department->department_code;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.elements.index');
        }
    }

    public function create()
    {
        $departments = Department::query()
            ->select('id','department_name')
            ->get();

        return view('admin.elements.parts.create', compact('departments'));
    }


    public function store(ElementRequest $request): JsonResponse
    {
        $element = Element::create([
            'element_code' => $request->element_code,
            'name_ar' => $request->name_ar,
            'name_latin' => $request->name_latin,
            'session' => $request->session_name,
            'department_id' => $request->department_id,
        ]);
        if ($element->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function edit(Element $element)
    {
        $departments = Department::query()
            ->select('id','department_name')
            ->get();

        return view('admin.elements.parts.edit', compact('element','departments'));
    }


    public function update(Request $request, Element $element): JsonResponse
    {
        $element->update([

            'element_code' => $request->element_code,
            'name_ar' => $request->name_ar,
            'name_latin' => $request->name_latin,
            'session' => $request->session_name,
            'department_id' => $request->department_id,

        ]);

        if ($element->save()) {
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


    public function exportElement()
    {
        return Excel::download(new ElementExport(), 'Elements.xlsx');
    }

    public function importElement(Request $request): JsonResponse
    {
        $import = Excel::import(new ElementImport(),$request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    }

}
