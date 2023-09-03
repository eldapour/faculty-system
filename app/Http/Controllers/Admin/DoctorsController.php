<?php

namespace App\Http\Controllers\Admin;
use App\Exports\DoctorExport;
use App\Imports\DoctorImport;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class DoctorsController extends Controller
{

    public function index(request $request)
    {

        if ($request->ajax()) {

            $doctors = User::query()
                ->where('user_type', '=', 'doctor')
                ->latest()
                ->get();

            return Datatables::of($doctors)
                ->addColumn('action', function ($doctors) {
                    return '
                            <button type="button" data-id="' . $doctors->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $doctors->id . '" data-title="' . $doctors->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->addColumn('name', function ($doctors) {

                    return $doctors->first_name . ' ' . $doctors->last_name;
                })
                ->addColumn('name_latin', function ($doctors) {

                    return $doctors->first_name_latin . ' ' . $doctors->last_name_latin;

                })
                ->addColumn('professor_position', function ($doctors) {
                    if ($doctors->professor_position == 'official_professor')
                    {
                        return trans('admin.official_professor');
                    } else {
                        return trans('admin.visiting_professor');
                    }

                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.doctors.index');
        }
    }



    public function create()
    {

        // $professor_positions = ['official_professor','visiting_professor'];

        return view('admin.doctors.parts.create');
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'first_name_latin' => 'required',
            'last_name_latin' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'professor_position' => 'required|in:official_professor,visiting_professor',
            'job_id' => 'required|unique:users,job_id',
        ]);


        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/users/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";
        }

        $doctor = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'first_name_latin' => $request->first_name_latin,
            'last_name_latin' => $request->last_name_latin,
            'image' => $profileImage ?? null,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'doctor',
            'job_id' => $request->job_id,
            'professor_position' => $request->professor_position
        ]);

        if ($doctor->save()) {

            return response()->json(['status' => 200]);

        } else {

            return response()->json(['status' => 405]);
        }

    }

    public function edit(User $doctor)
    {

        $professor_positions = ['official_professor','visiting_professor'];

        return view('admin.doctors.parts.edit', compact('professor_positions','doctor'));
    }


    public function update(Request $request): JsonResponse{

        $doctor = User::query()
            ->findOrFail($request->id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'first_name_latin' => 'required',
            'last_name_latin' => 'required',
            'email' => 'required|unique:users,email,' . $request->id,
            'password' => 'nullable|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'professor_position' => 'required|in:official_professor,visiting_professor',
            'job_id' => 'required|unique:users,job_id,' . $request->id,
        ]);

        if ($image = $request->file('image')) {

            $destinationPath = 'uploads/users';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";


            if (file_exists(public_path('uploads/users/'.$doctor->image)) && $doctor->image != null) {
                unlink(public_path('uploads/users/'.$doctor->image));
            }
        }


        $doctor->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'first_name_latin' => $request->first_name_latin,
            'last_name_latin' => $request->last_name_latin,
            'image' => $request->image != null ? $profileImage : $doctor->image,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'job_id' => $request->job_id,

        ]);

        if ($doctor->save()) {

            return response()->json(['status' => 200]);

        } else {

            return response()->json(['status' => 405]);
        }
    }

    public function delete(Request $request)
    {
        $doctor = User::query()
            ->where('id', $request->id)
            ->first();

        if ($doctor->image != null) {

            if (file_exists(public_path("uploads/users/" . $doctor->image))) {
                unlink(public_path("uploads/users/" . $doctor->image));

                $doctor->delete();
                return response(['message' => 'user Deleted Successfully', 'status' => 200], 200);

            } else {
                return response(['message' => 'Error delete image user', 'status' => 500], 500);

            }

        } else {

            $doctor->delete();
            return response(['message' => 'user Deleted Successfully', 'status' => 200], 200);
        }
    } // end delete


    public function exportDoctor()
    {
        return Excel::download(new DoctorExport(), 'Doctors.xlsx');
    }

    public function importDoctor(Request $request): JsonResponse
    {
        $import = Excel::import(new DoctorImport(),$request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    }

}
