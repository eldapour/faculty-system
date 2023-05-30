<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $data['questions'] = Question::get();
        $data['settings'] = Setting::first();
        $data['slider'] = Slider::first();
        return view('Front.faqs')->with($data);
    }
}
