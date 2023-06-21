<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\SubjectUnitDoctor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubjectController extends Controller{

    public function index(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $subject_unit_doctors = SubjectUnitDoctor::query()
                ->where('period','=',$period->period)
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($subject_unit_doctors)

                ->editColumn('subject_id', function ($subject_unit_doctors) {
                    return'<td>'. $subject_unit_doctors->subject->subject_name .'</td>';
                })
                ->addColumn('group_id', function ($subject_unit_doctors) {
                    return'<td>'. $subject_unit_doctors->subject->group->group_name .'</td>';
                })
                ->addColumn('unit_id', function ($subject_unit_doctors) {
                    return'<td>'. $subject_unit_doctors->subject->unit->unit_name .'</td>';
                })
                ->editColumn('year', function ($subject_unit_doctors) {
                    $date = new DateTime($subject_unit_doctors->year);
                    return '<td>' . $date->format('Y') . '</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_unit_doctors.doctors.index');
        }
    }

}
