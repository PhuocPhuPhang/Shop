<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
     return view('admin.login');
    }

    public function CheckLogin(Request $request)
    {


     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:3'
     ],[
         'email.required'=>'Bạn chưa nhập Email',
         'password.required'=>'Bạn chưa nhập mật khẩu',
         'password.alphaNum'=>'Mật khẩu bao gồm chữ và số',
         'password.min'=>'Mật khẩu không được nhỏ hơn 3 ký tự',
     ]);

     $user_data = array(
        'email'  => $request->get('email'),
        'password' => $request->get('password')
       );

     if(Auth::attempt($user_data))
     {
      return redirect('admin/index');
     }
     else
     {
      return back()->with('error', 'Lỗi');
     }
    }

    public function SuccessLogin()
    {
        return view('admin.layouts.index');
    }
     public function Logout()
    {
     Auth::logout();
     return redirect('admin/login');
    }
}
