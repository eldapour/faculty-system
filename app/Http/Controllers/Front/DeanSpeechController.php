<?php

namespace App\Http\Controllers\Front;

use App\Models\Word;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeanSpeechController extends Controller
{
    public function index()
    {
        $data['dean_speech'] = Word::first();
        return view('front.college.dean_speech', $data);
    }
}
