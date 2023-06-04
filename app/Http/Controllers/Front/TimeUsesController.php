<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeUsesController extends Controller
{
    public function index()
    {
        return view('front.study_progress.time_uses');
    }
}
