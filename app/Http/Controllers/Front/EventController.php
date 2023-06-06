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

    public function eventItem($id)
    {
        $data['event_items'] = Event::where('id', $id)->get();
        return view('front.blogs.single_event', $data);
    }
}
