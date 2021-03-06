<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\HinhAnh;
use App\NhaCungCap;
use App\CauHinhSanPham;
use App\LoaiCauHinh;
use App\ThongTinSanPham;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use App\Http\Middleware\RedirectIfAuthenticated;

class SanPhamController extends Controller
{
    function __construct()
    {
        $loaicauhinh = LoaiCauHinh::all();
        $dsCauHinh = CauHinhSanPham::all();
        $thongtinsp = ThongTinSanPham::all();
        $nhacungcap = NhaCungCap::all();

        view()->share('loaicauhinh', $loaicauhinh);
        view()->share('dsCauHinh', $dsCauHinh);
        view()->share('thongtinsp', $thongtinsp);
        view()->share('nhacungcap', $nhacungcap);
    }
    public function getDanhSach()
    {
        $sanpham = DB::table('san_pham')->orderBy('created_at','desc')->get();
        $nhacungcap = NhaCungCap::all();
        return view('admin.sanpham.danhsach', ['sanpham' => $sanpham]);
    }

    public function getThem()
    {
        $nhacungcap = NhaCungCap::all();
        $dsCauHinh = CauHinhSanPham::all();
        $cauhinh = DB::table('cau_hinh_san_pham')->select('*')->groupBy('id_loai')->get();
        $loaicauhinh = DB::table('cau_hinh_san_pham')
            ->join('loai_cau_hinh', 'cau_hinh_san_pham.id_loai', '=', 'loai_cau_hinh.id')
            ->select('ten', 'loai_cau_hinh.id')->where('cau_hinh_san_pham.id_loai', '=', 'loai_cau_hinh.id')->groupBy('cau_hinh_san_pham.id_loai')->get();
        return view(
            'admin.sanpham.them',
            ['cauhinh' => $cauhinh],
            ['nhacungcap' => $nhacungcap],
            $loaicauhinh,
            ['dsCauHinh' => $dsCauHinh]
        );
    }

    public function postThem(Request $request)
    {
        $mang = $request->mang;
        $newArr = [];
        foreach ($mang as $item) {
            foreach ($item as $key => $value) {
                $newArr[$key] = $value;
            }
        }
        $sanpham = new SanPham;
        $masp = "SP" . rand(00000000, 99999999);
        $sanpham->ma_san_pham = $masp;
        $sanpham->ten_san_pham = $newArr['ten'];
        $sanpham->ten_khong_dau = str_slug($newArr['ten']);
        $sanpham->nha_cung_cap = $newArr['nhacungcap'];
        $sanpham->so_luong = $newArr['soluong'];
        $sanpham->gia_ban = $newArr['giaban'];
        $sanpham->mau_sac = $newArr['mausac'];
        $sanpham->mo_ta = $newArr['mota'];
        $sanpham->noi_dung = $newArr['noidung'];

        $listCauHinh = DB::table('cau_hinh_san_pham')->select('id', 'ten_khong_dau')->get();
        foreach ($newArr as $key => $value) {
            foreach ($listCauHinh as $cauhinh) {
                if ($cauhinh->ten_khong_dau == $key) {
                    if ($newArr[$key] != null) {
                        $thongtinsp = new ThongTinSanPham;
                        $thongtinsp->ma_san_pham = $masp;
                        $thongtinsp->id_cau_hinh = $cauhinh->id;
                        $thongtinsp->mo_ta = $newArr[$key];
                        $thongtinsp->save();
                    }
                }
            }
        }
        if (file_exists("..\public\upload\sanpham\hinhanhkhac\hinh.txt")) {
            $image_file = fopen("..\public\upload\sanpham\hinhanhkhac\hinh.txt", "r");
            $read = file("..\public\upload\sanpham\hinhanhkhac\hinh.txt");
            foreach ($read as $image) {
                $array_item = explode(",", $image);
                $sanpham->hinh_anh =  $array_item[0];
                for ($i = 0; $i < count($array_item) - 1; $i++) {
                    $hinhanh_sp = new HinhAnh;
                    $hinhanh_sp->ma_san_pham = $masp;
                    $hinhanh_sp->hinh_anh = $array_item[$i];
                    $hinhanh_sp->save();
                }
            }
            fclose($image_file);
            unlink("..\public\upload\sanpham\hinhanhkhac\hinh.txt");
        }
        $sanpham->save();
        return response()->json([
            'data' => [
                'success' => 1,
            ]
        ]);
    }

