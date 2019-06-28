<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TinTuc;
use App\User;
use App\CauHinhSanPham;
use App\LoaiCauHinh;
use App\ThongTinSanPham;
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

    public function postCauHinh(Request $request)
    {
        $this->validate($request,[
            'cauhinh_new' => 'unique:cau_hinh_san_pham,cau_hinh'
        ],[
            'cauhinh_new.unique' => 'Cấu hình đã tồn tại'
        ]);

        $cauhinh = new CauHinhSanPham;
        $cauhinh->cau_hinh = $request->cauhinh_new;
        $cauhinh->ten_khong_dau = str_slug($request->cauhinh_new);
        $cauhinh->id_loai = $request->loaich;
        return response()->json([
            'data' => [
              'success' => $cauhinh->save(),
            ]
          ]);
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

    public function getLoaiCauHinh($idloaiCH)
    {
        $cauhinh = DB::table('cau_hinh_san_pham')->where('id_loai',$idloaiCH)->get();
         echo "  <table id='datatable' class='table table-striped table-bordered'>
             <thead>
                    <tr>
                    <th style='text-align:center'>STT</th>
                    <th style='text-align:center'>Cấu hình</th>
                    <th style='text-align:center'>Thao tác</th>
                    </tr>
                </thead>";
        foreach($cauhinh as $ch)
        {
            echo "<tbody>
                <tr>
                     <td>".$ch->id."</td>
                     <td>".$ch->cau_hinh."</td>
                     <td style='text-align:center'>
                        <a href='../cauhinh/sua/".$ch->id."' class='btn btn-info btn-xs'>
                            <i class='fa fa-pencil'></i> Edit
                        </a>
                        <a href='../cauhinh/xoa/".$ch->id."' class='btn btn-danger btn-xs'>
                        <i class='fa fa-trash-o'></i> Delete
                    </a>
                 </td>
               </tr>
               </tbody>";
        }
    }
}

