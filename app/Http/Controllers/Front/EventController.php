<?php

namespace App\Http\Controllers\Front;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $data['events'] = Event::latest()->get();
        return view('front.blogs.event', $data);
    }

    public function eventItem($id)
    {
        $event_item = Event::where('id', $id)->first();
        return view('front.blogs.single_event', compact('event_item'));
    }
}
