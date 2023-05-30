<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;

class AboutUsController extends Controller
{
    public function index()
    {
        $data['about_us'] = AboutUs::first();
        $data['settings'] = Setting::first();
        $data['services'] = Service::get();
        $data['brands'] = Brand::get();
        $data['slider'] = Slider::first();
        $data['related'] = Product::latest()->take(6)->get();
        return view('Front.about_us')->with($data);
    }
}
