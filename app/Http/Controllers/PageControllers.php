<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Requests;
use App\Media;
use App\TinTuc;
use App\NhaCungCap;
use App\User;
use App\SanPham;
use App\HoaDon;
use App\ChiTietHoaDon;
use Session;
use Route;
use DB;
use Cart;

class PageControllers extends Controller
{
  function __construct(){
    $nhacungcap =  NhaCungCap::all();
    $tintuc= TinTuc::all();
    $product_shop= SanPham::where('noi_bat',1)->paginate(8);
    
    $social = Media::where('type','social')->get();
    $website = DB::table('thong_tin_cong_ty')->first();
    $route = Route::current();
    view()->share('route',$route);
    view()->share('nhacungcap',$nhacungcap);
    view()->share('tintuc',$tintuc);
    view()->share('product_shop',$product_shop);
    view()->share('social',$social);
    view()->share('website',$website);
  }

  public function index()
  {
    $slide= Media::where('type','slide')->get();
    $social = Media::where('type','social')->get();
    $tintuc= TinTuc::all();
    $product= SanPham::where('noi_bat',1)->get();
    $website = DB::table('thong_tin_cong_ty')->first();
    return view('layouts.index',['tintuc'=>$tintuc],['slide'=>$slide],
      ['product'=>$product],['social'=>$social],['webstite'=>$website]);
  }

  public function postThemUser(Request $request)
  {
    $this->validate($request,
      [
        'ten' => 'required',
        'so_dien_thoai'=> 'required|numeric|min:9',
        'email'=> 'required',
        'password'  =>  'required|min:6|confirmed',
        'password_confirmation'  =>  'required|min:6',
        'gioi_tinh'=> 'required',
        'ngay_sinh'=> 'required',
      ],
      [
        'ten.required' => 'Bạn chưa nhập họ tên',

        'so_dien_thoai.required'   => 'Số điện thoại chưa nhập',
        'so_dien_thoai.numeric'   => 'Số điện thoại bắt buộc phải là số',
        'so_dien_thoai.min'   => 'Số điện thoại có độ dài không dưới 10 số',

        'email.required' =>   'Bạn chưa nhập email',
        'password.required' =>   'Bạn chưa nhập password',
        'password.min'=> 'Mật khẩu quá ngắn ít nhất 6 kí tự',
        'password.confirmed'=> 'Mật khẩu chưa khớp',
        'password_confirmation.required'=> 'Bạn chưa nhập lại password',
        'gioi_tinh.required'=> 'Chưa chọn giới tính',
        'ngay_sinh.required' =>   'Bạn chưa nhập ngày sinh',

      ]);

    $user = new User();
    $password = $request['password'];
    $check_email = $user->where('email',$request->email)->first();

    if(!empty($check_email))
    {
      if($check_email->email == $request->email)
      {
        return redirect('shop')->with('email','Email đã tồn tại');
      }
    }
    else
    {
     $user = new User;
     $user->ten = $request->ten;
     $user->email = $request->email;
     $user->password = Hash::make($password);
     $user->quyen = 0;
     $user->gioi_tinh = $request->gioi_tinh;
     $user->so_dien_thoai = $request->so_dien_thoai;
     $user->ngay_sinh = $request->ngay_sinh;

     $user->save();
     return redirect('shop')->with('thongbao','Thành Công');
   }
 }

