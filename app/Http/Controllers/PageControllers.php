<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;
use App\Media;
use App\TinTuc;
use App\NhaCungCap;
use App\User;
use App\SanPham;
use App\Orders;
use Session;
use DB;
use Cart;

class PageControllers extends Controller
{
  function __construct(){
    $nhacungcap =  NhaCungCap::all();
    $tintuc= TinTuc::all();
    $product= SanPham::where('noi_bat',1)->get();
    $social = Media::where('type','social')->get();
    $website = DB::table('thong_tin_cong_ty')->first();
    view()->share('nhacungcap',$nhacungcap);
    view()->share('tintuc',$tintuc);
    view()->share('product',$product);
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

public function news_tpl()
{
  return view('layouts.pages.news_tpl');
}

public function news_detail_tpl($ten_khong_dau)
{
  $tintuc = DB::table('tin_tuc')->where('ten_khong_dau',$ten_khong_dau)->first();
  return view('layouts.pages.news_detail_tpl',['news_detail'=>$tintuc]);
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
  $password = $request->password;
  $password_new = Hash::make($password);
  $user->password = $password_new;
  $user->save();

  return redirect('profile')->with('thongbao',"Đổi mật khẩu thành công");
}
else
  { return redirect('profile')->with('thongbao',"Thất bại"); }
}


public function product_tpl()
{
  $nhacungcap = NhaCungCap::all();
  return view('layouts.pages.product_tpl',['nhacungcap'=>$nhacungcap]);
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
  return redirect('cart_tpl');
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


public function UpdateCart1(Request $request)
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

