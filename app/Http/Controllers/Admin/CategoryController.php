<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    use PhotoTrait;
    public function index(request $request)
    {
        if($request->ajax()) {
            $categories = Category::latest()->get();
            return Datatables::of($categories)
                ->addColumn('action', function ($category) {
                    return '
                            <button type="button" data-id="' . $category->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $category->id . '" data-title="' . $category->category_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('category_name', function ($category) {
                    return $category->category_name;
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('admin/category/index');
        }
    } // end  of index


    public function create()
    {
        return view('admin.category.parts.create');
    } // end  of create


    public function store(CategoryRequest $request)
    {
        $inputs = $request->all();
        if (Category::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    } // end  of store

    public function edit($id)
    {
        $find = Category::find($id);
        return view('admin.category.parts.edit',compact('find'));
    } // end  of edit



    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $data = $request->except('_token','_method');

        $category->update($data);
        return response()->json(['status' => 200]);
    } // end  of update

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $category = Category::find($request->id);

        $category->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    } // end of destroy
}
