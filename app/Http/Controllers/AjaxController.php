<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\CauHinhSanPham;

class AjaxController extends Controller
{
    public function getCauHinh($idloaiCH)
    {
        $cauhinh = CauHinhSanPham::where('id_loai',$idloaiCH)->get();
        foreach($cauhinh as $ch)
        {
          echo "<option value='".$ch->cau_hinh."'>".$ch->cau_hinh."</option>" ;
        }
    }
}
