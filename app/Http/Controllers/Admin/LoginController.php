<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UniversitySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        if (Auth::guard('web')->check()) {
            return redirect('admin');
        }
        return view('admin.auth.login');
    }

    public function indexStudent()
    {
        if (Auth::guard('web')->check()) {
            return redirect('admin');
        }
        return view('admin.auth.login-student');
    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $maintenance = UniversitySetting::first('maintenance');
        if ($request->user_type == 'student' && $maintenance->maintenance == 1) {
            return response()->json(700);
        }else{
            $data = $request->validate([
                'email' => 'required|exists:users',
                'password' => 'required',
                'user_type' => 'required'
            ], [
                'email.exists' => trans('login.This mail is not registered'),
                'email.required' => trans('login.Please enter your e-mail'),
                'password.required' => trans('login.Please enter your password'),
            ]);
            if (Auth::guard('web')->attempt($data)) {
                return response()->json(200);
            } else {
                return response()->json(405);
            }
        }
    }

    public function logout()
    {
        if (\auth()->user()->user_type !== 'student') {
            Auth::logout();
            return redirect()->route('admin.login');
        } else {
            Auth::logout();
            return redirect()->route('student.login');
        }

    }

}//end class