 public function Login(Request $request)
 {
  $this->validate($request,
    [
      'email'   => 'required|email',
      'password'  => 'required',
    ],
    [
      'email.required'=>'Bạn chưa nhập Email',
      'password.required'=>'Bạn chưa nhập mật khẩu',
    ]);

  $user_data = array(
    'email'  => $request->get('email'),
    'password' => $request->get('password'),
  );

  if(Auth::attempt($user_data))
  {
    return redirect('shop')->with('login',"Đăng nhập thành công");
  }
  else
  {
    return redirect('shop')->with('errorLogin', 'Sai email hoặc mật khẩu. Vui lòng kiểm tra lại thông tin nhập.');
  }
}
public function Logout()
{
 Auth::logout();
 return redirect('shop');
}

public function about_tpl()
{
  $about = DB::table('tin_tuc')->where('type','gioi-thieu')->first();
  return view('layouts.pages.about_tpl',['about'=>$about]);
}

public function news_tpl()
{
  return view('layouts.pages.news_tpl');
}

public function contact()
{
  return view('layouts.pages.contact');
}

public function news_detail_tpl($ten_khong_dau)
{
  $news_detail = DB::table('tin_tuc')->where('ten_khong_dau',$ten_khong_dau)->first();
  return view('layouts.pages.news_detail_tpl',['news_detail'=>$news_detail]);
}

public function product_detail_tpl($ma_san_pham)
{
  $product_detail = SanPham::find($ma_san_pham);
  return view('layouts.pages.product_detail_tpl',['product_detail'=>$product_detail]);
}

public function profile()
{
  return view('layouts.pages.profile');
}

public function postChangePassword(Request $request)
{
   $this->validate($request,
    [
      'password_old' => 'required|min:6',
      'password'  =>  'required|min:6|confirmed',
      'password_confirmation' =>  'required|min:6'
    ],
    [
      'password_old.required' =>   'Bạn chưa nhập password',
      'password.required' =>   'Bạn chưa nhập password',
      'password.min'=> 'Mật khẩu quá ngắn ít nhất 6 kí tự',
      'password.confirmed'=> 'Mật khẩu chưa khớp',
      'password_confirmation.required'=> 'Bạn chưa nhập lại password',
    ]);

   $user = Auth::user();
   $password_old = $request['password_old'];
   if(Hash::check($password_old,$user->password))
   {
     $password = $request['password'];
     DB::table('users')->where('id',$user->id)->update(['password'=> Hash::make($password)]);

    return redirect('shop/profile')->with('thongbao',"Đổi mật khẩu thành công");
  }
  else
    { return redirect('shop/profile')->with('thongbao',"Thất bại"); }
}


public function product_tpl()
{
  $product_tpl= SanPham::paginate(6);
  return view('layouts.pages.product_tpl',['product_tpl'=>$product_tpl]);
}

public function product_nha_cung_cap_tpl($ma_nha_cung_cap)
{
  $nha_cung_cap = NhaCungCap::find($ma_nha_cung_cap)->first();
  $ma_nha_cung_cap = $nha_cung_cap->ma_nha_cung_cap;
  $product_ncc_tpl= SanPham::where('nha_cung_cap',$ma_nha_cung_cap)->paginate(6);
  return view('layouts.pages.product_tpl',['product_tpl'=>$product_ncc_tpl]);
}

public function AddtoCart($id)
{
  $product = SanPham::find($id);

  $add =  Cart::add(array(
    'id' => $product->ma_san_pham,
    'name' => $product->ten_san_pham,
    'price' => $product->gia_ban,
    'quantity'=> 1,
    'attributes' => array(
      'img' => $product->hinh_anh
    )
  ));
  return redirect('shop/cart_tpl');
}

public function cart_tpl()
{
  $data = Cart::getContent();
  return view('layouts.pages.cart_tpl',['data' => $data]);
}

public function RemoveCart($id)
{
  Cart::remove($id);
  return back();
}

public function PlusCart(Request $request)
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
  $user = Auth::user();;
  if ($user == false) {
    return redirect('shop/cart_tpl')->with('notUser','Đăng nhập trước khi đặt hàng');
  }else{
    $orders_detail = Cart::getContent();

  $order = new HoaDon;
  $order->ma_hoa_don = "HD". rand(00000000,99999999);
  $order->ma_nguoi_dung = auth()->user()->email;
  $order->ten_nguoi_nhan = $request->ten;
  $order->so_dien_thoai = $request->dienthoai;
  $order->dia_chi = $request->diachi;
  $order->save();

  foreach ($orders_detail as $or_detail) {
    $order_de = new ChiTietHoaDon;
    $order_de->ma_hoa_don = $order->ma_hoa_don;
    $order_de->ma_san_pham = $or_detail->id;
    $order_de->so_luong = $or_detail->quantity;
    $order_de->save();
  }
  Cart::clear();
  return redirect('shop');
  }
}

public function timkiem(Request $request)
{
  $tukhoa= $request->tukhoa;
  $nhacungcap = $request->nhacungcap_select;
  // dd($nhacungcap);
  $product_list = NhaCungCap::where('ten_nha_cung_cap','like',"%$tukhoa%")->first();
  $product = SanPham::where('ten_san_pham','like',"%$tukhoa%")->orWhere('gia_ban','like',"%$tukhoa%")->get();
  return view('layouts.pages.search',['product'=>$product , 'tukhoa'=>$tukhoa]);
}

public function SearchPrice(Request $request)
{
  $Price_selected = $request->gia;

  if($Price_selected == 1)
  {
    $product_select = SanPham::whereBetween('gia_ban', [1, 2000000])->paginate(6);
    return redirect('shop/san-pham',['product_select'=>$product_select]);
  }
}

public function SapXepGia($sapxep)
{
  $sp = null;
  if($sapxep == 1)
  {
    $sp = DB::table('san_pham')->orderBy('gia_ban','desc')->get();
  }
  return redirect('shop/san-pham',['product_tpl'=>$sp]);

  }

}

