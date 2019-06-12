<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\HinhAnh;
use App\NhaCungCap;
use App\CauHinhSanPham;
use App\LoaiCauHinh;
use Validator;
use Illuminate\Support\Facades\DB;


class SanPhamController extends Controller
{
    function __construct()
    {
        $loaicauhinh = LoaiCauHinh::all();
        view()->share('loaicauhinh',$loaicauhinh);
    }
    public function getDanhSach()
    {
        $sanpham = SanPham::all();
        $nhacungcap = NhaCungCap::all();
        return view('admin.sanpham.danhsach',['sanpham'=>$sanpham],['nhacungcap'=>$nhacungcap]);
    }

    public function getThem()
    {
        $cauhinh = CauHinhSanPham::all();
        $nhacungcap = NhaCungCap::all();
        $loaicauhinh = DB::table('cau_hinh_san_pham')
        ->join('loai_cau_hinh','cau_hinh_san_pham.id_loai','=','loai_cau_hinh.id')
        ->select('ten')->where('cau_hinh_san_pham.id_loai','=','loai_cau_hinh.id')->groupBy('cau_hinh_san_pham.id_loai')->get();
        return view('admin.sanpham.them',['cauhinh'=>$cauhinh],['nhacungcap'=>$nhacungcap],$loaicauhinh);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'ma'        => 'required|min:3|max:255',
            'ten'       => 'required|min:10|max:255',
            'soluong'   => 'required|numeric',
            'gia'   => 'required|numeric',
        ],[
            'ma.required'       =>'Bạn chưa nhập mã sản phẩm',
            'ma.min'            =>'Mã sản phẩm tối thiểu 3 ký tự',
            'ma.max'            =>'Mã sản phẩm có độ dài tối đa 255 ký tự',
            'ten.required'      =>'Bạn chưa nhập tên sản phẩm',
            'ten.min'           =>'Tên sản phẩm tối thiểu 10 ký tự',
            'ten.max'           =>'Tên sản phẩm có độ dài tối đa 255 ký tự',
            'soluong.required'  =>'Bạn chưa nhập số lượng sản phẩm',
            'soluong.numeric'   =>'Số lượng sản phẩm nhập vào phải là số',
            'gia.required'      =>'Bạn chưa nhập giá sản phẩm',
            'gia.numeric'       =>'Giá của sản phẩm nhập vào phải là số',
        ]);

        $sanpham = new SanPham;
        $sanpham->ma_san_pham = $request->ma;
        $sanpham->ten_san_pham = $request->ten;
        $sanpham->nha_cung_cap =$request->nhacungcap;
        $sanpham->so_luong = $request->soluong;
        $sanpham->gia_ban = $request->gia;

        $sanpham->save();
        return redirect('admin/sanpham/them')->with('thongbao','Thêm sản phẩm thành công');
    }



}
