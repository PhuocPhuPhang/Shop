<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Route;
use DB;
use Excel;
use Laravel\Socialite\One\User as LaravelUser;

class UsersController extends Controller
{
    function __construct()
    {
        $route = Route::current();
        view()->share('route',$route);
    }

    public function index()
    {
        return view('layouts.login.login');
    }

    public function getDanhSachKH()
    {
        $user = User::where('quyen','0')->get();
        $quyen = DB::table('phan_quyen')->where('id','<>','1')->get();
        return view('admin.user.danhsach',['user'=>$user],['quyen'=>$quyen]);
    }

    public function getDanhSachNV()
    {
        $user = User::where([['quyen','<>',0],['quyen','<>',1]])->get();
        $route = Route::current();
        return view('admin.user.danhsach',['user'=>$user],['route'=>$route]);
    }

    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request,[
            'ten'       =>'required|min:3|max:255',
            'email'     =>'required|min:3|max:255',
        ],[
            'ten.required'  =>'Bạn chưa nhập tên',
            'ten.min'       =>'Tên có độ dài tối thiểu 3 ký tự',
            'ten.max'       =>'Tên có độ dài tối đa 255 ký tự',
            'email.required'  =>'Bạn chưa nhập email',
            'email.min'       =>'Email có độ dài tối thiểu 3 ký tự',
            'email.max'       =>'Email có độ dài tối đa 255 ký tự',
        ]);

        $user->ten = $request->ten;
        $user->email = $request->email;
        $user->ngay_sinh = $request->ngaysinh;
        $user->so_dien_thoai = $request->sdt;
        $user->dia_chi = $request->diachi;

        if($request->hasFile('hinhanh'))
        {
            if(file_exists(public_path('upload/user/'.$user->avatar)))
            {
                unlink(public_path('upload/user/'.$user->avatar));
            }
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/user/sua/'.$user->id)->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/user/".$hinh))
            {
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/user",$hinh);
            $user->avatar = $hinh;
        }

        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao',"Cập nhật thành công");
    }

    public function postXoa($id)
    {
        DB::table('users')->where('id',$id)->update(['quyen'=>0]);
        return redirect()->back();
    }
}
