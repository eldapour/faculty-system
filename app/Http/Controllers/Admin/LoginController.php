<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UniversitySetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        } else {
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
                if (\auth()->user()->user_status !== 'un_active'){
                    return response()->json(200);
                }else {
                    return response()->json(600);
                }
            } else {
                return response()->json(405);
            }
        }
    } // end Login

    public function activeStudent(Request $request)
    {
        return view('admin.auth.active-student');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function activeStudents(Request $request)
    {
        $user = User::where('email', '=', $request->email)
            ->where('user_type', '=', 'student')
            ->where('national_id', '=', $request->national_id)
            ->where('birthday_date', '=', $request->birthday_date)
            ->where('national_number', '=', $request->national_number)
            ->first();
        if ($user) {
            if ($user->user_status !== 'un_active') {
                return response()->json(401);
            } else {
                $data = array('name'=>$user->first_name .' ' . $user->last_name,'email' => $user->email);
                Mail::send('admin.mail', $data, function($message) use ($user) {
                    $message->to($user->email,$user->first_name)->subject
                    ('Activation Email');
                    $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                });
                return response()->json(200);
            }
        } else {
            return response()->json(600);
        }
    } // end active Student

    public function activeStd($email)
    {
        $user = User::where('email', '=', $email)->first();
        $user->user_status = 'active';
        $user->save();
        return view('admin.mail_active');
    }

    public function resetPassView(Request $request)
    {
        return view('admin.mailPass');
    }

    public function resetPass(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', '=', $email)->first();
        $token = rand(10,30);
        dd($request->all());
        $data = array('name'=>$user->first_name .' ' . $user->last_name,'email' => $user->email);
        Mail::send('admin.password_reset', $data, function($message) use ($user,$email) {
            $message->to($email,$user->first_name)->subject
            ('Reset Password');
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
        });
        return redirect()->route('student.login')->with('success', 'check your email');
    }

    public function doResetPass($email)
    {
        return view('admin.do_password_reset',compact('email'));
    }


    public function DoneResetPass(Request $request)
    {
        $email = $request->email;
       $user = User::where('email', '=', $request->email)->first();
       $user->password = Hash::make($request->password);
       $user->save();
       return redirect()->route('student.login')->with('success', 'check your email');
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

    } // end logout()

}//end class
