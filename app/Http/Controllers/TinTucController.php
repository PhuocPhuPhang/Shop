<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\LoaiTinTuc;
use Validator;
use DB;
use Illuminate\Support\Facades\Input;

class TinTucController extends Controller
{
    public function getDanhSach()
    {
        $tintuc = TinTuc::where('type','tin-tuc')->get();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getThem()
    {
        $loaitin = LoaiTinTuc::all();
        return view('admin.tintuc.them',['loaitin'=>$loaitin]);
    }


    public function postThem(Request $request)
    {
        $this->validate($request,[
            'title' =>  'required|min:3|unique:tin_tuc,title',
            'noidung'   =>  'required',
        ],[
            'title.required'  =>  'Bạn chưa nhập tiêu đề tin tức',
            'title.min'  =>  'Tiêu đề tin tức phải có ít nhất 3 ký tự',
            'title.unique'  =>  'Tiêu đề tin tức đã tồn tại',
            'noidung.required'  =>  'Bạn chưa nhập nội dung cho tin tức',
        ]);

        $tintuc = new TinTuc;
        $tintuc->title = $request->title;
        $tintuc->ten_khong_dau = str_slug($request->title,'-');
        $tintuc->id_loai = (int)$request->loaitin;
        $tintuc->mo_ta = $request->mota;
        $tintuc->noi_dung = $request->noidung;
        $tintuc->keywords = $request->keywords;
        $tintuc->type = "tin-tuc";

        $noibat = Input::get('noibat');
        if($noibat == 1)
        {
            $tintuc->noi_bat = 1;
        }
        else
        {
            $tintuc->noi_bat = 0;
        }
        //Kiểm tra hình ảnh có tồn tại
        if($request->hasFile('hinhanh'))
        {
            //Lấy file được truyền lên
            $file = $request->file('hinhanh');
            //kiểm tra định dạng file
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/tintuc/them')->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            //Lấy tên file
            $name = $file->getClientOriginalName();
            //Tạo tên mới cho file
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/tintuc/".$hinh))
            {
                $hinh = str_random(4)."_".$name;
            }
            //Lưu hình
            $file->move("upload/tintuc",$hinh);
            $tintuc->hinh_anh = $hinh;

        }
        else
        {
            $tintuc->hinh_anh = "";
        }

        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $tintuc = TinTuc::find($id);
        $loaitin = LoaiTinTuc::all();
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin]);
    }

    public function postSua(Request $request, $id)
    {
        $tintuc = TinTuc::find($id);
        $this->validate($request,[
            'title' =>  'required|min:3',
            'mota'  =>  'required',
            'noidung'   =>  'required',
        ],[
            'title.required'  =>  'Bạn chưa nhập tiêu đề tin tức',
            'title.min'  =>  'Tiêu đề tin tức phải có ít nhất 3 ký tự',
            'mota.required'  =>  'Bạn chưa nhập mô tả cho tin tức',
            'noidung.required'  =>  'Bạn chưa nhập nội dung cho tin tức',
        ]);

        $tintuc->title = $request->title;
        $tintuc->ten_khong_dau = str_slug($request->title,'-');
        $tintuc->id_loai = (int)$request->loaitin;
        $tintuc->mo_ta = $request->mota;
        $tintuc->noi_dung = $request->noidung;
        $tintuc->keywords = $request->keywords;

        $noibat = Input::get('noibat');
        if($noibat == 1)
        {
            $tintuc->noi_bat = 1;
        }
        else
        {
            $tintuc->noi_bat = 0;
        }

        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/tintuc/sua/'.$tintuc->id)->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/tintuc/".$hinh))
            {
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$hinh);
            unlink("upload/tintuc/".$tintuc->hinh_anh);
            $tintuc->hinh_anh = $hinh;
        }

        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$tintuc->id)->with('thongbao','Chỉnh sửa thông tin thành công');
    }

    public function postXoa($id)
    {
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa thành công');
    }

    public function getGioiThieu()
    {
        $gt = DB::table('tin_tuc')->where('type','gioi-thieu')->first();
        return view('admin.tintuc.gioithieu',['gt'=>$gt]);
    }

    public function postGioiThieu(Request $request)
    {
        $this->validate($request,[
            'title' =>  'required|min:3',
            'noidung'   =>  'required',
        ],[
            'title.required'  =>  'Bạn chưa nhập tiêu đề tin tức',
            'title.min'  =>  'Tiêu đề tin tức phải có ít nhất 3 ký tự',
            'noidung.required'  =>  'Bạn chưa nhập nội dung cho tin tức',
        ]);

        DB::table('tin_tuc')->where('type','gioi-thieu')
            ->update(['title'=>$request->title,
                      'mo_ta'=>$request->mota,
                      'noi_dung'=>$request->noidung]);

        return redirect('admin/tintuc/gioithieu')->with('thongbao','Cập nhật thành công');
    }

    public function getChinhSach()
    {
        $chinhsach = TinTuc::where('type','chinh-sach')->get();
        return view('admin/tintuc/chinhsach/danhsach',['chinhsach'=>$chinhsach]);
    }


}
