<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\StoreQuote;
use App\Models\Quote;
use App\Models\Product;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->id){
        $id = $request->id;
        $product = Product::find($id);
//        dd($request->id);
        } else {
            $product = null;
        }
        $products = Product::get();
        $settings = Setting::first();
        return view('Front.quote', compact('settings','product','products'));
    }

    public function store(StoreQuote $storeQuote)
    {
        $inputs = $storeQuote->all();

        if (Quote::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';

            $products = Product::where('title_en', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('title_ar', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('sku', 'LIKE', '%' . $request->search . '%')
                ->get();
            if ($request->search == '') {
                return '';
            }
            if ($products->count() > 0) {
                foreach ($products as $key => $product) {
                    $output .=
                        '<div class="product" style="display: flex;margin-bottom: 15px;">
                            <label class="product-img" for="checkQoute'. $product->id .'">
                                <img src="' . asset($product->images[0]) . '"
                                     style="width: 130px;border-radius: 25px;" alt="product"/>
                            </label>
                            <div class="product-desc">
                                <div class="product-title">
                                    <h5 style="position: absolute;margin: 30px 0px 0px 38px">
                                    ' . trans_model($product, 'title') . '</h5>
                                </div>
                            </div>
                                <input style="width: 60px;height: 60px;position: absolute;right: 0px;" type="checkbox" name="product_id" value="'. $product->id .'" class="form-check-input" id="checkQoute'. $product->id .'">
                        </div>
                    ';
                }
                return Response($output);
            } else {
                return response('no data', 404);
            }
        }
    } // end search
}
