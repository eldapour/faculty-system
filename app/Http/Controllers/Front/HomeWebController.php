<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeWebController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::all();
        $data['advertisements'] = Advertisement::all();
        return view('front.index', $data);
    }
}
