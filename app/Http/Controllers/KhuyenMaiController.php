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
    // function __construct()
    // {
    //     $khuyenmai = KhuyenMai::all();
    //     $hinhthuckm = HinhThucKhuyenMai::all();
    //     view()->share('khuyenmai',$khuyenmai);
    //     view()->share('hinhthuckm',$hinhthuckm);
    // }

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
        $makm = "KM" . rand(00000000,99999999);
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
        $hinhthuc = $request->hinhthuc;
        foreach($hinhthuc as $ht)
        {
            $hinhthuckm = new HinhThucKhuyenMai();
           $hinhthuckm->ma_khuyen_mai = $makm;
           $hinhthuckm->ten_hinh_thuc = $ht;
           $nd = Str::slug($ht);
           $hinhthuckm->noi_dung = $request->$nd;

           $hinhthuckm->save();
        }
        return redirect('admin/khuyenmai/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $khuyenmai = KhuyenMai::find($id);
        $makm = DB::table('khuyen_mai')->select('ma_khuyen_mai')->where('id','=',$id)->first();
        $hinhthuckm = DB::table('hinh_thuc_khuyen_mai')->select('ten_hinh_thuc','noi_dung')
        ->where('ma_khuyen_mai',$makm->ma_khuyen_mai)->get();
        return view('admin.khuyenmai.sua',['khuyenmai'=>$khuyenmai],['hinhthuckm'=>$hinhthuckm]);
    }

    public function postSua(Request $request, $id)
    {
        $khuyenmai = KhuyenMai::find($id);
        $makm = DB::table('khuyen_mai')->select('ma_khuyen_mai')->where('id',$id)->first();
        $hinhthuckm = DB::table('hinh_thuc_khuyen_mai')->select('ten_hinh_thuc','noi_dung')
        ->where('ma_khuyen_mai',$makm->ma_khuyen_mai)->get();

        $this->validate($request,[
            'ten'=>'required'
        ],[
            'ten'=>'Bạn chưa nhập tên khuyến mãi'
        ]);

        $khuyenmai->ten_khuyen_mai = $request->ten;
        $khuyenmai->ngay_bat_dau = $request->batdau;
        $khuyenmai->ngay_ket_thuc = $request->ketthuc;

        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/khuyenmai/sua/'.$id)->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
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
        $hinhthuc = $request->hinhthuc;
        foreach($hinhthuc as $ht)
        {
           $hinhthuckm->ten_hinh_thuc = $ht;
           $nd = Str::slug($ht);
           $hinhthuckm->noi_dung = $request->$nd;

           $hinhthuckm->save();
        }
        return redirect('admin/khuyenmai/sua/'.$id)->with('thongbao','Cập nhật thành công');
    }
}