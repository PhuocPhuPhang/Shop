<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TinTuc;
use App\User;
use App\CauHinhSanPham;
use Json;

class AjaxController extends Controller
{

	public function getCauHinh($idloaiCH)
	{
		$cauhinh = CauHinhSanPham::where('id_loai',$idloaiCH)->get();
		echo "<option value='0'>...</option>" ;
		foreach($cauhinh as $ch)
		{
			echo "<option value='".$ch->cau_hinh."'>".$ch->cau_hinh."</option>" ;
		}
	}

    public function postTinTucNoiBat(Request $request)
    {
        $tintuc = TinTuc::find($request->id);
        if($tintuc->noi_bat == 1)
        {
            $tintuc->noi_bat = 0;
        }
        else
        {
            $tintuc->noi_bat = 1;
        }
        return response()->json([
            'data' => [
              'success' => $tintuc->save(),
            ]
          ]);
    }

    public function postPhanQuyen(Request $request)
    {
        $user = User::find($request->id);
        $user->quyen = $request->quyen;
        return response()->json([
            'data' => [
              'success' => $user->save(),
            ]
          ]);
    }
}
