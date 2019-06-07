<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTinTuc;
use Validator;
use App\TinTuc;

class LoaiTinTucController extends Controller
{
    public function getDanhSach()
    {
        $loaitintuc = LoaiTinTuc::all();
        return view('admin.loaitintuc.danhsach',['loaitintuc'=>$loaitintuc]);
    }

    public function getThem()
    {
        return view('admin.loaitintuc.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'ten' =>'required|min:3|max:255|unique:loai_tin_tuc,ten'
        ],[
            'ten.required'  =>  'Bạn chưa nhập tên loại thông tin',
            'ten.min'       =>  'Tên loại tin phải ít nhất 3 ký tự',
            'ten.max'       =>  'Tên loại tin tối đa 255 ký tự',
            'ten.unique'    =>  'Tên loại tin đã tồn tại'
        ]);

        $loaitintuc = new LoaiTinTuc;
        $loaitintuc->ten = $request->ten;
        $loaitintuc->ten_khong_dau = str_slug($request->ten,'-');

        $loaitintuc->save();
        return redirect('admin/loaitintuc/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $loaitintuc = LoaiTinTuc::find($id);
        return view('admin.loaitintuc.sua',['loaitintuc'=>$loaitintuc]);
    }

    public function postSua(Request $request, $id)
    {
        $loaitintuc = LoaiTinTuc::find($id);
        $this->validate($request,[
            'ten' =>'required|min:3|max:255'
        ],[
            'ten.required'  =>  'Bạn chưa nhập tên loại thông tin',
            'ten.min'       =>  'Tên loại tin phải ít nhất 3 ký tự',
            'ten.max'       =>  'Tên loại tin tối đa 255 ký tự'
        ]);

        $loaitintuc->ten = $request->ten;
        $loaitintuc->ten_khong_dau = str_slug($request->ten,'-');

        $loaitintuc->save();
        return redirect('admin/loaitintuc/sua/'.$id)->with('thongbao','Sửa thành công');

    }

    public function postXoa($id)
    {
        $loaitintuc = LoaiTinTuc::find($id);
        $loaitintuc->delete();

        return redirect('admin/loaitintuc/danhsach')->with('thongbao','Xóa thành công');
    }

}
