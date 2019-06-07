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
            $slide= Slide::all();
            $tintuc= TinTuc::all();
            return view('layouts.master',['nhacungcap'=>$nhacungcap],['slide'=>$slide],['tintuc'=>$tintuc]);
    }

    public function slider()
    {
            $slide= Slide::all();
            $tintuc= TinTuc::all();
        	return view('layouts.pages.index',['slide'=>$slide],['tintuc'=>$tintuc]);
    }

    public function tintuc()
    {
            $tintuc= TinTuc::all();
        	return view('layouts.pages.index',['tintuc'=>$tintuc]);
    }
}
