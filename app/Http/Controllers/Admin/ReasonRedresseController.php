<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ReasonsRedress;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReasonsRedresRequest;

class ReasonRedresseController extends Controller
{

    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $reasons_redress = ReasonsRedress::get();
            return Datatables::of($reasons_redress)
                ->addColumn('action', function ($reasons_redress) {
                    return '
                            <button type="button" data-id="' . $reasons_redress->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $reasons_redress->id . '" data-title="' . $reasons_redress->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('name', function($reasons_redress) {
                    return $reasons_redress->getTranslation('name', app()->getLocale());
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.reasons_redress.index');
        }
    }
    // Index End

    public function create()
    {
        return view('admin.reasons_redress.parts.create');
    }


    public function store(ReasonsRedresRequest $request)
    {
        $inputs = $request->all();
        if (ReasonsRedress::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function edit(ReasonsRedress $reasonsRedress)
    {
        return view('admin.reasons_redress.parts.edit', compact('reasonsRedress'));
    }


    public function update(Request $request, ReasonsRedress $reasonsRedress)
    {
        if ($reasonsRedress->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $reason_redress = ReasonsRedress::where('id', $request->id)->firstOrFail();
        $reason_redress->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }
}
