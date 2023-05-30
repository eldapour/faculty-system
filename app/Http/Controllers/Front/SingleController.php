<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;

class SingleController extends Controller
{
    public function getProduct($id)
    {
        $settings = Setting::first();
        $products = Product::latest()->take(6)->get();
        $product = Product::findOrFail($id);
        return view('Front.single', compact('product','products', 'settings'));
    }
}
