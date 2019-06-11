<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;
use App\TinTuc;
use App\NhaCungCap;

class PageControllers extends Controller
{
<<<<<<< Updated upstream
    function __construct(){
        $nhacungcap =  NhaCungCap::all();
        view()->share('nhacungcap',$nhacungcap);
    }

    public function index()
    {
            $slide= Slide::all();
            $tintuc= TinTuc::all();
        	return view('layouts.index',['tintuc'=>$tintuc],['slide'=>$slide]);
    }
=======
>>>>>>> Stashed changes
}
