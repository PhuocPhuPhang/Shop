<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\NhaCungCap;
use App\TinTuc;
use App\User;
use App\CauHinhSanPham;
use App\LoaiCauHinh;
use App\ThongTinSanPham;
use App\Media;
use Json;

class AjaxController extends Controller
{

    public function postNhaCungCap(Request $request)
    {
        $nhacungcap = NhaCungCap::find($request->mancc);
        if($nhacungcap->hien_thi == 1)
        {
            $nhacungcap->hien_thi = 0;
        }
        else
        {
            $nhacungcap->hien_thi = 1;
        }
        return response()->json([
            'data' => [
              'success' => $nhacungcap->save(),
            ]
          ]);
    }

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

    public function postTinTucNoiBat_HienThi(Request $request)
    {
        $tintuc = TinTuc::find($request->id);
        if($request->col == "noibat")
        {
            if($tintuc->noi_bat == 1) { $tintuc->noi_bat = 0; }
            else { $tintuc->noi_bat = 1; }
        }
        elseif($request->col ="hienthi")
        {
            if($tintuc->hien_thi == 1) { $tintuc->hien_thi = 0; }
            else { $tintuc->hien_thi = 1; }
        }
        return response()->json([
            'data' => [
              'success' => $tintuc->save(),
            ]
          ]);
    }

    public function postChinhSachHienThi(Request $request)
    {
        $chinhsach = TinTuc::find($request->id);
        if($chinhsach->hien_thi == 1) { $chinhsach->hien_thi = 0; }
        else { $chinhsach->hien_thi = 1; }
        return response()->json([
            'data' => [
              'success' => $chinhsach->save(),
            ]
          ]);
    }

    public function postMediaHienThi(Request $request)
    {
        $media = Media::find($request->id);

        if($media->hien_thi == 1) { $media->hien_thi = 0; }
        else { $media->hien_thi = 1; }
        return response()->json([
            'data' => [
              'success' => $media->save(),
            ]
          ]);
    }

    public function postSlideThuTu(Request $request)
    {
        $slide = Media::find($request->id);
        $thutu = $request->thutu;
        $tontai = DB::table('media')->where([['type','slide'],['thu_tu',$thutu]])->count();
        if($tontai != 0 )
        {
            $slide_tontai = DB::table('media')->where([['type','slide'],['thu_tu',$thutu]])->first();
            DB::table('media')->where([['thu_tu',$thutu],['type','slide']])->update(['thu_tu'=>$slide->thu_tu]);
            DB::table('media')->where([['thu_tu',$thutu],['type','slide']])->update(['thu_tu'=>$slide_tontai->thu_tu]);
        }
        $slide->thu_tu = $thutu;

        return response()->json([
            'data' => [
              'success' => $slide->save(),
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
        $cauhinh = null;
        if($idloaiCH != 0){
            $cauhinh = DB::table('cau_hinh_san_pham')->where('id_loai',$idloaiCH)->get();
        }
        else {
            $cauhinh = DB::table('cau_hinh_san_pham')->get();
        }
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
                     <td style='text-align:center'>".$ch->id."</td>
                     <td>".$ch->cau_hinh."</td>
                     <td style='text-align:center'>
                        <a href='admin/sanpham/cauhinh/sua/".$ch->id."' class='btn btn-info btn-xs'>
                            <i class='fa fa-pencil'></i> Edit
                        </a>
                        <a href='admin/sanpham/cauhinh/xoa/".$ch->id."' class='btn btn-danger btn-xs'>
                        <i class='fa fa-trash-o'></i> Delete
                    </a>
                 </td>
               </tr>
               </tbody>";
        }
    }
}

