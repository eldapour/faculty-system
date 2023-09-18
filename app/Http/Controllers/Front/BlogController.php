<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class BlogController extends Controller
{
    public function index()
    {
        $advertisements_list = Advertisement::latest()->get();
        return view('front.blogs.new_blog', compact('advertisements_list'));
    }

    public function blogItem($id)
    {
        $blog_item = Advertisement::where('id', $id)->first();
        return view('front.blogs.single-blog', compact('blog_item'));
    }
}
