<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePresentation;
use App\Models\Presentation;
use App\Models\Category;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $presentations = Presentation::get();
            return Datatables::of($presentations)
                ->addColumn('action', function ($presentations) {
                    return '
                            <button type="button" data-id="' . $presentations->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $presentations->id . '" data-title="' . $presentations->title . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('title', function ($advertisements) {
                    return'<td>'. $advertisements->title .'</td>';
                })
                ->editColumn('images', function ($advertisements) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($advertisements->image[0]) . '">
                    ';
                })
                ->editColumn('description', function ($advertisements) {
                    return'<td>'. $advertisements->description .'</td>';
                })
                ->editColumn('category_id', function ($advertisements) {
                    return'<td>'. $advertisements->category->category_name .'</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.presentations.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.presentations.parts.create', compact('data'));
    }
    // Create End

    // Store Start

    public function store(StorePresentation $request)
    {
        $inputs = $request->all();

        if($request->has('files')){
            foreach($request->file('files') as $file)
            {
                $inputs['images'][] = $this->saveImage($file,'uploads/presentation','photo');
            }
        }
        if (Presentation::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Presentation $presentation)
    {
        $data['categories'] = Category::all();
        return view('admin.advertisements.parts.edit', compact('advertisement', 'data'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, Presentation $presentation)
    {
        if ($presentation->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $presentation = Presentation::where('id', $request->id)->firstOrFail();
        $presentation->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