    public function postUploadImages(Request $request)
    {
        if (file_exists("..\public\upload\sanpham\hinhanhkhac\hinh.txt")) {
            unlink("..\public\upload\sanpham\hinhanhkhac\hinh.txt");
            if ($request->hasFile('file')) {
                $image_file = fopen("..\public\upload\sanpham\hinhanhkhac\hinh.txt", "a");
                foreach ($request->file as $image) {
                    $duoi = $image->getClientOriginalExtension();
                    $name = $image->getClientOriginalName();
                    $hinh = $name . '_' . time() . '.' . $duoi;
                    fwrite($image_file, $hinh . ",");
                    $image->move("upload/sanpham/hinhanhkhac", $hinh);
                }
                fclose($image_file);
            }
        } else {
            $image_file = fopen("..\public\upload\sanpham\hinhanhkhac\hinh.txt", "x");
            if ($request->hasFile('file')) {
                foreach ($request->file as $image) {
                    $duoi = $image->getClientOriginalExtension();
                    $name = $image->getClientOriginalName();
                    $hinh = $name . '_' . time() . '.' . $duoi;
                    fwrite($image_file, $hinh . ",");
                    $image->move("upload/sanpham/hinhanhkhac", $hinh);
                }
            }
            fclose($image_file);
        }
    }
    public function getSua($masp)
    {
        $nhacungcap = NhaCungCap::all();
        $sanpham = SanPham::find($masp);
        $thongtin_sp = DB::table('thong_tin_san_pham')
            ->join('cau_hinh_san_pham', 'thong_tin_san_pham.id_cau_hinh', 'cau_hinh_san_pham.id')
            ->select('cau_hinh_san_pham.cau_hinh', 'cau_hinh_san_pham.ten_khong_dau', 'cau_hinh_san_pham.id_loai', 'thong_tin_san_pham.mo_ta')
            ->where('thong_tin_san_pham.ma_san_pham', $masp)->get();
        $hinhanh = DB::table('hinh_anh_san_pham')->where('ma_san_pham', $masp)->get();

        return view('admin.sanpham.sua', ['sanpham' => $sanpham, 'thongtin_sp' => $thongtin_sp, 'nhacungcap' => $nhacungcap, 'hinhanh' => $hinhanh]);
    }

    public function postSua(Request $request, $masp)
    {
        $sanpham = SanPham::find($masp);
        $mang = $request->mang;
        $newArr = [];
        foreach ($mang as $item) {
            foreach ($item as $key => $value) {
                $newArr[$key] = $value;
            }
        }
        $sanpham->ma_san_pham = $masp;
        $sanpham->ten_san_pham = $newArr['ten'];
        $sanpham->ten_khong_dau = str_slug($newArr['ten']);
        $sanpham->nha_cung_cap = $newArr['nhacungcap'];
        $sanpham->so_luong = $newArr['soluong'];
        $sanpham->gia_ban = $newArr['giaban'];
        $sanpham->mau_sac = $newArr['mausac'];
        $sanpham->mo_ta = $newArr['mota'];
        $sanpham->noi_dung = $newArr['noidung'];
        $sanpham->save();

        $listCauHinh = DB::table('cau_hinh_san_pham')->select('id', 'ten_khong_dau')->get();
        DB::table('thong_tin_san_pham')->where('ma_san_pham', $masp)->delete();
        foreach ($newArr as $key => $value) {
            foreach ($listCauHinh as $cauhinh) {
                if ($cauhinh->ten_khong_dau == $key) {
                    if ($newArr[$key] != null) {
                        $thongtinsp = new ThongTinSanPham;
                        $thongtinsp->ma_san_pham = $masp;
                        $thongtinsp->id_cau_hinh = $cauhinh->id;
                        $thongtinsp->mo_ta = $newArr[$key];
                        $thongtinsp->save();
                    }
                }
            }
        }
        if (file_exists("..\public\upload\sanpham\hinhanhkhac\hinh.txt")) {
            $image_file = fopen("..\public\upload\sanpham\hinhanhkhac\hinh.txt", "r");
            $read = file("..\public\upload\sanpham\hinhanhkhac\hinh.txt");
            foreach ($read as $image) {
                $array_item = explode(",", $image);
                $sanpham->hinh_anh =  $array_item[0];
                $sanpham->save();
                for ($i = 0; $i < count($array_item) - 1; $i++) {
                    $hinhanh_sp = new HinhAnh;
                    $hinhanh_sp->ma_san_pham = $masp;
                    $hinhanh_sp->hinh_anh = $array_item[$i];
                    $hinhanh_sp->save();
                }
            }
            fclose($image_file);
            unlink("..\public\upload\sanpham\hinhanhkhac\hinh.txt");
        }
        return response()->json([
            'data' => [
                'success' => 1,
            ]
        ]);
    }

    public function getXoa($masp)
    {
        DB::table('san_pham')->where('ma_san_pham', $masp)->update(['da_xoa' => 1]);

        return redirect('shop/admin/sanpham/danhsach')->with('thongbao', 'Cập nhật trạng thái thành công phẩm thành công');
    }

    public function getUpdate($masp)
    {
        DB::table('san_pham')->where('ma_san_pham', $masp)->update(['da_xoa' => 0]);
        return redirect('shop/admin/sanpham/danhsach')->with('thongbao', 'Cập nhật trạng thái thành công phẩm thành công');
    }

    public function postXoaHinh(Request $request, $id)
    {
        $hinhanh = DB::table('hinh_anh_san_pham')->where('id', $id)->first();
        if ($hinhanh->hinh_anh) {
            unlink(public_path('upload/sanpham/hinhanhkhac/' . $hinhanh->hinh_anh));
        }
        DB::table('hinh_anh_san_pham')->where('id', $id)->delete();
        return response()->json([
            'data' => [
                'success' => 1,
            ]
        ]);
    }
}
