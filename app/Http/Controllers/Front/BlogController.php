<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class BlogController extends Controller
{
    public function index()
    {
        $data['advertisements'] = Advertisement::all();
        return view('front.blogs.new_blog', $data);
    }
}
