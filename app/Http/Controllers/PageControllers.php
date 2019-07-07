<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Requests;
use App\Media;
use App\TinTuc;
use App\NhaCungCap;
use App\User;
use App\SanPham;
use App\HoaDon;
use App\ChiTietHoaDon;
use App\LoaiCauHinh;
use Session;
use Route;
use DB;
use Cart;

class PageControllers extends Controller
{
  function __construct()
  {
    $about = DB::table('tin_tuc')->where('type', 'gioi-thieu')->first();
    $nhacungcap =  NhaCungCap::all();
    $tintuc = TinTuc::all();
    $tintuc_shop = TinTuc::where('type', 'tin-tuc')->get();
    $product_shop = SanPham::where('noi_bat', 1)->paginate(12);
    $social = Media::where('type', 'social')->get();
    $website = DB::table('thong_tin_cong_ty')->first();
    $route = Route::current();
    view()->share('route', $route);
    view()->share('about', $about);
    view()->share('nhacungcap', $nhacungcap);
    view()->share('tintuc', $tintuc);
    view()->share('tintuc_shop', $tintuc_shop);
    view()->share('product_shop', $product_shop);
    view()->share('social', $social);
    view()->share('website', $website);
  }

  public function index()
  {
    $slide = Media::where([['type', 'slide'], ['hien_thi', 1]])->get();
    $social = Media::where([['type', 'social'], ['hien_thi', 1]])->get();
    $tintuc = TinTuc::where('hien_thi', 1)->get();
    $product = SanPham::where('noi_bat', 1)->get();
    $website = DB::table('thong_tin_cong_ty')->first();
    return view(
      'layouts.index',
      ['tintuc' => $tintuc],
      ['slide' => $slide],
      ['product' => $product],
      ['social' => $social],
      ['webstite' => $website]
    );
  }

  public function postThemUser(Request $request)
  {
    $user = new User();
    $password = $request['password'];
    $check_email = $user->where('email', $request->email)->first();

    if (!empty($check_email)) {
      if ($check_email->email == $request->email) {
        return redirect('shop')->with('emailErro', 'Email đã tồn tại');
      }
    } else {
      $user = new User;
      $user->ten = $request->ten;
      $user->email = $request->email;
      $user->password = Hash::make($password);
      $user->quyen = 0;
      $user->gioi_tinh = $request->gioi_tinh;
      $user->so_dien_thoai = $request->so_dien_thoai;
      $user->ngay_sinh = $request->ngay_sinh;

      $user->save();
      return redirect('shop')->with('thongbao', 'Thành Công');
    }
  }

  public function Login(Request $request)
  {
    $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password'),
    );

