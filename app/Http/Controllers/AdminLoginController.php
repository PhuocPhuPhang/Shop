<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Charts;
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
         if(Auth::user()->quyen == 1)
         {
            return redirect('admin/index');
         }
         else
         {
            return redirect('index');
         }

     }
     else
     {
      return back()->with('error', 'Vui lòng kiểm tra thông tin đăng nhập');
     }
    }

    public function SuccessLogin()
    {
        $data = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart = Charts::database($data, 'bar', 'HighCharts')
                ->title("Thống kê tài khoản đăng ký hàng tháng")
                ->elementLabel("Tổng số người dùng")
                ->responsive(false)
                ->groupByMonth(date('Y'), true);

        return view('admin.layouts.index',compact('chart'));
    }

     public function Logout()
    {
     Auth::logout();
     return redirect('admin/login');
    }
}
