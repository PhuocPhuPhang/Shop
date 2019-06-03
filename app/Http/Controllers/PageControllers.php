<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NhaCungCap;

class PageControllers extends Controller
{
    //
    public function trangchu()
    {
            $ncc=NhaCungCap::all();
            return view('layouts.header',['nhacungcap'=>$ncc]);
    }
}
