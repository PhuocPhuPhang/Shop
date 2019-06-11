<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;
use App\TinTuc;
use App\NhaCungCap;

class PageControllers extends Controller
{
    public function NCungCap()
    {
            $nhacungcap= NhaCungCap::all();
            return view('layouts.master',['nhacungcap'=>$nhacungcap]);
    }

    public function index()
    {
            $slide= Slide::all();
            $tintuc= TinTuc::all();
            $nhacungcap= NhaCungCap::all();
        	return view('layouts.index',['tintuc'=>$tintuc],['slide'=>$slide],['nhacungcap'=>$nhacungcap]);
    }
}
