<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ElementExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ElementRequest;
use App\Imports\ElementImport;
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

                                    data-id="' . $elements->id . '" data-title="' . $elements->getTranslation('name', app()->getLocale()) . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('name', function ($elements) {

                    return $elements->getTranslation('name', app()->getLocale());
                })
                ->editColumn('department_branch_id ', function ($elements) {
                    return $elements->department_branch->getTranslation('branch_name', app()->getLocale());
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
        $element = Element::create([

            'name' => ['ar' => $request->name_ar,'en' => $request->name_en,'fr' => $request->name_fr],
            'period' => $request->period,
            'department_branch_id' => $request->department_branch_id,
        ]);
        if ($element->save()) {
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
        $element->update([

            'name' => ['ar' => $request->name_ar,'en' => $request->name_en,'fr' => $request->name_fr],
            'period' => $request->period,
            'department_branch_id' => $request->department_branch_id,
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
    } // end of destroy


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
