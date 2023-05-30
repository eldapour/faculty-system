<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Slider;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $settings = Setting::first();
        $slider = Slider::first();
        $categories = Category::get();
        $related = Product::latest()->take(3)->get();
        return view('Front.product', compact('products', 'categories', 'related', 'settings', 'slider'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';

            $products = Product::where('title_en', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('title_ar', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('sku', 'LIKE', '%' . $request->search . '%')
                ->get();

            if ($products->count() > 0) {
                foreach ($products as $key => $product) {
                    $output .=
                        '<div class="col-12 col-md-6 col-lg-4">
                                    <div class="product-item" data-hover="">
                                        <div class="product-img-wrap">
                                          <div class="product-img">
                                            <img
                                              src="' . asset($product->images[0]) . '"
                                              alt="Product"
                                            />
                                          </div>
                                        </div>
                                        <div class="product-content">
                                          <div class="product-title">
                                            <a href="' . route('get.product', $product->id) . '">' . $product->title_en . '</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                        </div>';
                }
                return Response($output);
            } else {
                return response('no data', 404);
            }
        }
    } // end search

    public function filter(Request $request)
    {
        if ($request->ajax()) {
            if ($request->filter == 'default') {
                $products = Product::get();
            } else if ($request->filter == 'new') {
                $products = Product::latest()->get();
            } else if ($request->filter == 'old') {
                $products = Product::oldest()->get();
            }

            $output = '';

            if ($products->count() > 0) {
                foreach ($products as $key => $product) {
                    $output .=
                        '<div class="col-12 col-md-6 col-lg-4">
                                    <div class="product-item" data-hover="">
                                        <div class="product-img-wrap">
                                          <div class="product-img">
                                            <img
                                              src="' . asset($product->images[0]) . '"
                                              alt="Product"
                                            />
                                          </div>
                                        </div>
                                        <div class="product-content">
                                          <div class="product-title">
                                            <a href="' . route('get.product', $product->id) . '">' . $product->title_en . '</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                        </div>';
                }
                return Response($output);
            } else {
                return response('no data', 404);
            }
        }
    }

    public function categorySort(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id && $request->id !== 'all') {
                $id = $request->id;
                $products = Product::where('category_id', '=', $id)->get();
            } else if ($request->id && $request->id == 'all') {
                $products = Product::get();
            }
            $output = '';

            if ($products->count() > 0) {
                foreach ($products as $key => $product) {
                    $output .=
                        '<div class="col-12 col-md-6 col-lg-4">
                                    <div class="product-item" data-hover="">
                                        <div class="product-img-wrap">
                                          <div class="product-img">
                                            <img
                                              src="' . asset($product->images[0]) . '"
                                              alt="Product"
                                            />
                                          </div>
                                        </div>
                                        <div class="product-content">
                                          <div class="product-title">
                                            <a href="' . route('get.product', $product->id) . '">' . $product->title_en . '</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                        </div>';
                }
                return Response([$output]);
            } else {
                return response('no data', 404);
            }
        }
    } // end Category sorts
}
