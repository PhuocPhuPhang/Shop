<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;
use App\Slide;
use App\TinTuc;
use App\NhaCungCap;
use App\User;
use App\ThongTinUser;
use DB;

class PageControllers extends Controller
{
    function __construct(){
        $nhacungcap =  NhaCungCap::all();
        $tintuc= TinTuc::all();
        view()->share('nhacungcap',$nhacungcap);
        view()->share('tintuc',$tintuc);
    }

    public function index()
    {
        $slide= Slide::all();
        $tintuc= TinTuc::all();
        return view('layouts.index',['tintuc'=>$tintuc],['slide'=>$slide]);
    }

    public function news_tpl()
    {
        return view('layouts.pages.news_tpl');
    }

    public function news_detail_tpl($id)
    {
        $tintuc = TinTuc::find($id);
        return view('layouts.pages.news_detail_tpl',['tintuc'=>$tintuc]);
    }

    public function product_tpl()
    {
        return view('layouts.pages.product_tpl');
    }

    public function postThemUser(Request $request)
    { 
        $this->validate($request,
            [
                'ten' => 'required',
                'so_dien_thoai'=> 'required|numeric|min:9',
                'email'=> 'required',
                'password'  =>  'required|min:6|confirmed',
                'password_confirmation'  =>  'required|min:6',
                'gioi_tinh'=> 'required',
                'ngay_sinh'=> 'required',
            ],
            [
                'ten.required' => 'Bạn chưa nhập họ tên',

                'so_dien_thoai.required'   => 'Số điện thoại chưa nhập',
                'so_dien_thoai.numeric'   => 'Số điện thoại bắt buộc phải là số',
                'so_dien_thoai.min'   => 'Số điện thoại có độ dài không dưới 10 số',

                'email.required' =>   'Bạn chưa nhập email',
                'password.required' =>   'Bạn chưa nhập password',
                'password.min'=> 'Mật khẩu quá ngắn ít nhất 6 kí tự',
                'password.confirmed'=> 'Mật khẩu chưa khớp',
                'password_confirmation.required'=> 'Mật khẩu chưa đúng',
                'gioi_tinh.required'=> 'Chưa chọn giới tính',
                'ngay_sinh.required' =>   'Bạn chưa nhập ngày sinh',

            ]);

        $user = new User();
        $password = $request['password'];
        $check_email = $user->where('email',$request->email)->first();

        if(!empty($check_email))
        {
            if($check_email->email == $request->email)
            {   
                return redirect('index')->with('email','Email đã tồn tại');
            }
        }
        else
        {
         $ThongTinUser = new ThongTinUser;
         $ThongTinUser->ten = $request->ten;
         $ThongTinUser->email = $request->email;
         $ThongTinUser->so_dien_thoai = $request->so_dien_thoai;
         $ThongTinUser->ngay_sinh = $request->ngay_sinh;
         $ThongTinUser->gioi_tinh = $request->gioi_tinh;

         $user = new User;
         $user->email = $request->email;
         $user->password = Hash::make($password);
         $user->level = 0;

         $user->save();
         $ThongTinUser->save();
         return redirect('index')->with('thongbao','Thành Công');
     }
 }

 public function Login(Request $request)
 {
    $this->validate($request, 
        [
          'email'   => 'required|email',
          'password'  => 'required'
      ],
      [
       'email.required'=>'Bạn chưa nhập Email',
       'password.required'=>'Bạn chưa nhập mật khẩu',
   ]);

    $user_data = array(
        'email'  => $request->get('email'),
        'password' => $request->get('password')
       );

    if(Auth::attempt($user_data))
    {
      return redirect('index')->with('login',"Đăng nhập thành công");
    }
    else
    {
        return redirect('index')->with('errorLogin', 'Sai email hoặc mật khẩu. Vui lòng kiểm tra lại thông tin nhập.');
    }
}
public function Logout()
    {
     Auth::logout();
     return redirect('index');
    }
}
