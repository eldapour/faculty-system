<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideo;
USE App\Models\Video;
use App\Traits\PhotoTrait;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    use PhotoTrait;

    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $videos = Video::get();
            return Datatables::of($videos)
                ->addColumn('action', function ($videos) {
                    return '
                            <button type="button" data-id="' . $videos->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $videos->id . '" data-title="' . $videos->title[lang()] . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('title', function ($videos) {
                    return'<td>'. $videos->title[lang()] .'</td>';
                })
                ->editColumn('background_image', function ($videos) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($videos->background_image) . '">
                    ';
                })
                ->editColumn('description', function ($videos) {
                    return'<td>'. $videos->description[lang()] .'</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.videos.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        return view('admin.videos.parts.create');
    }
    // Create End

    // Store Start

    public function store(StoreVideo $request)
    {
        $inputs = $request->all();

        if ($request->has('background_image')) {
            $inputs['background_image'] = $this->saveImage($request->background_image, 'uploads/videos', 'photo');
        }
        if (Video::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Video $video)
    {
        return view('admin.videos.parts.edit', compact('video'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, Video $video)
    {
        if ($video->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $video = Video::where('id', $request->id)->firstOrFail();
        $video->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
