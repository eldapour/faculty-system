<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Category;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;

class EventController extends Controller
{

    use PhotoTrait;
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $events = Event::get();
            return Datatables::of($events)
                ->addColumn('action', function ($events) {
                    return '
                            <button type="button" data-id="' . $events->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $events->id . '" data-title="' . $events->title[lang()] . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('title', function ($events) {
                    return'<td>'. $events->title[lang()] .'</td>';
                })
                ->editColumn('image', function ($events) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($events->image) . '">
                    ';
                })
                ->editColumn('background_image', function ($events) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($events->background_image) . '">
                    ';
                })
                ->editColumn('description', function ($events) {
                    return'<td>'. $events->description[lang()] .'</td>';
                })
                ->editColumn('category_id', function ($events) {
                    return'<td>'. @$events->category->category_name[lang()] .'</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.events.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.events.parts.create', compact('data'));
    }
    // Create End

    // Store Start

    public function store(EventRequest $request)
    {
        $inputs = $request->all();

        if ($request->has('image')) {
            $inputs['image'] = $this->saveImage($request->image, 'uploads/events/images', 'photo');
        }
        if ($request->has('background_image')) {
            $inputs['background_image'] = $this->saveImage($request->background_image, 'uploads/events/background_image', 'photo');
        }
        if (Event::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Event $event)
    {
        $data['categories'] = Category::all();
        return view('admin.events.parts.edit', compact('event', 'data'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, Event $event)
    {
        if ($event->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $event = Event::where('id', $request->id)->firstOrFail();
        $event->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
