<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WordRequest;
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
    public function update(WordRequest $request, Word $word)
    {
        $inputs = $request->all();

        if ($request->has('image')) {
            if (file_exists($word->image)) {
                unlink($word->image);
            }
            $inputs['image'] = $this->saveImage($request->image, 'uploads/word','photo');
        }

        if ($word->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End
}
