<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use DB;

class VideoController extends Controller
{
    public function getDanhSach()
    {
        $video = DB::table('media')->where([['type','video'],['da_xoa',0]])->get();
        return view('admin.video.danhsach',['video'=>$video]);
    }

    public function getThem()
    {
        return view('admin.video.them');
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

        $video = new Media;
        $video->ten = $request->ten;
        $video->link = $request->link;
        $video->type = "video";

        $video->save();
        return redirect('shop/admin/video/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $video = DB::table('media')->where('id',$id)->first();
        return view('admin.video.sua',['video'=>$video]);
    }

    public function postSua(Request $request,$id)
    {
        $video = Media::find($id);
        $this->validate($request,[
            'ten'=> 'required|max:255',
            'link'=> 'min:10',
        ],[
            'ten.required' =>   'Bạn chưa nhập tên slide',
            'ten.max' =>   'Tên slide có độ dài tối đa 255 ký tự',

            'link.min'   => 'Link có độ dài tối thiểu 10 ký tự',
        ]);

        $video->ten = $request->ten;
        $video->link = $request->link;

        $video->save();
        return redirect('shop/admin/video/sua/'.$video->id)->with('thongbao','Chỉnh sửa thành công');
    }

    public function getXoa($id)
    {
        $video = Media::find($id);
        $video->delete();
        return redirect('shop/admin/video/danhsach')->with('thongbao','Xóa thành công');
    }
}
