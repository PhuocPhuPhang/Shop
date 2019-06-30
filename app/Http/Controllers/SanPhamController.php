<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\HinhAnh;
use App\NhaCungCap;
use App\CauHinhSanPham;
use App\LoaiCauHinh;
use App\ThongTinSanPham;
use App\KhuyenMai;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;


class SanPhamController extends Controller
{
    function __construct()
    {
        $loaicauhinh = LoaiCauHinh::all();
        $dsCauHinh = CauHinhSanPham::all();
        $thongtinsp = ThongTinSanPham::all();
        $khuyenmai = KhuyenMai::all();
        $nhacungcap = NhaCungCap::all();

        view()->share('loaicauhinh',$loaicauhinh);
        view()->share('dsCauHinh',$dsCauHinh);
        view()->share('thongtinsp',$thongtinsp);
        view()->share('khuyenmai',$khuyenmai);
        view()->share('nhacungcap',$nhacungcap);
    }
    public function getDanhSach()
    {
        $sanpham = SanPham::all();
        $nhacungcap = NhaCungCap::all();
        return view('admin.sanpham.danhsach',['sanpham'=>$sanpham],['nhacungcap'=>$nhacungcap]);
    }

    public function getThem()
    {
        $khuyenmai = KhuyenMai::all();
        $nhacungcap = NhaCungCap::all();
        $dsCauHinh = CauHinhSanPham::all();
        $cauhinh = DB::table('cau_hinh_san_pham')->select('*')->groupBy('id_loai')->get();
        $loaicauhinh = DB::table('cau_hinh_san_pham')
        ->join('loai_cau_hinh','cau_hinh_san_pham.id_loai','=','loai_cau_hinh.id')
        ->select('ten','loai_cau_hinh.id')->where('cau_hinh_san_pham.id_loai','=','loai_cau_hinh.id')->groupBy('cau_hinh_san_pham.id_loai')->get();
        return view('admin.sanpham.them',
                ['cauhinh'=>$cauhinh],['nhacungcap'=>$nhacungcap]
                 ,$loaicauhinh,['khuyenmai'=>$khuyenmai],['dsCauHinh'=>$dsCauHinh]);
    }

    public function postThem(Request $request)
    {
        $mang = $request->mang;
        $newArr = [];
        foreach($mang as $item)
        {
            foreach($item as $key => $value) {
                $newArr[$key] = $value;
            }
        }

        $sanpham = new SanPham;
        $sanpham->ma_san_pham = isset($newArr['ma']) ? $newArr['ma'] : '0';
        $sanpham->ten_san_pham = $newArr['ten'];
        $sanpham->ten_khong_dau = str_slug($newArr['ten']);
        $sanpham->nha_cung_cap = $newArr['nhacungcap'];
        $sanpham->so_luong = $newArr['soluong'];
        $sanpham->gia_ban = $newArr['gia'];
        $sanpham->mau_sac = $newArr['mausac'];
        $sanpham->khuyen_mai = $newArr['khuyenmai'];
        $sanpham->noi_bat = $newArr['noibat'];
        $sanpham->mo_ta= $newArr['mota'];
        $sanpham->noi_dung = $newArr['noidung'];
        $sanpham->keywords = $newArr['keywords'];
        $sanpham->save();

        var_dump($newArr);

        $listCauHinh = DB::table('cau_hinh_san_pham')->select('id','ten_khong_dau')->get();
        foreach($newArr as $key => $value)
        {
           foreach( $listCauHinh as $cauhinh)
           {
             if($cauhinh->ten_khong_dau == $key)
             {
                $thongtinsp = new ThongTinSanPham;
                $thongtinsp->ma_san_pham = $newArr['ma'];
                $thongtinsp->id_cau_hinh = $cauhinh->id;
                $thongtinsp->mo_ta = $newArr[$key];
             }
           }
        }
        // foreach($newArr as $ttsp)
        // {
        // $thongtinsp = new ThongTinSanPham;
        // $thongtinsp->ma_san_pham = $newArr['mausac'];

        //    foreach($value as $key1 => $value1)
        //    {
        //        foreach($value1 as $key2 => $value2)
        //        {
        //         foreach($listCauHinh as $key_cauhinh => $value_cauhinh)
        //         {
        //             $thongtinsp = new ThongTinSanPham;
        //             $thongtinsp->ma_san_pham = $request->ma;
        //             if($value_cauhinh->ten_khong_dau == $value2)
        //             {
        //                 if($value1['value'] != null)
        //                 {
        //                     $thongtinsp->id_cau_hinh = $value_cauhinh->id;
        //                     $thongtinsp->mo_ta = $value1['value'];;
        //                     $thongtinsp->save();
        //                 }
        //             }
        //         }
        //        }
        //    }
        // }
        // var_dump($sanpham->ma_san_pham);
    }
    public function getSua($masp)
    {
        $khuyenmai = KhuyenMai::all();
        $nhacungcap = NhaCungCap::all();
        $sanpham = SanPham::find($masp);
        $cauhinh = DB::table('thong_tin_san_pham')->where('ma_san_pham',$masp)->get();

        return view('admin.sanpham.sua',['sanpham'=>$sanpham],['cauhinh'=>$cauhinh],
                ['khuyenmai'=>$khuyenmai],['nhacungcap'=>$nhacungcap]);
    }
}

