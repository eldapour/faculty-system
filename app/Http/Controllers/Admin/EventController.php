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

    public function index(request $request)
    {
        if ($request->ajax()) {
            $events = Event::get();
            return Datatables::of($events)
                ->addColumn('action', function ($events) {
                    return '
                            <button type="button" data-id="' . $events->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $events->id . '" data-title="' . $events->title . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('title', function ($events) {
                    return '<td>' . $events->title . '</td>';
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
                    return '<td>' . $events->description . '</td>';
                })
                ->editColumn('category_id', function ($events) {
                    return '<td>' . $events->category->category_name . '</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.events.index');
        }
    } // end index


    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.events.parts.create', compact('data'));
    } // end create

    public function store(EventRequest $request): \Illuminate\Http\JsonResponse
    {
        $inputs = $request->all();

        if ($request->has('image')) {
            $inputs['image'] = $this->saveImage($request->image, 'uploads/events/images', 'photo');
        }
        if ($request->has('file')) {
            $inputs['file'] = $this->saveImage($request->file, 'uploads/events/files', 'file');
        }
        if ($request->has('background_image')) {
            $inputs['background_image'] = $this->saveImage($request->background_image, 'uploads/events/background_image', 'photo');
        }
        if (Event::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    } // end store


    public function edit(Event $event)
    {
        $data['categories'] = Category::query()->select('id', 'category_name')->get();
        return view('admin.events.parts.edit', compact('event', 'data'));
    } // end edit


    public function update(Request $request, Event $event): \Illuminate\Http\JsonResponse
    {

        $inputs = $request->all();
        if ($request->has('image')) {
            if (file_exists($event->image)) {
                unlink($event->image);
            }
            $inputs['image'] = $this->saveImage($request->image, 'uploads/events/images', 'photo');
        } // end of request image upload

        if ($request->has('file')) {
            if (file_exists($event->file)) {
                unlink($event->file);
            }
            $inputs['file'] = $this->saveImage($request->file, 'uploads/events/files', 'file');
        }// end of request file upload

        if ($request->has('background_image')) {
            if (file_exists($event->background_image)) {
                unlink($event->background_image);
            }
            $inputs['background_image'] = $this->saveImage($request->background_image, 'uploads/events/background_images', 'photo');
        } // end of request background image upload

        if ($event->update($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    } // end update



    public function destroy(Request $request)
    {
        $event = Event::where('id', $request->id)->firstOrFail();
        $event->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end destroy

}
