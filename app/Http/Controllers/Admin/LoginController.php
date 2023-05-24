<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    public function index(){
        if (Auth::guard('web')->check()){
            return redirect('admin');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validate([
            'email'   =>'required|exists:users',
            'password'=>'required',
            'user_type' => 'required|exists:users'
        ],[
            'email.exists'      => 'هذا البريد غير مسجل',
            'email.required'    => 'يرجي ادخال البريد الالكتروني',
            'password.required' => 'يرجي ادخال كلمة المرور',
            'user_type.exists' => 'هذا النوع لا ينتمي للبريد المسجل'
        ]);
        if (Auth::guard('web')->attempt($data)){
            return response()->json(200);
        }
        return response()->json(405);
    }

    public function logout(){
        Auth::guard('web')->logout();
        return response()->json(200);
    }

}//end class
