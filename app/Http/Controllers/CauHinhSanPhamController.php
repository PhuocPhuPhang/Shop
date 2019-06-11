<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhSanPham;
use Validator;

class CauHinhSanPhamController extends Controller
{
    public function getDanhSach()
    {
        $cauhinh = CauHinhSanPham::all();
        return view('admin.sanpham.cauhinh.danhsach',['cauhinh'=>$cauhinh]);
    }

    public function getThem()
    {
        return view('admin.sanpham.cauhinh.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'ten' =>    'required|min:3|max:255|unique:cau_hinh_san_pham,cau_hinh'
        ],[
            'ten.required'  =>  'Bạn chưa nhập tên cấu hình',
            'ten.min'       =>  'Tên cấu hình tối thiểu 3 ký tự',
            'ten.max'       =>  'Tên cấu hình có độ dài tối đa 255 ký tự',
            'ten.unique'    =>  'Tên cấu hình đã tồn tại',
        ]);

        $cauhinh = new CauHinhSanPham;
        $cauhinh->cau_hinh = $request->ten;
        $cauhinh->ten_khong_dau = str_slug($request->ten,'-');

        $cauhinh->save();
        return redirect('admin/sanpham/cauhinh/them')->with('thongbao','Thêm cấu hình thành công');
    }

    public function getSua($id)
    {
        $cauhinh = CauHinhSanPham::find($id);
        return view('admin.sanpham.cauhinh.sua',['cauhinh'=>$cauhinh]);
    }

    public function postSua(Request $request, $id)
    {
        $cauhinh = CauHinhSanPham::find($id);
        $this->validate($request,[
            'ten' =>    'required|min:3|max:255|unique:cau_hinh_san_pham,cau_hinh'
        ],[
            'ten.required'  =>  'Bạn chưa nhập tên cấu hình',
            'ten.min'       =>  'Tên cấu hình tối thiểu 3 ký tự',
            'ten.max'       =>  'Tên cấu hình có độ dài tối đa 255 ký tự',
            'ten.unique'    =>  'Tên cấu hình đã tồn tại',
        ]);

        $cauhinh->cau_hinh = $request->ten;
        $cauhinh->ten_khong_dau = str_slug($request->ten,'-');

        $cauhinh->save();
        return redirect('admin/sanpham/cauhinh/sua/'.$id)->with('thongbao','Sửa cấu hình thành công');
    }

    public function postXoa($id)
    {
        $cauhinh = CauHinhSanPham::find($id);
        $cauhinh->delete();

        return redirect('admin/sanpham/cauhinh/danhsach')->with('thongbao','Xóa thành công');
    }
}
