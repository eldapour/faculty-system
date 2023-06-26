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

class UserController extends Controller
{
    //all of students
    public function index(request $request)
    {

        if ($request->ajax()) {
            $users = User::query()
                ->where('user_type','=','student')
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
                ->editColumn('first_name', function($user) {
                    return '<td>'. $user->first_name .'  '. $user->last_name .'</td>';
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
            return view('admin/users/index');
        }
    }


    public function delete(Request $request)
    {
        $user = User::query()
        ->where('id', $request->id)
            ->first();

        if($user->image != null){

            if (file_exists(public_path("uploads/users/". $user->image))) {
                unlink(public_path("uploads/users/". $user->image));

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

        return view('admin/users.parts.create', compact('types'));
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|unique:users,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'university_email'  => 'required|unique:users,university_email',
            'identifier_id' => 'required|unique:users,identifier_id',
            'national_id'  => 'required|unique:users,national_id',
            'national_number' => 'required|unique:users,national_number',
            'birthday_date' => 'required|date_format:Y-m-d',
            'university_register_year' => 'required|min:'. (date('Y')),
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
            'user_status' => 'un_active',
            'university_register_year' => $request->university_register_year,
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

        return view('admin/users/parts.edit', compact('user'));
    }



    public function update(Request $request): JsonResponse
    {


        $user = User::query()
            ->findOrFail($request->id);

        $request->validate([
            'email' => 'required|unique:users,email,' . $request->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'nullable|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'university_email'  => 'nullable|unique:users,university_email,' . $request->id,
            'identifier_id' => 'nullable|unique:users,identifier_id,' . $request->id,
            'national_id'  => 'nullable|unique:users,national_id,' . $request->id,
            'national_number' => 'nullable|unique:users,national_number,' . $request->id,
            'birthday_date' => 'nullable|date_format:Y-m-d',
            'university_register_year' => 'nullable|min:'. (date('Y')),
        ]);

        if ($image = $request->file('image')) {

            $destinationPath = 'users/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";
        }


        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
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
            'university_register_year' => $request->university_register_year,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        if($user->save()){

            return response()->json(['status' => 200]);

        }else{

            return response()->json(['status' => 405]);
        }


    }
}
