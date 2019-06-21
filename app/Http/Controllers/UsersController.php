<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ThongTinUser;
use Validator;
use Route;
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
        $thongtin_user = ThongTinUser::all();
        return view('admin.user.danhsach',['user'=>$user],['thongtin_user'=>$thongtin_user]);
    }

    public function getDanhSachNV()
    {
        $user = User::where('quyen','1')->get();
        $thongtin_user = ThongTinUser::all();
        $route = Route::current();
        return view('admin.user.danhsach',['user'=>$user],['thongtin_user'=>$thongtin_user],['route'=>$route]);
    }
}
