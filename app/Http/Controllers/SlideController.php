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
        return view('admin.slide.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'ten'=> 'required|unique:media,ten|max:255',
            'link'=> 'min:10',
        ],[
            'ten.unique' => 'Tên slide đã tồn tại',
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
                return redirect('admin/slide/them')->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
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
        $max = Media::count()->where('type','slide');
        $tontai = DB::table('media')->where(['thu_tu',$thutu],['type','slide'])->count();
        if($tontai != 0 )
        {
            if($thutu == 1 )
            {
                $dsSlide = DB::table('media')->where('type','slide')
                ->whereBetween('thu_tu',[$thutu,$max])->get();
            }
            else
            {
                $dsSlide = DB::table('media')->whereBetween('thu_tu',[$thutu,$max-1])->get();
                DB::table('media')->where(['thu_tu',$max],['type','slide'])->update(['thu_tu'=>$max+1]);
            }

            foreach($dsSlide as $items)
            {
                DB::table('meida')->where(['thu_tu',$items->thu_tu],['type','slide'])->update(['thu_tu'=>$items->thu_tu +1]);
            }
        }
        $slide->thu_tu = $thutu;

        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Thêm thành công');
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
            if(file_exists(public_path('upload/slide/'.$slide->hinh_anh)))
            {
                unlink(public_path('upload/slide/'.$slide->hinh_anh));
            }
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/slide/sua/'.$slide->id)->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/slide/".$hinh))
            {
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/slide",$hinh);
            $slide->hinh_anh = $hinh;

        }
        $slide->thu_tu = $request->thutu;

        $slide->save();
        return redirect('admin/slide/sua/'.$slide->id)->with('thongbao','Chỉnh sửa thành công');
    }

    public function postXoa($id)
    {
        $slide = Media::find($id);
        if(file_exists(public_path('upload/slide/'.$slide->hinh_anh)))
        {
            unlink(public_path('upload/slide/'.$slide->hinh_anh));
        }
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công');
    }
}
