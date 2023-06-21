<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Unit;

class UnitController extends Controller{

    public function index(request $request)
    {
        if ($request->ajax()) {
            $units = Unit::get();
            return Datatables::of($units)
                ->addColumn('action', function ($units) {
                    return '
                            <button type="button" data-id="' . $units->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $units->id . '" data-title="' . $units->unit_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('unit_name', function ($units) {
                    return $units->getTranslation('unit_name', app()->getLocale());
                })
                ->editColumn('unit_code', function ($units) {
                    return $units->getTranslation('unit_code', app()->getLocale());
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.units.index');
        }
    }

    public function create(){

        return view('admin.units.parts.create');
    }


    public function store(UnitRequest $request): JsonResponse
    {

        $unit = Unit::create([
            'unit_name' => ['ar' => $request->unit_name_ar,'en' => $request->unit_name_en,'fr' => $request->unit_name_fr],
            'unit_code' => ['ar' => $request->unit_code_ar,'en' => $request->unit_code_en,'fr' => $request->unit_code_fr],

        ]);
        if ($unit->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(Unit $unit){

        return view('admin.units.parts.edit', compact('unit'));
    }


    public function update(Request $request, Unit $unit): JsonResponse
    {

        $unit->update([
            'unit_name' => ['ar' => $request->unit_name_ar,'en' => $request->unit_name_en,'fr' => $request->unit_name_fr],
            'unit_code' => ['ar' => $request->unit_code_ar,'en' => $request->unit_code_en,'fr' => $request->unit_code_fr],

        ]);
        if ($unit->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }



    public function destroy(Request $request){

        $unit = Unit::where('id', $request->id)->firstOrFail();
        $unit->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


}
