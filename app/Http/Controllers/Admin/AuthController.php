<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function index(request $request)
    {

        if ($request->ajax()) {
            $users = User::latest()->get();
            return Datatables::of($users)
                ->addColumn('action', function ($user) {
                    return '
                            <button type="button" data-id="' . $user->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $user->id . '" data-title="' . $user->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('created_at', function ($user) {

                    return $user->created_at->diffForHumans();

                })

                ->editColumn('city', function ($user) {

                    return $user->getTranslation('city','ar');

                })
                ->editColumn('image', function ($user) {

                    if($user->image != null){
                        return '
                    <img alt="image" class="avatar avatar-md rounded-circle" src="' . asset("uploads/users/".$user->image)  .'">
                    ';
                    }else{

                        return '
                    <img alt="image" class="avatar avatar-md rounded-circle" src="' .  asset("uploads/users/default/avatar2.jfif") .'">
                    ';
                    }

                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('users/index');
        }
    }


    public function delete(Request $request)
    {
        $user = User::query()
        ->where('id', $request->id)
            ->first();

        if($user->image != null){

            if (file_exists(public_path("users/". $user->image))) {
                unlink(public_path("users/". $user->image));

                $user->delete();
                return response(['message' => 'user Deleted Successfully', 'status' => 200], 200);

            }else{

                return response(['message' => 'Error delete image user', 'status' => 500], 500);

            }

        }else{

            $user->delete();
            return response(['message' => 'user Deleted Successfully', 'status' => 200], 200);
        }


    }


    public function create()
    {
        $types = ['student','doctor','employee','manger','factor'];

        return view('users.parts.create', compact('types'));
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|unique:users,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'university_email'  => 'nullable|unique:users,university_email',
            'identifier_id' => 'nullable|unique:users,identifier_id',
            'national_id'  => 'nullable|unique:users,national_id',
            'national_number' => 'nullable|unique:users,national_number',
            'birthday_date' => 'nullable|date_format:Y-m-d',
            'user_type' => 'required|in:student,doctor,manger,employee,factor',
            'university_register_year' => 'nullable|min:'. (date('Y')),
            'job_id' => 'nullable|unique:users,job_id',
        ]);


        if ($image = $request->file('image')) {

            $destinationPath = 'users/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";
        }


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->first_name,
            'image' => $profileImage ?? null,
            'university_email' => $request->university_email,
            'identifier_id' => $request->identifier_id,
            'national_id' => $request->national_id,
            'national_number' => $request->national_number,
            'nationality' => $request->nationality,
            'birthday_date' => $request->birthday_date,
            'city' => ["ar" => $request->city_ar, "en" => $request->city_en, "fr" => $request->city_fr],
            'birthday_place' => ["ar" => $request->birthday_place_ar, "en" => $request->birthday_place_en, "fr" => $request->birthday_place_fr],
            'address' => $request->address,
            'user_type' => $request->user_type,
            'university_register_year' => $request->university_register_year,
            'job_id' => $request->job_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        if($user->save()){

            return response()->json(['status' => 200]);

        }else{

            return response()->json(['status' => 405]);
        }

    }

    public function edit(User $user)
    {

        return view('users/parts.edit', compact('user'));
    }



    public function update(Request $request): JsonResponse
    {

        $user = User::query()
            ->findOrFail($request->id);

        $request->validate([
            'email' => 'required|unique:users,email,' . $user->email,
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'university_email'  => 'nullable|unique:users,university_email,' . $user->university_email,
            'identifier_id' => 'nullable|unique:users,identifier_id,' . $user->identifier_id,
            'national_id'  => 'nullable|unique:users,national_id,' . $user->national_id,
            'national_number' => 'nullable|unique:users,national_number,' . $user->national_number,
            'birthday_date' => 'nullable|date_format:Y-m-d',
            'user_type' => 'required|in:student,doctor,manger,employee,factor',
            'university_register_year' => 'nullable|min:'. (date('Y')),
            'job_id' => 'nullable|unique:users,job_id',
        ]);

        if ($image = $request->file('image')) {

            $destinationPath = 'users/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";
        }


        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->first_name,
            'image' => $request->image != null ? $profileImage : $user->image,
            'university_email' => $request->university_email,
            'identifier_id' => $request->identifier_id,
            'national_id' => $request->national_id,
            'national_number' => $request->national_number,
            'nationality' => $request->nationality,
            'birthday_date' => $request->birthday_date,
            'city' => ["ar" => $request->city_ar, "en" => $request->city_en, "fr" => $request->city_fr],
            'birthday_place' => ["ar" => $request->birthday_place_ar, "en" => $request->birthday_place_en, "fr" => $request->birthday_place_fr],
            'address' => $request->address,
            'user_type' => $request->user_type,
            'university_register_year' => $request->university_register_year,
            'job_id' => $request->job_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($user->save()){

            return response()->json(['status' => 200]);

        }else{

            return response()->json(['status' => 405]);
        }


    }
}//end class
