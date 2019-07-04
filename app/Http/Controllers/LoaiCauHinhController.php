<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoaiCauHinhController extends Controller
{
    public function getDanhSach()
    {
        $loaicauhinh = DB::table('loai_cau_hinh')->get();
        return view('admin.sanpham.loaicauhinh.danhsach',['loaicauhinh'=>$loaicauhinh]);
    }

    public function postThem(Request $request)
    {

    }
}
