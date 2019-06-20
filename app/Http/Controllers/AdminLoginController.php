<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\ThongTinUser;
use DB;
use Illuminate\Support\Facades\Hash;

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

    public function Register(Request $request)
    {
        $this->validate($request,[
            'username'          =>'required|min:3|max:255',
            'email_create'      => 'required|max:255|unique:users,email',
            'password_create'   => 'required|alphaNum|min:3|max:255'
        ],[
            'username.required'         =>'Bạn chưa nhập username',
            'username.min'              =>'Username có độ dài hơn 3 ký tự',
            'username.max'              =>'Username có độ dài tối đa là 255 ký tự',
            'email_create.required'     =>'Bạn chưa nhập email',
            'email_create.max'          =>'Email có độ dài tối đa là 255 ký tự',
            'email_create.required'     =>'Email đã tồn tại',
            'password_create.required'  =>'Bạn chưa nhập password',
            'password_create.alphaNum'  =>'Password phải bao gồm chữ và số',
            'password_create.min'       =>'Password có độ dài hơn 3 ký tự',
            'password_create.max'       =>'Password có độ dài tối đa 255 ký tự'
        ]);

        $user = new User;
        $user->email = $request->email_create;
        $password = $request->password_create;
        $user->password = $password;
        $user->quyen = 1;

        $ma = "KH" . rand(00000000,99999999);
        DB::table('thong_tin_nguoi_dung')->insert(['ma_nguoi_dung'=>$ma,'ten'=>$request->username]);

        $user->save();
        return redirect('admin/login#register')->with('thongbao','Tạo tài khoản thành công');
    }
}
