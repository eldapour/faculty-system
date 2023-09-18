<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Schedule;
use Illuminate\Http\Request;

class TimeUsesController extends Controller
{
    public function index()
    {
        $data['times'] = Schedule::all();
        $data['advertisements'] = Advertisement::latest()->take(3)->get();
        return view('front.study_progress.time_uses', $data);
    }
}
