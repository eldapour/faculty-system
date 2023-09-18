<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // College Start
    public function page($id)
    {
        $page = Page::findOrFail($id);
        return view('front.single_page', compact('page'));
    }

    // College End

}
