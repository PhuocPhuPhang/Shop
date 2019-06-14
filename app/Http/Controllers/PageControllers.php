<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;
use App\TinTuc;
use App\NhaCungCap;
use App\User;
use App\ThongTinUser;

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
        $this->validate($request,[
            'ten' => 'required',
            'so_dien_thoai'=> 'numeric|min:9',
            'email'=> 'required',
            'password'=> 'required',
            'gioi_tinh'=> 'required',
            'ngay_sinh'=> 'required',
        ],[
            'ten.required' => 'Bạn chưa nhập họ tên',

            'so_dien_thoai.min'   => 'Số điện thoại có độ dài không dưới 10 số',
            'so_dien_thoai.numeric'   => 'Số điện thoại bắt buộc phải là số',

            'email.required' =>   'Bạn chưa nhập email',
            'password.required' =>   'Bạn chưa nhập password',
            'ngay_sinh.required' =>   'Bạn chưa nhập ngày sinh',

        ]);

        $ThongTinUser = new ThongTinUser;
        $ThongTinUser->ten = $request->ten;
        $ThongTinUser->email = $request->email;
        $ThongTinUser->so_dien_thoai = $request->so_dien_thoai;
        $ThongTinUser->ngay_sinh = $request->ngay_sinh;
        $ThongTinUser->gioi_tinh = $request->gioi_tinh;

        $user = new User;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->level = 0;

        $user->save();
        $ThongTinUser->save();
        return redirect('index');
    }
   
}
