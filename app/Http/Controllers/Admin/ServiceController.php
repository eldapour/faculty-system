<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreService;

class ServiceController extends Controller
{

    public function index(request $request)
    {
        if ($request->ajax()) {
            $services = Service::get();
            return Datatables::of($services)
                ->addColumn('action', function ($services) {
                    return '
                            <button type="button" data-id="' . $services->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $services->id . '" data-title="' . $services->name_en . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('service_name', function ($services) {
                    return '<td>'. $services->service_name[lang()] .'</td>';
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.services.index');
        }
    }


    public function create()
    {
        return view('admin.services.parts.create');
    }


    public function store(StoreService $request): JsonResponse
    {
        $inputs = $request->all();
        if (Service::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(Service $service)
    {
        return view('admin.services.parts.edit', compact('service'));
    }


    public function update(Request $request, Service $service)
    {
        if ($service->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function destroy(Request $request)
    {
        $services = Service::where('id', $request->id)->firstOrFail();
        $services->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


}
