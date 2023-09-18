<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyCountStoreRequest;
use App\Http\Requests\FacultyCountUpdateRequest;
use App\Models\FacultyCount;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FacultyCountController extends Controller
{
    use PhotoTrait;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index(request $request)
    {
        if ($request->ajax()) {
            $counts = FacultyCount::query()->get();
            return Datatables::of($counts)
                ->addColumn('action', function ($counts) {
                    return '
                            <button type="button" data-id="' . $counts->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $counts->id . '" data-title="' . $counts->title . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('title', function ($counts) {
                    return $counts->getTranslation('title', app()->getLocale());
                })
                ->editColumn('image', function ($counts) {
                    return
                        '<img alt="image" class="avatar avatar-md rounded-circle" src="' . asset($counts->image) . '">';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.faculty_count.index');
        } // end if
    } // end index

    public function create()
    {
        return view('admin.faculty_count.parts.create');
    } // end create

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Buglinjo\LaravelWebp\Exceptions\CwebpShellExecutionFailed
     * @throws \Buglinjo\LaravelWebp\Exceptions\DriverIsNotSupportedException
     * @throws \Buglinjo\LaravelWebp\Exceptions\ImageMimeNotSupportedException
     */
    public function store(FacultyCountStoreRequest $request)
    {
        $image = $request->image;

        if ($request->has('image')) {
            $image = $this->saveImage($request->image, 'uploads/facultyCount', 'photo');
        }

        $facultyCount = FacultyCount::query()
            ->create([
                'title' => $request->title,
                'image' => $image,
                'count' => $request->count
            ]);

        if ($facultyCount->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        } // end if
    } // end store

    public function edit(FacultyCount $facultyCount)
    {
        return view('admin.faculty_count.parts.edit',compact('facultyCount'));
    } // end edit

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Buglinjo\LaravelWebp\Exceptions\CwebpShellExecutionFailed
     * @throws \Buglinjo\LaravelWebp\Exceptions\DriverIsNotSupportedException
     * @throws \Buglinjo\LaravelWebp\Exceptions\ImageMimeNotSupportedException
     */
    public function update(FacultyCountUpdateRequest $request)
    {
        // get FacultyCount
        $facultyCount = FacultyCount::query()
            ->findOrFail($request->id);

        // declare vars
        $image = $request->image;
        $old_image = $facultyCount->image;

        if ($request->has('image')) {
            $image = $this->saveImage($request->image, 'uploads/facultyCount', 'photo');
            if (file_exists($old_image)) {
                unlink($old_image);
            }
        } else {
           $image = $old_image;
        } // end if save image

        $facultyCount->update([
            'title' => $request->title,
            'image' => $image,
            'count' => $request->count
        ]); // end update request

        if ($facultyCount->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        } // end if save object
    } // end update

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy(Request $request){

        $facultyCount = FacultyCount::query()
        ->where('id', $request->id)->firstOrFail();
        $facultyCount->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end delete
}
