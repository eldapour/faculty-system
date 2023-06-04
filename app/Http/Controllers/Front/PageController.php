<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // College Start
    public function page($id)
    {
        $data['page'] = Page::find($id);
        return view('front.single_page', $data);
    }

    // College End

}
