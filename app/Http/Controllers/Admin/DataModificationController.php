<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataModification;
use App\Traits\PhotoTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\DataTables;


class DataModificationController extends Controller
{
    use PhotoTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DataModification::get();
            return Datatables::of($data)
                ->addColumn('action', function ($data) {
                    return '
                            <button type="button" data-id="' . $data->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $data->id . '" data-title="">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->addColumn('user_id', function ($data) {
                    return $data->user->first_name . ' ' . $data->user->last_name . ' (' . $data->user_id . ')';
                })
                ->editColumn('card_image', function ($data) {
                    return '<img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($data->card_image) . '">';
                })
                ->editColumn('request_status', function ($data) {
                    if ($data->request_status == 'refused')
                        return '<span class="badge badge-danger">' . trans('admin.'.$data->request_status) . '</span>';
                    elseif ($data->request_status == 'accept')
                        return '<span class="badge badge-success">' . trans('admin.'.$data->request_status) . '</span>';
                    else
                        return '<span class="badge badge-info">' . trans('admin.'.$data->request_status) . '</span>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.data_modification.index');
        }
    }

    public function edit(Request $request, DataModification $data_modify)
    {

        return view('admin.data_modification.parts.edit', compact('data_modify'));
    }

    public function update(Request $request, DataModification $data_modify)
    {
        $inputs = $request->all();
        if ($data_modify->update([
            'request_status' => $inputs['status'],
        ])) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function store(Request $request)
    {
        $check_column = Schema::getColumnListing('data_modifications');

        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        $inputs['request_date'] = Carbon::now();
        $inputs['year'] = Carbon::now()->format('Y');
        $inputs['card_image'] = $this->saveImage($inputs['card_image'], 'uploads/data_modification', 'photo');

        $data_mod = DataModification::create([
            'user_id' => auth()->user()->id,
            'request_date' => Carbon::now(),
            'year' => Carbon::now()->format('Y'),
            'request_status' => 'new',
            'card_image' => $inputs['card_image'],
            'data_modification_type' => $inputs['data_modification'],
        ]);

        return redirect()->route('profile')->with('success', trans('admin.order_success'));
    }
}
