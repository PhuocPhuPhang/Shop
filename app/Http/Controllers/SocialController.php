<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\collection;
use App\Media;
use Validator;
use DB;

class SocialController extends Controller
{
    public function getDanhSach()
    {
        $collection= collect(Media::where('type','social')->get());
        $social = $collection->sortBy('thu_tu');
        return view('admin.social.danhsach',['social'=>$social]);
    }

    public function getThem(Request $request)
    {
        return view('admin.social.them');
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

        $social = new Media;
        $social->ten = $request->ten;
        $social->link = $request->link;
        $social->type = "social";

        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/social/them')->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = $name.'_'.time().'.'.$duoi;
            $file->move("upload/social",$hinh);
            $social->hinh_anh = $hinh;

        }
        else
        {
            $social->hinh_anh = "";
        }

        $thutu = $request->thutu;
        // $max = Media::where('type','social')->count();
        // $tontai = DB::table('media')->where(['thu_tu',$thutu],['type','social'])->count();
        // if($tontai != 0 )
        // {
        //     if($thutu == 1 )
        //     {
        //         $dsSlide = DB::table('media')->where('type','social')
        //         ->whereBetween('thu_tu',[$thutu,$max])->get();
        //     }
        //     else
        //     {
        //         $dsSlide = DB::table('media')->whereBetween('thu_tu',[$thutu,$max-1])->get();
        //         DB::table('media')->where(['thu_tu',$max],['type','social'])->update(['thu_tu'=>$max+1]);
        //     }

        //     foreach($dsSlide as $items)
        //     {
        //         DB::table('media')->where(['thu_tu',$items->thu_tu],['type','social'])->update(['thu_tu'=>$items->thu_tu +1]);
        //     }
        // }
        $social->thu_tu = $thutu;

        $social->save();
        return redirect('admin/social/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $social = Media::find($id);
        return view('admin.social.sua',['social'=>$social]);
    }

    public function postSua(Request $request,$id)
    {
        $social = Media::find($id);
        $this->validate($request,[
            'ten'=> 'required|max:255',
            'link'=> 'min:10',
        ],[
            'ten.required' =>   'Bạn chưa nhập tên slide',
            'ten.max' =>   'Tên slide có độ dài tối đa 255 ký tự',

            'link.min'   => 'Link có độ dài tối thiểu 10 ký tự',
        ]);

        $social->ten = $request->ten;
        $social->link = $request->link;

        if($request->hasFile('hinhanh'))
        {
            if($social->hinh_anh != "")
            {
                unlink(public_path('upload/social/'.$social->hinh_anh));
            }
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/social/sua/'.$social->id)->with('loi','File không hợp lệ(vui lòng chọn file có phần mở rộng .jpg, .png, .jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/social/".$hinh))
            {
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/social",$hinh);
            $social->hinh_anh = $hinh;

        }
        $social->thu_tu = $request->thutu;

        $social->save();
        return redirect('admin/social/sua/'.$social->id)->with('thongbao','Chỉnh sửa thành công');
    }

    public function postXoa($id)
    {
        $social = Media::find($id);
        if($social->hinh_anh != "")
        {
            unlink(public_path('upload/social/'.$social->hinh_anh));
        }
        $social->delete();

        return redirect('admin/social/danhsach')->with('thongbao','Xóa thành công');
    }

}
