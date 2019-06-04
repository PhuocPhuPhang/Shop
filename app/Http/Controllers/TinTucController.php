<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use Validator;

class TinTucController extends Controller
{
    public function getDanhSach()
    {
        $tintuc = TinTuc::all();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
}
