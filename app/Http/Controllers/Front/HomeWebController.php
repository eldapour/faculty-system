<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Event;
use App\Models\Slider;
use App\Models\Word;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Models\Video;

class HomeWebController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::all();
        $data['advertisements'] = Advertisement::latest()->limit(6)->get();
        $data['events'] = Event::latest()->limit(6)->get();
        $data['dean_speech'] = Word::all();
        $data['videos'] = Video::all();
        return view('front.index', $data);
    }
}
