<?php

namespace App\Http\Controllers\Front;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $data['events'] = Event::all();
        return view('front.blogs.event', $data);
    }
}
