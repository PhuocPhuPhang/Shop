<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDon;
use App\ChiTietHoaDon;
use App\SanPham;
use DB;

class HoaDonController extends Controller
{
    function __construct()
    {
        $sanpham = SanPham::all();
        $chitiethoadon = ChiTietHoaDon::all();
        $hoadon = HoaDon::all();
        view()->share('hoadon',$hoadon);
        view()->share('sanpham',$sanpham);
        view()->share('chitiethoadon',$chitiethoadon);
    }
    public function getDanhSach()
    {
        $hoadon = DB::table('hoa_don')->where('duyet',0)->get();
        return view('admin.hoadon.danhsach',['hoadon'=>$hoadon]);
    }

    public function getDuyet($mahd)
    {
        $hoadon = DB::table('hoa_don')->where('ma_hoa_don',$mahd)->first();
        $chitiethoadon = DB::table('chi_tiet_hoa_don')->where('ma_hoa_don',$mahd)->get();
        return view('admin.hoadon.danhsach',['chitiethoadon'=>$chitiethoadon],['hd'=>$hoadon]);
    }

    public function postDuyet(Request $request)
    {
        DB::table('hoa_don')->where('ma_hoa_don',$request->mahd)->update(['duyet'=>1]);
    }



}
