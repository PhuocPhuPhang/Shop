<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Suppost\Helpers;
use App\NhaCungCap;
use DB;
use Validator;


class NhaCungCapController extends Controller
{
    public function getDanhSach()
    {
       $nhacungcap = DB::table('nha_cung_cap')->orderBy('created_at','desc')->get();
       return view('admin.nhacungcap.danhsach',['nhacungcap'=>$nhacungcap]);
    }

    public function getThem()
    {
        return view('admin.nhacungcap.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'ten'=> 'required|unique:nha_cung_cap,ten_nha_cung_cap|max:255',
            'sdt'=> 'numeric|min:9'
        ],[
            'ten.unique' => 'Tên nhà cung cấp đã tồn tại',
            'ten.required' =>   'Bạn chưa nhập tên nhà cung cấp',
            'ten.max' =>   'Tên nhà cung cấp có độ dài tối đa 255 ký tự',

            'sdt.min'   => 'Số điện thoại có độ dài không dưới 10 số',
            'sdt.numeric'   => 'Số điện thoại bắt buộc phải là số',
        ]);

        $nhacungcap = new NhaCungCap;
        $nhacungcap->ma_nha_cung_cap = "NC".rand(00000000,99999999);
        $nhacungcap->ten_nha_cung_cap = $request->ten;
        $nhacungcap->ten_khong_dau = str_slug($request->ten,'-');
        $nhacungcap->so_dien_thoai = $request->sdt;
        $nhacungcap->dia_chi = $request->diachi;

        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('shop/admin/nhacungcap/them')->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = $name.'_'.time().'.'.$duoi;

            $file->move("upload/nhacungcap",$hinh);
            $nhacungcap->logo = $hinh;

        }
        else
        {
            $nhacungcap->logo = "";
        }


        $nhacungcap->save();
        return redirect('shop/admin/nhacungcap/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($mancc)
    {
        $nhacungcap = NhaCungCap::find($mancc);
        return view('admin.nhacungcap.sua',['nhacungcap'=>$nhacungcap]);
    }

    public function postSua(Request $request, $mancc)
    {
        $nhacungcap = NhaCungCap::find($mancc);
        $this->validate($request,[
            'ten'=> 'required|max:255',
            'sdt'=> 'numeric|min:9'
        ],[
            'ten.required' =>   'Bạn chưa nhập tên nhà cung cấp',
            'ten.max' =>   'Tên nhà cung cấp có độ dài tối đa 255 ký tự',
            'sdt.min'   => 'Số điện thoại có độ dài không dưới 10 số',
            'sdt.numeric'   => 'Số điện thoại bắt buộc phải là số',
        ]);

        $nhacungcap->ma_nha_cung_cap = $request->ma;
        $nhacungcap->ten_nha_cung_cap = $request->ten;
        $nhacungcap->ten_khong_dau = str_slug($request->ten,'-');
        $nhacungcap->so_dien_thoai = $request->sdt;
        $nhacungcap->dia_chi = $request->diachi;

        if($request->hasFile('hinhanh'))
        {
            if($nhacungcap->logo != "")
            {
                unlink(public_path('upload/nhacungcap/'.$nhacungcap->logo));
            }

            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/nhacungcap/sua/'.$mancc)->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = $name.'_'.time().'.'.$duoi;

            $file->move("upload/nhacungcap",$hinh);
            $nhacungcap->logo = $hinh;
        }
        $nhacungcap->save();
        return redirect('shop/admin/nhacungcap/sua/'.$mancc)->with('thongbao','Cập nhật thành công');
    }

    public function getXoa($mancc)
    {
        DB::table('nha_cung_cap')->where('ma_nha_cung_cap',$mancc)->update(['da_xoa'=>1]);
        return redirect('shop/admin/nhacungcap/danhsach')->with('thongbao','Cập nhật thành công');
    }

    public function getUpdate($mancc)
    {
        DB::table('nha_cung_cap')->where('ma_nha_cung_cap',$mancc)->update(['da_xoa'=>0]);
        return redirect('shop/admin/nhacungcap/danhsach')->with('thongbao','Cập nhật thành công');
    }
}
