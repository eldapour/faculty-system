<?php

namespace App\Http\Controllers\Manger;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckForbidden;
use App\Models\PointStatement;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PointStatementController extends Controller{

    public function __construct()
    {
        $this->middleware(CheckForbidden::class);
    }

    public function index(request $request)
    {
        if ($request->ajax()) {
            $points = PointStatement::get();
            return Datatables::of($points)

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
            return view('manger.point_statement.index');
        }
    }

}
