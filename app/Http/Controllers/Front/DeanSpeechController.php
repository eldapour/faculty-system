<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeanSpeechController extends Controller
{
    public function index()
    {
        return view('front.college.dean_speech');
    }
}
