<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\collection;
use App\Media;
use Validator;
use DB;

class SlideController extends Controller
{
    public function getDanhSach()
    {
        $collection= collect(Media::where('type','slide')->get());
        $slide = $collection->sortBy('thu_tu');
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }

    public function getThem()
    {
        $thutu_max = Media::where('type','slide')->max('thu_tu');
        return view('admin.slide.them',['thutu'=>$thutu_max]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'ten'=> 'required|max:255',
            'link'=> 'min:10',
        ],[
            'ten.required' =>   'Bạn chưa nhập tên slide',
            'ten.max' =>   'Tên slide có độ dài tối đa 255 ký tự',

            'link.max'   => 'Link có độ dài tối thiểu 10 ký tự',
        ]);

        $slide = new Media;
        $slide->ten = $request->ten;
        $slide->link = $request->link;
        $slide->type = "slide";

        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('shop/admin/slide/them')->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = $name.'_'.time().'.'.$duoi;
            $file->move("upload/slide",$hinh);
            $slide->hinh_anh = $hinh;
        }
        else
        {
            $slide->hinh_anh = "";
        }

        $thutu = $request->thutu;
        $max = Media::where('type','slide')->count();
        $tontai = DB::table('media')->where([['type','slide'],['thu_tu',$thutu]])->count();
        if($tontai != 0 )
        {
            $dsSlide = DB::table('media')->where('type','slide')
                ->whereBetween('thu_tu',[$thutu,$max])->get();
            foreach($dsSlide as $items)
            {
                DB::table('media')->where([['thu_tu',$max],['type','slide']])->update(['thu_tu'=>$max+1]);
                $max--;
            }
        }
        $slide->thu_tu = $thutu;

        $slide->save();
        return redirect('shop/admin/slide/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $slide = Media::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
    }

    public function postSua(Request $request,$id)
    {
        $slide = Media::find($id);
        $this->validate($request,[
            'ten'=> 'required|max:255',
            'link'=> 'min:10',
        ],[
            'ten.required' =>   'Bạn chưa nhập tên slide',
            'ten.max' =>   'Tên slide có độ dài tối đa 255 ký tự',

            'link.min'   => 'Link có độ dài tối thiểu 10 ký tự',
        ]);

        $slide->ten = $request->ten;
        $slide->link = $request->link;

        if($request->hasFile('hinhanh'))
        {
            if($slide->hinh_anh != "")
            {
                unlink(public_path('upload/slide/'.$slide->hinh_anh));
            }
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('shop/admin/slide/sua/'.$slide->id)->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = $name.'_'.time().'.'.$duoi;
            $file->move("upload/slide",$hinh);
            $slide->hinh_anh = $hinh;

        }

        $thutu = $request->thutu;
        $tontai = DB::table('media')->where([['type','slide'],['thu_tu',$thutu]])->count();
        if($tontai != 0 )
        {
            $slide_tontai = DB::table('media')->where([['type','slide'],['thu_tu',$thutu]])->first();
            DB::table('media')->where([['thu_tu',$thutu],['type','slide']])->update(['thu_tu'=>$slide->thu_tu]);
            DB::table('media')->where([['thu_tu',$thutu],['type','slide']])->update(['thu_tu'=>$slide_tontai->thu_tu]);
        }
        $slide->thu_tu = $thutu;

        $slide->save();
        return redirect('shop/admin/slide/sua/'.$slide->id)->with('thongbao','Chỉnh sửa thành công');
    }

    public function getXoa($id)
    {
        $slide = Media::find($id);
        if($slide->hinh_anh != "")
        {
            unlink(public_path('upload/slide/'.$slide->hinh_anh));
        }
        $slide->delete();

        return redirect('shop/admin/slide/danhsach')->with('thongbao','Xóa thành công');
    }
}
