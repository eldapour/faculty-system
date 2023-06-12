<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use DateTime;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectStudentRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\SubjectStudent;
use App\Models\User;
use App\Models\Subject;
use App\Models\Group;

class SubjectStudentController extends Controller
{
     // Index Start
     public function index(request $request)
     {
         if ($request->ajax()) {
             $subject_students = SubjectStudent::get();
             return Datatables::of($subject_students)
                 ->addColumn('action', function ($subject_students) {
                     return '
                             <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                     data-id="' . $subject_students->id . '" data-title="' . $subject_students->subject->subject_name . trans('admin.for') . $subject_students->user->first_name . '">
                                     <i class="fas fa-trash"></i>
                             </button>
                        ';
                 })
                 ->editColumn('user_id', function ($subject_students) {
                     return'<td>'. $subject_students->user->first_name .'</td>';
                 })
                 ->editColumn('subject_id', function ($subject_students) {
                     return'<td>'. $subject_students->subject->subject_name .'</td>';
                 })
                 ->editColumn('group_id', function ($subject_students) {
                     return'<td>'. $subject_students->group->group_name .'</td>';
                 })
                 ->editColumn('year', function ($subject_students) {
                    $date = new DateTime($subject_students->year);
                    return '<td>' . $date->format('Y') . '</td>';
                })
                 ->escapeColumns([])
                 ->make(true);
         } else {
             return view('admin.subject_students.index');
         }
     }


//    public function subjectStudent(request $request)
//    {
//        if ($request->ajax()) {
//
//            $period = \App\Models\Period::query()
//                ->where('status','=','start')
//                ->first();
//
//            $subject_students = SubjectStudent::query()
//                ->where('user_id','=',auth()->id())
//                ->where('year','=',$period->year)
//                ->get();
//
//
//            return Datatables::of($subject_students)
//                ->addColumn('action', function ($subject_students) {
//                    return '
//                             <button type="button" data-id="' . $subject_students->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
//                             <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
//                                     data-id="' . $subject_students->id . '" data-title="' . $subject_students->user->first_name . '">
//                                     <i class="fas fa-trash"></i>
//                             </button>
//                        ';
//                })
//                ->editColumn('user_id', function ($subject_students) {
//                    return'<td>'. $subject_students->user->first_name .'</td>';
//                })
//                ->editColumn('subject_id', function ($subject_students) {
//                    return'<td>'. $subject_students->subject->subject_name .'</td>';
//                })
//                ->editColumn('group_id', function ($subject_students) {
//                    return'<td>'. $subject_students->group->group_name .'</td>';
//                })
//                ->editColumn('year', function ($subject_students) {
//                    $date = new DateTime($subject_students->year);
//                    return '<td>' . $date->format('Y') . '</td>';
//                })
//                ->escapeColumns([])
//                ->make(true);
//        } else {
//            return view('admin.subject_students.student.index');
//        }
//    }


     public function create()
     {
         $data['users'] = User::query()
             ->where('user_type','=','student')
             ->select('id','identifier_id')
             ->get();


         $data['subjects'] = Subject::all();
         $data['groups'] = Group::all();
         $data['departments'] = Department::all();
         return view('admin.subject_students.parts.create', compact('data'));
     }



     public function store(SubjectStudentRequest $request): \Illuminate\Http\JsonResponse
     {


         $user = User::query()
             ->where('id','=',$request->user_id)
             ->first();

         if ($user->subjects()->syncWithPivotValues($request->subject_id,['group_id' => $request->group_id, 'year' =>  $request->year,'period' => $request->period])) {
             return response()->json(['status' => 200]);
         } else {
             return response()->json(['status' => 405]);
         }
     }

     public function edit(SubjectStudent $subjectStudent)
     {


         $data['subjects'] = Subject::all();
         $data['groups'] = Group::all();
         return view('admin.subject_students.parts.edit', compact('subjectStudent', 'data'));
     }


     public function update(Request $request, SubjectStudent $subjectStudent){

         if ($subjectStudent->update($request->all())) {
             return response()->json(['status' => 200]);
         } else {
             return response()->json(['status' => 405]);
         }
     }



     public function destroy(Request $request){

         $subject_students = SubjectStudent::where('id', $request->id)->firstOrFail();
         $subject_students->delete();
         return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
     }


}
