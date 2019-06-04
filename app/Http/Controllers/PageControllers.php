<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\NhaCungCap;

class PageControllers extends Controller
{
    public function trangchu()
    {
            $nhacungcap= NhaCungCap::all();
        	return view('layouts.master',['nhacungcap'=>$nhacungcap]);
    }
}
