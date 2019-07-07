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
        $tongtien = 0;
        view()->share('tongtien', $tongtien);
        view()->share('hoadon', $hoadon);
        view()->share('sanpham', $sanpham);
        view()->share('chitiethoadon', $chitiethoadon);
    }
    public function getDanhSach()
    {
        $hoadon = DB::table('hoa_don')->where([['duyet', 0], ['da_xoa', 0]])->orderBy('created_at', 'desc')->get();
        return view('admin.hoadon.danhsach', ['hoadon' => $hoadon]);
    }

    public function getDuyet($mahd)
    {
        $hoadon = DB::table('hoa_don')->where('ma_hoa_don', $mahd)->first();
        $chitiethoadon = DB::table('chi_tiet_hoa_don')->join('san_pham', 'chi_tiet_hoa_don.ma_san_pham', '=', 'san_pham.ma_san_pham')
            ->select('ma_hoa_don', 'ten_san_pham', 'gia_ban', 'chi_tiet_hoa_don.so_luong')->where('ma_hoa_don', $mahd)->get();
        $tongtien = 0;
        foreach ($chitiethoadon as $ct) {
            $tam = ($ct->gia_ban) * ($ct->so_luong);
            $tongtien += $tam;
        }
        return response()->json([
            'hoadon' => $hoadon,
            'cthd' => $chitiethoadon,
            'tongtien' => $tongtien
        ]);
    }
    public function postDuyet(Request $request)
    {
        DB::table('hoa_don')->where('ma_hoa_don', $request->mahd)->update(['duyet' => 1]);
        return response()->json([
            'data' => [
                'success' => 'Thành công',
            ]
        ]);
    }

    public function getDanhSachDuyet()
    {
        $hoadon = DB::table('hoa_don')->where([['duyet', 1], ['da_xoa', 0]])->orderBy('created_at', 'desc')->get();
        return view('admin.hoadon.dsduyet', ['hoadon' => $hoadon]);
    }

    public function getHuy($mahd)
    {
        $chitiethoadon = DB::table('chi_tiet_hoa_don')->where('ma_hoa_don', $mahd)->get();
        foreach ($chitiethoadon as $cthd) {
            DB::table('chi_tiet_hoa_don')->where('ma_hoa_don', $cthd->ma_hoa_don)->update(['da_xoa' => 1]);
        }
        DB::table('hoa_don')->where('ma_hoa_don', $mahd)->update(['da_xoa' => 1]);
        return back()->with('thongbao', 'Đơn hàng đã hủy thành công');
    }
}
