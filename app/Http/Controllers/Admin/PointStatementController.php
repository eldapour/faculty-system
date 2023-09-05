<?php

namespace App\Http\Controllers\Admin;
use App\Exports\PointStatementExport;
use App\Http\Controllers\Controller;
use App\Imports\PointStatementImport;
use App\Models\Element;
use App\Models\PointStatement;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class PointStatementController extends Controller
{

    public function index(request $request)
    {
        if ($request->ajax()) {
            $points = PointStatement::get();
            return Datatables::of($points)
                ->addColumn('action', function ($points) {
                    return '
                            <button ' . (auth()->user()->user_type == 'employee' || auth()->user()->user_type == 'doctor' ? '' : 'hidden') . ' type="button" data-id="' . $points->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button ' . (auth()->user()->user_type == 'employee' || auth()->user()->user_type == 'doctor' ? '' : 'hidden') . ' class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $points->id . '" data-title="">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('user_id',function ($points){
                    return $points->user->first_name . ' ' . $points->user->last_name;
                })
                ->addColumn('element_name',function ($points){
                    return $points->element->name_ar;
                })
                ->addColumn('element_code',function ($points){
                    return $points->element->element_code;
                })
                ->editColumn('identifier_id',function ($points){
                    return $points->user->identifier_id;
                })

                ->editColumn('element_name',function ($points){
                    return lang() == 'ar' ? $points->element->name_ar : $points->element->name_latin;
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.point_statement.index');
        }
    }

    public function edit(PointStatement $point){

        return view('admin.point_statement.parts.edit', compact('point'));
    }


    public function update(Request $request, PointStatement $point): JsonResponse
    {
        $point->update([
            'degree_student' => $request->degree_student,
        ]);
        if ($point->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function destroy(Request $request){

        $point = PointStatement::where('id', $request->id)->firstOrFail();
        $point->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


    public function exportPointStatement(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new PointStatementExport(), 'PointStatement'. date('d-m-Y-H-i-s') .'.xlsx');
    }

    public function importPointStatement(Request $request): JsonResponse
    {
        $import = Excel::import(new PointStatementImport(), $request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    }

}
