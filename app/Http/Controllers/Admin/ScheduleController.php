<?php

namespace App\Http\Controllers\Admin;
use App\Models\Unit;
use App\Models\Group;
use App\Models\Schedule;
use App\Models\Department;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleStoreRequest;

class ScheduleController extends Controller{


    use PhotoTrait;
    public function index(Request $request)
    {
        if($request->ajax()) {
            $schedules = Schedule::query()
            ->latest()
                ->get();

            return Datatables::of($schedules)
                ->addColumn('action', function ($schedules) {
                    return '

                            <button '. (auth()->user()->user_type != 'employee' ? 'hidden' : '') .' type="button" data-id="' . $schedules->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button '. (auth()->user()->user_type != 'employee' ? 'hidden' : '') .' class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $schedules->id . '" data-title="' . $schedules->department->department_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })

                ->editColumn('department_id', function ($schedules) {

                    return $schedules->department->getTranslation('department_name', app()->getLocale());

                })

                ->editColumn('unit_id', function ($schedules) {

                    return $schedules->unit->getTranslation('unit_name', app()->getLocale());

                })->editColumn('pdf_upload', function ($schedules) {

                        return '
                    <a href="'. asset("uploads/schedules/".$schedules->pdf_upload)  .'" class="btn btn-pill btn-primary-light processing">'.trans('admin.schedule_pdf_upload').'</a>';
                })

                ->escapeColumns([])
                ->make(true);
        }else{
            return view('admin.schedules.index');
        }
    }


    public function create()
    {

        $units = Unit::query()
            ->select('id','unit_name')
            ->get();

        $departments = Department::query()
            ->select('id','department_name')
            ->get();

        return view('admin.schedules.parts.create',compact('departments','units'));
    }


    public function store(ScheduleStoreRequest $request): JsonResponse
    {

        if ($pdf = $request->file('pdf_upload')) {

            $destinationPath = 'uploads/schedules';
            $pdf_name = date('YmdHis') . "." . $pdf->getClientOriginalExtension();
            $pdf->move($destinationPath, $pdf_name);
            $request['pdf_upload'] = "$pdf_name";
        }

        $schedule = Schedule::create([

            'department_id' => $request->department_id,
            'unit_id' => $request->unit_id,
            'year' => $request->year,
            'pdf_upload' => $pdf_name,
            'description' => $request->description,

        ]);


        if ($schedule->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.parts.edit',compact('schedule'));
    }



    public function update(Request $request,Schedule $schedule): JsonResponse
    {

        $request->validate([
            'year' => 'required|date_format:Y|after_or_equal:1900',
            'pdf_upload' => 'nullable|mimes:pdf',
        ]);

        if ( $request->hasFile('pdf_upload')) {

            $pdf = $request->file('pdf_upload');
            $destinationPath = 'uploads/schedules';
            $pdf_name = date('YmdHis') . "." . $pdf->getClientOriginalExtension();
            $pdf->move($destinationPath,$pdf_name);

            $schedule->update([

                'pdf_upload' => $pdf_name,

            ]);

            if(file_exists(public_path('uploads/schedules/'. $schedule->pdf_upload))){
                unlink(public_path('uploads/schedules/'. $schedule->pdf_upload));
            }
        }else{

            $schedule->update(['pdf_upload' => $schedule->pdf_upload]);
        }


        return response()->json(['status' => 200]);
    }

    public function delete(Request $request)
    {
        $schedule = Schedule::findOrFail($request->id);

        $schedule->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }
}
