<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\HinhAnh;
use App\NhaCungCap;
use App\CauHinhSanPham;
use App\LoaiCauHinh;
use App\ThongTinSanPham;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;


class SanPhamController extends Controller
{
    function __construct()
    {
        $loaicauhinh = LoaiCauHinh::all();
        $cauhinh = CauHinhSanPham::all();
        view()->share('loaicauhinh',$loaicauhinh);
        view()->share('cauhinh',$cauhinh);
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
            'ten'       => 'required|min:5|max:255',
            'soluong'   => 'required|numeric',
            'gia'   => 'required|numeric',
        ],[
            'ma.required'       =>'Bạn chưa nhập mã sản phẩm',
            'ma.min'            =>'Mã sản phẩm tối thiểu 3 ký tự',
            'ma.max'            =>'Mã sản phẩm có độ dài tối đa 255 ký tự',
            'ten.required'      =>'Bạn chưa nhập tên sản phẩm',
            'ten.min'           =>'Tên sản phẩm tối thiểu 5 ký tự',
            'ten.max'           =>'Tên sản phẩm có độ dài tối đa 255 ký tự',
            'soluong.required'  =>'Bạn chưa nhập số lượng sản phẩm',
            'soluong.numeric'   =>'Số lượng sản phẩm nhập vào phải là số',
            'gia.required'      =>'Bạn chưa nhập giá sản phẩm',
            'gia.numeric'       =>'Giá của sản phẩm nhập vào phải là số',
        ]);

        $sanpham = new SanPham;
        $sanpham->ma_san_pham = $request->ma;
        $sanpham->ten_san_pham = $request->ten;
        $sanpham->ten_khong_dau = str_slug($request->ten,'-');
        $sanpham->nha_cung_cap =$request->nhacungcap;
        $sanpham->so_luong = $request->soluong;
        $sanpham->gia_ban = $request->gia;
        $sanpham->mau_sac = $request->mausac;
        $sanpham->mo_ta = $request->mota;
        $sanpham->keywords = $request->keywords;
        $sanpham->noi_dung = $request->noidung;


        $noibat = Input::get('noibat');
        if($noibat == 1)
        {
            $sanpham->noi_bat = 1;
        }
        else
        {
            $sanpham->noi_bat = 0;
        }

        $sanpham->save();

        if($request->hasFile('hinhanh'))
        {
            foreach($request->file('hinhanh') as $image)
            {
                //Lấy file được truyền lên
                $filename = $image->getClientOriginalName();
                //kiểm tra định dạng file
                $duoi = $image->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
                {
                    return redirect('admin/sanpham/them')->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
                }

                //Tạo tên mới cho file
                     $hinh = $filename.'_'.time().'.'.$duoi;
                //Lưu hình
                $image->move("upload/sanpham", $hinh);
                $image = new HinhAnh;

                    $image->ma_san_pham = $request->ma;
                    $image->hinh_anh = $hinh;
                $image->save();

                $sanpham->save();
            }
        }
        else
        {
            $hinh= "";
            $sanpham->save();
        }
        $cauhinh = CauHinhSanPham::all()->sortBy('id');

        // foreach($cauhinh as $ch)
        // {
                $thongtinsp = new ThongTinSanPham;
                $thongtinsp->ma_san_pham = $request->ma;
                $thongtinsp->cau_hinh = $request->cauhinh;
                $thongtinsp->mo_ta = $request->motacauhinh;
                $thongtinsp->save();
        // }
        return redirect('admin/sanpham/them')->with('thongbao','Thêm sản phẩm thành công');
    }
}
