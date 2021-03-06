<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use Validator;
use DB;
use Illuminate\Support\Facades\Input;

class TinTucController extends Controller
{
    public function getDanhSach()
    {
        $tintuc = TinTuc::where('type','tin-tuc')->orderBy('created_at','desc')->get();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getThem()
    {
        return view('admin.tintuc.them');
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
        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('shop/admin/tintuc/them')->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = $name.'_'.time().'.'.$duoi;
            $file->move("upload/tintuc",$hinh);
            $tintuc->hinh_anh = $hinh;

        }
        else
        {
            $tintuc->hinh_anh = "";
        }

        $tintuc->save();
        return redirect('shop/admin/tintuc/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc]);
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
            if($tintuc->hinh_anh != "")
            {
                unlink(public_path('upload/tintuc/'.$tintuc->hinh_anh));
            }

            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('shop/admin/tintuc/sua/'.$id)->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = $name.'_'.time().'.'.$duoi;

            $file->move("upload/tintuc",$hinh);
            $tintuc->logo = $hinh;
        }

        $tintuc->save();
        return redirect('shop/admin/tintuc/sua/'.$tintuc->id)->with('thongbao','Chỉnh sửa thông tin thành công');
    }

    public function getXoa($id)
    {
        $tintuc = TinTuc::find($id);
        if($tintuc->hinh_anh != "")
        {
            unlink(public_path('upload/tintuc/'.$tintuc->hinh_anh));
        }
        $tintuc->delete();
        return redirect('shop/admin/tintuc/danhsach')->with('thongbao','Xóa thành công');
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

        $tontai = DB::table('tin_tuc')->where('type','gioi-thieu')->count();
        $hinh_gioithieu = "";
        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('shop/admin/tintuc/gioithieu')->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = $name.'_'.time().'.'.$duoi;
            $file->move("upload/tintuc",$hinh);
            $hinh_gioithieu = $hinh;
        }
        if($tontai != 0)
        {
            $gioithieu = DB::table('tin_tuc')->where('type','gioi-thieu')->first();
            if($gioithieu->hinh_anh != "")
            {
                unlink(public_path('upload/tintuc/'.$gioithieu->hinh_anh));
            }
            DB::table('tin_tuc')->where('type','gioi-thieu')
            ->update(['title'=>$request->title,
                      'mo_ta'=>$request->mota,
                      'noi_dung'=>$request->noidung,
                      'hinh_anh'=>$hinh_gioithieu]);
        }
        else
        {
            DB::table('tin_tuc')->insert(['title'=>$request->title,
                      'mo_ta'=>$request->mota,
                      'noi_dung'=>$request->noidung,
                      'type'=>"gioi-thieu",
                      'hinh_anh'=>$hinh_gioithieu]);
        }

        return redirect('shop/admin/tintuc/gioithieu')->with('thongbao','Cập nhật thành công');
    }

    public function getChinhSach()
    {
        $chinhsach = TinTuc::where('type','chinh-sach')->orderBy('created_at','desc')->get();
        return view('admin.tintuc.chinhsach.danhsach',['chinhsach'=>$chinhsach]);
    }

    public function getThemChinhSach()
    {
        return view('admin.tintuc.chinhsach.them');
    }

    public function postThemChinhSach(Request $request)
    {
        $this->validate($request,[
            'title' =>  'required|min:3',
            'noidung'   =>  'required',
        ],[
            'title.required'  =>  'Bạn chưa nhập tiêu đề tin tức',
            'title.min'  =>  'Tiêu đề tin tức phải có ít nhất 3 ký tự',
            'noidung.required'  =>  'Bạn chưa nhập nội dung cho tin tức',
        ]);

        $chinhsach = new TinTuc;
        $chinhsach->title = $request->title;
        $chinhsach->ten_khong_dau = str_slug($request->title,'-');
        $chinhsach->mo_ta = $request->mota;
        $chinhsach->noi_dung = $request->noidung;
        $chinhsach->type = "chinh-sach";

        $chinhsach->save();
        return redirect('shop/admin/tintuc/chinhsach/them')->with('thongbao','Thêm thành công');
    }

    public function getSuaChinhSach($id)
    {
        $chinhsach = TinTuc::find($id);
        return view('admin.tintuc.chinhsach.sua',['chinhsach'=>$chinhsach]);
    }

    public function postSuaChinhSach(Request $request, $id)
    {
        $chinhsach = TinTuc::find($id);
        $this->validate($request,[
            'title' =>  'required|min:3',
            'noidung'   =>  'required',
        ],[
            'title.required'  =>  'Bạn chưa nhập tiêu đề tin tức',
            'title.min'  =>  'Tiêu đề tin tức phải có ít nhất 3 ký tự',
            'noidung.required'  =>  'Bạn chưa nhập nội dung cho tin tức',
        ]);

        $chinhsach->title = $request->title;
        $chinhsach->ten_khong_dau = str_slug($request->title,'-');
        $chinhsach->mo_ta = $request->mota;
        $chinhsach->noi_dung = $request->noidung;

        $chinhsach->save();

        return redirect('shop/admin/tintuc/chinhsach/sua/'.$id)->with('thongbao',"Cập nhật thành công");
    }

    public function getXoaChinhSach($id)
    {
        $chinhsach = TinTuc::find($id);
        $chinhsach->delete();
        return redirect('shop/admin/tintuc/chinhsach')->with('thongbao','Xóa thành công');

    }
}
