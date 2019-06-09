<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HinhAnh;
use App\NhaCungCap;
use Validator;

class SanPhamController extends Controller
{
    public function getDanhSach()
    {
        return view('admin.sanpham.danhsach');
    }

}
