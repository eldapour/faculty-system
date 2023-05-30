<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContact;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Setting;

class ContactController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $services = Service::get();
        return view('Front.contact', compact('settings','services'));
    } // end index

    public function contactStore(StoreContact $request)
    {
        $inputs = $request->all();

        if(Contact::create($inputs))
        {
            return response()->json(['status' => 200]);
        }
        else
        {
            return response()->json(['status' => 405]);
        }
    }
}
