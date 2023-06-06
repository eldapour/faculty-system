<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePresentation;
use App\Models\Presentation;
use App\Models\Category;
use App\Traits\PhotoTrait;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    use PhotoTrait;
    public function index(request $request)
    {
        $data['presentations'] = Presentation::first();
        $data['categories'] = Category::get();
        return view('admin.presentations.index',$data);
    }


    // Update Start

    public function update(Request $request, Presentation $presentation)
    {

        $inputs = $request->all();

        $images = [];

        if ($request->has('images')) {
            foreach ($presentation->images as $image) {
                if (file_exists($image)) {
                    unlink($image);
                }
            }
            foreach ($request->file('images') as $image) {
                $images[] = $this->saveImage($image, 'uploads/presentationImage', 'photo');
            }
        }

        $inputs['images'] = $images;

        if ($presentation->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Update End

}
