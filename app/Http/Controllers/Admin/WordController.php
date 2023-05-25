<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Word;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WordController extends Controller
{
    use PhotoTrait;
    public function index(request $request)
    {
        $word = Word::first();
        $categories = Category::get();
        return view('admin.word.index',compact('word','categories'));
    }
    // Index End

    // Update Start
    public function update(SliderRequest $request, Slider $slider)
    {
        $inputs = $request->all();

        if ($request->has('image')) {
            if (file_exists($slider->image)) {
                unlink($slider->image);
            }
            $inputs['image'] = $this->saveImage($request->image, 'uploads/sliders','photo');
        }

        if ($slider->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $word = Slider::where('id', $request->id)->firstOrFail();
        $word->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
