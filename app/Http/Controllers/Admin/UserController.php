<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserExport;
use App\Http\Middleware\CheckForbidden;
use App\Imports\UserImport;
use App\Models\StudentType;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(CheckForbidden::class)->except('pointUser');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|JsonResponse
     * @throws \Exception
     */
    public function index(request $request)
    {

        if ($request->ajax()) {
            $users = User::query()
                ->where('user_type', '=', 'student')
                ->latest()
                ->get();

            return Datatables::of($users)
                ->addColumn('action', function ($user) {
                    return '
                            <button type="button" data-id="' . $user->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $user->id . '" data-title="' . $user->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('created_at', function ($user) {

                    return $user->created_at->diffForHumans();
                })
                ->editColumn('student_type_id', function ($user) {

                    return $user->types->student_type ?? '';
                })
                ->editColumn('image', function ($user) {

                    if ($user->image != null) {
                        return '
                    <img alt="image" class="avatar avatar-md rounded-circle" src="' . asset("uploads/users/" . $user->image) . '">
                    ';
                    } else {

                        return '
                    <img alt="image" class="avatar avatar-md rounded-circle" src="' . asset("uploads/users/default/avatar2.jfif") . '">
                    ';
                    }
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin/users/index');
        }
    }


    public function pointUser(request $request)
    {
        if ($request->ajax()) {
            $users = User::query()
                ->where('id', '=', auth()->user()->id)
                ->select('id', 'first_name', 'points')
                ->get();

            return Datatables::of($users)
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin/users/students/index');
        }
    }

    // user point


    public function delete(Request $request)
    {
        $user = User::query()
            ->where('id', $request->id)
            ->first();

        if ($user->image != null) {

            if (file_exists(public_path("uploads/users/" . $user->image))) {
                unlink(public_path("uploads/users/" . $user->image));

                $user->delete();
                return response(['message' => 'user Deleted Successfully', 'status' => 200], 200);
            } else {

                return response(['message' => 'Error delete image user', 'status' => 500], 500);
            }
        } else {
            $user->delete();
            return response(['message' => 'user Deleted Successfully', 'status' => 200], 200);
        }
    }


    public function create()
    {

        $types = ['student', 'doctor', 'employee', 'manger', 'factor'];
        $studentTypes = StudentType::query()
            ->select('student_type', 'id')
            ->get();

        return view('admin/users.parts.create', compact('types','studentTypes'));
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([

            'first_name' => 'required',
            'last_name' => 'required',
            'first_name_latin' => 'required',
            'last_name_latin' => 'required',
            'email' => 'required|unique:users,email',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'university_email' => 'required|unique:users,university_email',
            'identifier_id' => 'required|unique:users,identifier_id',
            'national_id' => 'required|unique:users,national_id',
            'national_number' => 'required|unique:users,national_number',
            'birthday_date' => 'required|date_format:Y-m-d',
            'birthday_place' => 'required',
            'city_ar' => 'required',
            'city_latin' => 'required',
            'address' => 'required',
            'student_type_id' => 'required',
            'country_address_ar' => 'required',
            'country_address_latin' => 'required',
            'university_register_year' => 'required',
        ]);


        if ($image = $request->file('image')) {

            $destinationPath = 'uploads/users/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";
        }


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'first_name_latin' => $request->first_name_latin,
            'last_name_latin' => $request->last_name_latin,
            'image' => $profileImage ?? null,
            'university_email' => $request->university_email,
            'identifier_id' => $request->identifier_id,
            'national_id' => $request->national_id,
            'national_number' => $request->national_number,
            'nationality' => $request->nationality,
            'birthday_date' => $request->birthday_date,
            'birthday_place' => $request->birthday_place,
            'city_ar' => $request->city_ar,
            'city_latin' => $request->city_latin,
            'address' => $request->address,
            'country_address_ar' => $request->country_address_ar,
            'country_address_latin' => $request->country_address_latin,
            'user_status' => 'un_active',
            'university_register_year' => $request->university_register_year,
            'student_type_id' => $request->student_type_id,
            'email' => $request->email,

        ]);

        if ($user->save()) {

            return response()->json(['status' => 200]);
        } else {

            return response()->json(['status' => 405]);
        }
    }

    public function edit(User $user)
    {

        $studentTypes = StudentType::query()
            ->select('student_type', 'id')
            ->get();

        return view('admin/users/parts.edit', compact('user','studentTypes'));
    }


    public function update(Request $request): JsonResponse
    {


        $user = User::query()
            ->findOrFail($request->id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'first_name_latin' => 'required',
            'last_name_latin' => 'required',
            'email' => 'required|unique:users,email,' . $request->id,
            'password' => 'nullable|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'university_email' => 'nullable|unique:users,university_email,' . $request->id,
            'identifier_id' => 'nullable|unique:users,identifier_id,' . $request->id,
            'national_id' => 'nullable|unique:users,national_id,' . $request->id,
            'national_number' => 'nullable|unique:users,national_number,' . $request->id,
            'birthday_date' => 'nullable|date_format:Y-m-d',
            'birthday_place' => 'required',
            'city_ar' => 'required',
            'city_latin' => 'required',
            'address' => 'required',
            'student_type_id' => 'required',
            'country_address_ar' => 'required',
            'country_address_latin' => 'required',
            'university_register_year' => 'nullable'
        ]);

        if ($image = $request->file('image')) {

            $destinationPath = 'uploads/users/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";


            if (file_exists(public_path('uploads/users/' . $user->image)) && $user->image != null) {
                unlink(public_path('uploads/users/' . $user->image));
            }
        }


        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'first_name_latin' => $request->first_name_latin,
            'last_name_latin' => $request->last_name_latin,
            'image' => $request->image != null ? $profileImage : $user->image,
            'university_email' => $request->university_email,
            'identifier_id' => $request->identifier_id,
            'national_id' => $request->national_id,
            'student_type_id' => $request->student_type_id,
            'national_number' => $request->national_number,
            'nationality' => $request->nationality,
            'birthday_date' => $request->birthday_date,
            'birthday_place' => $request->birthday_place,
            'city_ar' => $request->city_ar,
            'city_latin' => $request->city_latin,
            'address' => $request->address,
            'country_address_ar' => $request->country_address_ar,
            'country_address_latin' => $request->country_address_latin,
            'university_register_year' => $request->university_register_year,
            'email' => $request->email,
            'points' => $request->points,
            'password' => Hash::make($request->password),

        ]);

        if ($user->save()) {

            return response()->json(['status' => 200]);
        } else {

            return response()->json(['status' => 405]);
        }
    }

    public function exportUser(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new UserExport(), 'Students.xlsx');
    }

    public function importUser(Request $request): JsonResponse
    {
        $import = Excel::import(new UserImport(), $request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    }

}
