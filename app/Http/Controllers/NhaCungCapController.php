<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Suppost\Helpers;
use App\NhaCungCap;
use Validator;


class NhaCungCapController extends Controller
{
    public function getDanhSach()
    {
       $nhacungcap = NhaCungCap::all();
       return view('admin.nhacungcap.danhsach',['nhacungcap'=>$nhacungcap]);
    }

    public function getThem()
    {
        return view('admin.nhacungcap.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'ma' => 'required|unique:nha_cung_cap,ma_nha_cung_cap|min:3|max:10',
            'ten'=> 'required|unique:nha_cung_cap,ten_nha_cung_cap|max:255',
            'sdt'=> 'numeric|min:9'
        ],[
            'ma.required' => 'Bạn chưa nhập mã nhà cung cấp',
            'ma.unique' => 'Mã nhà cung cấp đã tồn tại',
            'ma.min'    =>  'Mã nhà cung cấp phải có độ dài hơn 3 ký tự',
            'ma.max'    =>  'Mã nhà cung cấp phải có độ dài từ 3 đến 10 ký tự',

            'ten.unique' => 'Tên nhà cung cấp đã tồn tại',
            'ten.required' =>   'Bạn chưa nhập tên nhà cung cấp',
            'ten.max' =>   'Tên nhà cung cấp có độ dài tối đa 255 ký tự',

            'sdt.min'   => 'Số điện thoại có độ dài không dưới 10 số',
            'sdt.numeric'   => 'Số điện thoại bắt buộc phải là số',
        ]);

        $nhacungcap = new NhaCungCap;
        $nhacungcap->ma_nha_cung_cap = $request->ma;
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
                return redirect('admin/nhacungcap/them')->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
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
        return redirect('admin/nhacungcap/them')->with('thongbao','Thêm thành công');
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
            'ma' => 'required|min:3|max:10',
            'ten'=> 'required|max:255',
            'sdt'=> 'numeric|min:9'
        ],[
            'ma.required' => 'Bạn chưa nhập mã nhà cung cấp',
            'ma.min'    =>  'Mã nhà cung cấp phải có độ dài hơn 3 ký tự',
            'ma.max'    =>  'Mã nhà cung cấp phải có độ dài từ 3 đến 10 ký tự',

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
            if(file_exists(public_path('upload/nhacungcap/'.$nhacungcap->logo)))
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
        return redirect('admin/nhacungcap/sua/'.$mancc)->with('thongbao','Cập nhật thành công');
    }

    public function postXoa($mancc)
    {
        $nhacungcap = NhaCungCap::find($mancc);
        if(file_exists(public_path('upload/nhacungcap/'.$nhacungcap->logo)))
        {
            unlink(public_path('upload/nhacungcap/'.$nhacungcap->logo));
        }
        $nhacungcap->delete();

        return redirect('admin/nhacungcap/danhsach')->with('thongbao','Xóa thành công');
    }
}
