<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataModification;
use App\Traits\PhotoTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;


class DataModificationController extends Controller
{
    use PhotoTrait;

    public function store(Request $request)
    {
        $check_column = Schema::getColumnListing('data_modifications');

        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        $inputs['request_date'] = Carbon::now();
        $inputs['year'] = Carbon::now()->format('Y');
        $inputs['card_image'] = $this->saveImage($inputs['card_image'], 'uploads/data_modification', 'photo');

//        return $inputs;
        $data_mod = DataModification::create([
            'user_id' => auth()->user()->id,
            'request_date' => Carbon::now(),
            'year' => Carbon::now()->format('Y'),
            'request_status' => 'new',
            'card_image' => $inputs['card_image'],
            $inputs['data_modification'] => 1,
        ]);

        return redirect()->route('profile')->with('success',trans('admin.order_success'));
    }
}
