<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateImageProfileRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller{


    public function userEditProfileCreate(){

        return view('student.profile.edit_profile');
    }

    public function userEditProfile(UpdateImageProfileRequest $request): JsonResponse
    {

        $user = Auth::user();

        if ($image = $request->file('image')) {

            $destinationPath = 'uploads/users/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";


            if (file_exists(public_path('uploads/users/' . $user->image)) && $user->image != null) {
                unlink(public_path('uploads/users/' . $user->image));
            }
        }

        $user->update(['image' => $request->image != null ? $profileImage : $user->image]);

        if ($user->save()) {

            return response()->json(['status' => 200]);
        } else {

            return response()->json(['status' => 405]);
        }
    }

}
