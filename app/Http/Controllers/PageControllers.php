<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;
use App\TinTuc;
use App\NhaCungCap;

class PageControllers extends Controller
{
    public function trangchu()
    {
            $nhacungcap= NhaCungCap::all();
        	return view('layouts.master',['nhacungcap'=>$nhacungcap]);
    }

    public function slider()
    {
            $slide= Slide::all();
        	return view('layouts.pages.index',['slide'=>$slide]);
    }

    public function tintuc()
    {
            $tintuc= TinTuc::all();
        	return view('layouts.pages.index',['tintuc'=>$tintuc]);
    }
}
