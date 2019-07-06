<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WebsiteController extends Controller
{
    public function getCauHinhWebSite()
    {
        $thongtin = DB::table('thong_tin_cong_ty')->first();
        return view('admin.website',['thongtin'=>$thongtin]);
    }

    public function postCauHinhWebSite(Request $request)
    {
        DB::table('thong_tin_cong_ty')->update(['ten_cong_ty'=>$request->ten,
        'email'     =>$request->email,
        'dia_chi'   =>$request->diachi,
        'hotline'   =>$request->hotline,
        'dien_thoai'=>$request->sdt,
        'website'   =>$request->website,
        'map'       =>$request->map,
        'fanpage'   =>$request->fanpage
        ]);
        return redirect('shop/admin/website/thongtin')->with('thongbao','Cập nhật thành công');
    }
}
