<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;
use App\TinTuc;
use App\NhaCungCap;

class PageControllers extends Controller
{
    function __construct(){
        $nhacungcap =  NhaCungCap::all();
        $tintuc= TinTuc::all();
        view()->share('nhacungcap',$nhacungcap);
        view()->share('tintuc',$tintuc);
    }

    public function index()
    {
            $slide= Slide::all();
            $tintuc= TinTuc::all();
        	return view('layouts.index',['tintuc'=>$tintuc],['slide'=>$slide]);
    }

    public function news_tpl()
    {
            return view('layouts.pages.news_tpl');
    }

    public function news_detail_tpl($id)
    {
        $tintuc = TinTuc::find($id);
        return view('layouts.pages.news_detail_tpl',['tintuc'=>$tintuc]);
    }

    public function product_tpl()
    {
            return view('layouts.pages.product_tpl');
    }

}