    if (Auth::attempt($user_data)) {
      return redirect('shop')->with('login', "Đăng nhập thành công");
    } else {
      return redirect('shop')->with('errorLogin', 'Sai email hoặc mật khẩu. Vui lòng kiểm tra lại thông tin nhập.');
    }
  }
  public function Logout()
  {
    Auth::logout();
    Cart::clear();
    return redirect('shop');
  }

  public function video()
  {

    return view('layouts.pages.video');
  }

  public function about_tpl()
  {

    return view('layouts.pages.about_tpl');
  }

  public function news_tpl()
  {
    return view('layouts.pages.news_tpl');
  }

  public function news_detail_tpl($ten_khong_dau)
  {
    $news_detail = DB::table('tin_tuc')->where('ten_khong_dau', $ten_khong_dau)->first();
    return view('layouts.pages.news_detail_tpl', ['news_detail' => $news_detail]);
  }

  public function product_detail_tpl($ma_san_pham)
  {
    $product_detail = SanPham::find($ma_san_pham);
    $product_ncc = $product_detail->nha_cung_cap;
    $product_related = DB::table('san_pham')->Where('nha_cung_cap', $product_ncc)->whereNotIn('ma_san_pham', [$ma_san_pham])->get();
    $img_related = DB::table('hinh_anh_san_pham')->Where('ma_san_pham', $ma_san_pham)->get();
    $tintuc_tukhoa = DB::table('tin_tuc')->where('type', 'tin-tuc')->get();
    $ttsp = DB::table('san_pham')->join('thong_tin_san_pham', 'san_pham.ma_san_pham', '=', 'thong_tin_san_pham.ma_san_pham')->join('cau_hinh_san_pham', 'thong_tin_san_pham.id_cau_hinh', '=', 'cau_hinh_san_pham.id')->join('loai_cau_hinh', 'cau_hinh_san_pham.id_loai', '=', 'loai_cau_hinh.id')->where('san_pham.ma_san_pham', $ma_san_pham)->select('san_pham.ma_san_pham', 'thong_tin_san_pham.mo_ta', 'cau_hinh_san_pham.cau_hinh', 'loai_cau_hinh.ten', 'loai_cau_hinh.id')->get();
        // dd($ttsp);
    $loaicauhinh = LoaiCauHinh::all();
    return view('layouts.pages.product_detail_tpl', compact('product_detail', 'tintuc_tukhoa', 'product_related', 'img_related', 'ttsp', 'loaicauhinh'));
  }

  public function profile()
  {
    return view('layouts.pages.profile');
  }
  public function changeProfile(Request $request)
  {
    // $this->validate(
    //   $request,
    //   [
    //     'ten' => 'required',
    //     'so_dien_thoai' => 'required|numeric|min:9',
    //     'ngay_sinh' => 'required',
    //   ],
    //   [
    //     'ten.required' => 'Bạn chưa nhập họ tên',
    //     'so_dien_thoai.required'   => 'Số điện thoại chưa nhập',
    //     'so_dien_thoai.numeric'   => 'Số điện thoại bắt buộc phải là số',
    //     'so_dien_thoai.min'   => 'Số điện thoại có độ dài không dưới 10 số',
    //     'ngay_sinh.required' =>   'Bạn chưa nhập ngày sinh',
    //   ]
    // );

    $user = Auth::user();
    DB::table('users')->where('id', $user->id)->update(['ten' => $request->ten, 'so_dien_thoai' => $request->so_dien_thoai, 'gioi_tinh' => $request->gioi_tinh, 'ngay_sinh' => $request->ngay_sinh, 'dia_chi' => $request->dia_chi]);

    return redirect('shop/profile')->with('ThongTin', "Cập nhật thông tin thành công");
  }

  public function postChangePassword(Request $request)
  {
    $user = Auth::user();
    $password_old = $request['password_old'];
    if (Hash::check($password_old, $user->password)) {
      $password = $request['password2'];
      DB::table('users')->where('id', $user->id)->update(['password' => Hash::make($password)]);

      Auth::logout();
      return redirect('shop')->with('thongbao', "Đổi mật khẩu thành công");
    } else {
      return redirect('shop/doi-mat-khau')->with('changeErro', "Mật khẩu không đúng.");
    }
  }


  public function product_tpl()
  {
    $product_tpl = SanPham::paginate(12);
    $ttsp = DB::table('san_pham')->join('thong_tin_san_pham', 'san_pham.ma_san_pham', '=', 'thong_tin_san_pham.ma_san_pham')->join('cau_hinh_san_pham', 'thong_tin_san_pham.id_cau_hinh', '=', 'cau_hinh_san_pham.id')
    ->select('san_pham.ma_san_pham','cau_hinh_san_pham.cau_hinh','thong_tin_san_pham.mo_ta')->get();
    return view('layouts.pages.product_tpl', ['product_tpl' => $product_tpl,'ttsp'=>$ttsp]);
  }

  public function product_nha_cung_cap_tpl($ma_nha_cung_cap)
  {
    $product_ncc_tpl = SanPham::where('nha_cung_cap', $ma_nha_cung_cap)->paginate(8);
    return view('layouts.pages.product_tpl', ['product_tpl' => $product_ncc_tpl]);
  }

  public function timkiem(Request $request)
  {
    $tukhoa = $request->tukhoa;
    $nhacungcap = $request->nhacungcap_select;
    $product_list = NhaCungCap::where('ten_nha_cung_cap', 'like', "%$tukhoa%")->first();
    $product = SanPham::where('ten_san_pham', 'like', "%$tukhoa%")->orWhere('gia_ban', 'like', "%$tukhoa%")->get();
    return view('layouts.pages.search', ['product' => $product, 'tukhoa' => $tukhoa]);
  }

  public function AddtoCart($id)
  {
    $product = SanPham::find($id);

    $add =  Cart::add(array(
      'id' => $product->ma_san_pham,
      'name' => $product->ten_san_pham,
      'price' => $product->gia_ban,
      'quantity' => 1,
      'attributes' => array(
        'img' => $product->hinh_anh
      )
    ));
    return redirect('shop/cart_tpl');
  }

  public function cart_tpl()
  {
    $user = Auth::user();
    $data = Cart::getContent();
    $hinhthuc = DB::table('hinh_thuc_thanh_toan')->get();
    $sanpham = null;
    foreach ($data as $item) {
      $sanpham = DB::table('san_pham')->where('ma_san_pham',$item->id)->first();
    }

    return view('layouts.pages.cart_tpl', ['data' => $data, 'sanpham'=>$sanpham,'user'=>$user,'hinhthuc'=>$hinhthuc]);
  }

  public function RemoveCart($id)
  {
    Cart::remove($id);
    return back();
  }

  public function PlusCart(Request $request)
  {
    $sanpham = DB::table('san_pham')->where('ma_san_pham',$request->id)->first();
    if($request->newQty >= $sanpham->so_luong ){
     return response()->json([
      'data' => [
        'success' => false,
      ]
    ]);
   }
   else
   {
     Cart::update($request->id, array(
      'quantity' => 1,
    ));
     return response()->json([
      'data' => [
        'success' => true,
      ]
    ]);
   }
 }



 public function MinusCart(Request $request)
 {
  Cart::update($request->id, array(
    'quantity' => -1,
  ));
  return response()->json([
    'data' => [
      'success' => true,
    ]
  ]);
}

