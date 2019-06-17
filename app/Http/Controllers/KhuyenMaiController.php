<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhuyenMai;
use App\HinhThucKhuyenMai;
use Validator;
use DB;
use Illuminate\Support\Str;

class KhuyenMaiController extends Controller
{
    public function getDanhSach()
    {
        $khuyenmai = KhuyenMai::all();
        return view('admin.khuyenmai.danhsach',['khuyenmai'=>$khuyenmai]);
    }

    public function getThem()
    {
        return view('admin.khuyenmai.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'ten'=>'required'
        ],[
            'ten'=>'Bạn chưa nhập tên khuyến mãi'
        ]);

        $khuyenmai = new KhuyenMai;
        $makm = "KM" . mt_rand('00000000','99999999');
        $khuyenmai->ma_khuyen_mai = $makm;
        $khuyenmai->ten_khuyen_mai = $request->ten;
        $khuyenmai->ngay_bat_dau = $request->batdau;
        $khuyenmai->ngay_ket_thuc = $request->ketthuc;

        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/khuyenmai/them')->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = $name.'_'.time().'.'.$duoi;
            $file->move("upload/khuyenmai",$hinh);
            $khuyenmai->hinh_anh = $hinh;
        }
        else
        {
            $khuyenmai->hinh_anh = "";
        }

        $khuyenmai->save();
        // Lưu hình thức khuyến mãi
        $hinhthuckm = new HinhThucKhuyenMai();
        $hinhthuc = $request->hinhthuc;
        foreach($hinhthuc as $key => $value)
        {
           $hinhthuckm->ma_khuyen_mai = $makm;
           $hinhthuckm->ten_hinh_thuc = $hinhthuc[$key];
           $nd = Str::slug($hinhthuc[$key]);
           $hinhthuckm->noi_dung = $nd;

           $hinhthuckm->save();
        }
        return redirect('admin/khuyenmai/them')->with('thongbao','Thêm thành công');
    }
}
