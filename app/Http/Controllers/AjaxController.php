<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TinTuc;
use App\User;
use App\CauHinhSanPham;

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

	public function UpdateCart($sl, $id)
	{
		$product = SanPham::find($id);
		$add = Cart::add(array(
			'id' => $product->ma_san_pham,
			'name' => $product->ten_san_pham,
			'price' => $product->gia_ban,
			'quantity'=> $sl,
			'attributes' => array(
				'img' => $product->hinh_anh
			)
		));
		return redirect('cart_tpl');
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