public function createCart(Request $request)
{
  $user = Auth::user();
  if ($user == false) {
    return redirect('shop/cart_tpl')->with('notUser', 'Đăng nhập trước khi đặt hàng');
  } else {
    $orders_detail = Cart::getContent();

    $order = new HoaDon;
    $order->ma_hoa_don = "HD" . rand(00000000, 99999999);
    $order->email = auth()->user()->email;
    $order->ten_nguoi_nhan = $request->ten;
    $order->so_dien_thoai = $request->dienthoai;
    $order->dia_chi = $request->diachi;
    $order->thanh_toan = $request->phuongthuc;

    $order->save();

    foreach ($orders_detail as $or_detail) {
      $order_de = new ChiTietHoaDon;
      $order_de->ma_hoa_don = $order->ma_hoa_don;
      $order_de->ma_san_pham = $or_detail->id;
      $order_de->so_luong = $or_detail->quantity;
      $order_de->save();
      $soluong_ton = DB::table('san_pham')->where('ma_san_pham',$or_detail->id)->first();
      $soluong_update = $soluong_ton->so_luong - $or_detail->quantity;
      DB::table('san_pham')->where('ma_san_pham',$or_detail->id)->update(['so_luong'=>$soluong_update]);
    }
    Cart::clear();
    return redirect('shop')->with('thongbaodathang', 'Quý khách đã đặt hàng thành công. Xin cảm ơn.');
  }
}

public function SapXepGia(Request $request)
{
  if ($request->gia == 1) {
    $sp = DB::table('san_pham')->orderBy('gia_ban', 'desc')->paginate(6);
  }
  if ($request->gia == 2) {
    $sp = DB::table('san_pham')->orderBy('gia_ban', 'asc')->paginate(6);
  }
  return view('layouts.pages.product_tpl', ['product_tpl' => $sp]);
}

public function DonHang()
{

  $user_email = Auth::user();
  $don_hang = DB::table('hoa_don')->where('email', $user_email->email)->get();
  $soluong_donhang = count($don_hang);
  if($soluong_donhang > 0){
    foreach ($don_hang as $value) {
      $don_hang_chi_tiet = DB::table('chi_tiet_hoa_don')->where('ma_hoa_don', $value->ma_hoa_don)->get();
      $a[] = $value;
      foreach ($don_hang_chi_tiet as $value2) {
        $gia_san_pham = DB::table('san_pham')->where('ma_san_pham', $value2->ma_san_pham)->get();
        $b[] = $value2;
        foreach ($gia_san_pham as $value3) {
          $c[] = $value3;
        }
      }
    }

    $tongtien = 0;

    foreach ($don_hang as $dh) {
      $chitiethoadon = DB::table('chi_tiet_hoa_don') ->join('san_pham','chi_tiet_hoa_don.ma_san_pham','=','san_pham.ma_san_pham')
      ->select('ma_hoa_don','ten_san_pham','gia_ban','chi_tiet_hoa_don.so_luong')->where('ma_hoa_don',$dh->ma_hoa_don)->get();
      foreach ($chitiethoadon as $cthd) {
        $tam = ($cthd->gia_ban) * ($cthd->so_luong);
        $tongtien += $tam;
      }
    }
    return view('layouts.pages.profile', compact('a', 'b', 'c','soluong_donhang','tongtien'));
  }else{
    return view('layouts.pages.profile', compact('soluong_donhang'));
  }

}

public function huyDonHang($ma_hoa_don)
{
  $don_hang_chi_tiet = DB::table('chi_tiet_hoa_don')->where('ma_hoa_don', $ma_hoa_don)->update(['da_xoa'=> 1]);
  $don_hang = DB::table('hoa_don')->where('ma_hoa_don', $ma_hoa_don)->update(['da_xoa'=>1]);

  return redirect('shop/don-hang')->with('huydonhang', 'Hủy đơn hàng thành công!');
}

}
