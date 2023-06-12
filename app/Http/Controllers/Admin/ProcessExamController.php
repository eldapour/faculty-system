<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Models\User;
use App\Traits\PhotoTrait;
use App\Models\ProcessExam;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProcessExamRequest;

class ProcessExamController extends Controller
{
    use PhotoTrait;

    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $process_exams = ProcessExam::get();
            return Datatables::of($process_exams)
                ->addColumn('action', function ($process_exams) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $process_exams->id . '" data-title="' . $process_exams->user->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                 ->editColumn('user_id', function ($process_degrees) {
                     return '<td><a class="btn btn-primary">'. @$process_degrees->user->first_name .'  <i class="fa fa-user"></i><a/></td>';
                 })
                 ->editColumn('attachment_file', function ($process_degrees) {
                     return '<td><a target="_blank" class="btn btn-success" href="'.asset($process_degrees->attachment_file) .'">'. trans('admin.pdf') .'  <i class="fa fa-file-pdf"></i></a></td>';
                 })
                 ->editColumn('period', function ($process_degrees) {
                     return '<td><a target="_blank" class="btn btn-warning"> '. $process_degrees->period .' <i class="fa fa-leaf"></i></a></td>';
                 })
                 ->editColumn('year', function ($process_degrees) {
                    $date = new DateTime($process_degrees->year);
                    return '<td>' . $date->format('Y') . '</td>';
                })

                 ->editColumn('request_status', function ($process_degrees) {
                    return '<td><select class="form-control" data-id="'.  $process_degrees->id .'" onchange="updateRequestStatus(this, '.  $process_degrees->id .')">

                                <option '.($process_degrees->request_status == 'new' ? "selected" : "").' value="new">'. trans('admin.new') .'</option>
                                <option '.($process_degrees->request_status == 'accept' ? "selected" : "").' value="accept">'. trans('admin.accept') .'</option>
                                <option '.($process_degrees->request_status == 'refused' ? "selected" : "").' value="refused">'. trans('admin.refused') .'</option>
                                <option '.($process_degrees->request_status == 'under_processing' ? "selected" : "").' value="under_processing">'. trans('admin.under_processing') .'</option>
                            </select></td>';
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.process_exams.index');
        }
    }
    // Index End

     // index Student
     public function processExamStudent(Request $request)
     {
         if ($request->ajax()) {
             $process_exam_students = ProcessExam::query()
                 ->where('user_id', '=', Auth::id())
                 ->get();

             $data = collect();
             foreach ($process_exam_students as $process_exam_students) {
                 $data->push([
                     'user_id' => auth()->user()->first_name,
                     'request_status' => '<select class="form-control" data-id="' . $process_exam_students->id . '" onchange="updateRequestStatus(this, ' . $process_exam_students->id . ')">
                                         <option ' . ($process_exam_students->request_status == 'new' ? "selected" : "") . ' value="new">' . trans('admin.new') . '</option>
                                         <option ' . ($process_exam_students->request_status == 'accept' ? "selected" : "") . ' value="accept">' . trans('admin.accept') . '</option>
                                         <option ' . ($process_exam_students->request_status == 'refused' ? "selected" : "") . ' value="refused">' . trans('admin.refused') . '</option>
                                         <option ' . ($process_exam_students->request_status == 'under_processing' ? "selected" : "") . ' value="under_processing">' . trans('admin.under_processing') . '</option>
                                     </select>',
                     'action' => '<button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                 data-id="' . $process_exam_students->id . '" data-title="' . $process_exam_students->user . '">
                                 <i class="fas fa-trash"></i>' . trans("admin.delete") . '</button>'
                 ]);
             }
             return Datatables::of($data)
                 ->escapeColumns([])
                 ->make(true);
         } else {
             return view('admin.process_exams.procees_exam_students');
         }
     }

    // Create Start
    public function create()
    {
        $data['users'] = User::where('user_type', 'student')->get();
        return view('admin.process_exams.parts.create', compact('data'));
    }
    // Create End

    // Store Start

    public function store(ProcessExamRequest $request)
    {
        $inputs = $request->all();

        if($request->hasFile('attachment_file'))
        {
            $inputs['attachment_file'] = $this->saveImage($request->attachment_file, 'uploads/process_exams', 'pdf');
        }

        if (ProcessExam::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(ProcessExam $processExam)
    {
        $data['users'] = User::all();
        return view('admin.process_exams.parts.edit', compact('processExam', 'data'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, ProcessExam $processExam)
    {
        if ($processExam->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $processExam = ProcessExam::where('id', $request->id)->firstOrFail();
        $processExam->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End

    // Update Request Status
    public function updateRequestStatus(Request $request)
{
    $inputs = ProcessExam::find($request->id)->update([
        'request_status' => $request->status,
    ]);

    return response()->json(['code' => 200,'status'=> $request->status ]);
}

}
