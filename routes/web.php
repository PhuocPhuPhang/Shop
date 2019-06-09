<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\NhaCungCapController;
// use Illuminate\Routing\RouteRegistrar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 // Đăng nhập admin
Route::get('admin/login','AdminLoginController@index');
Route::post('admin/login','AdminLoginController@CheckLogin');
Route::get('admin/index','AdminLoginController@SuccessLogin');
Route::get('admin/logout','AdminLoginController@Logout');

// Trang admin
Route::group(['prefix'=>'admin'],function(){
    // Nhà cung cấp
    Route::group(['prefix'=>'nhacungcap'],function(){

        Route::get('danhsach','NhaCungCapController@getDanhSach');

        Route::get('them','NhaCungCapController@getThem');
        Route::post('them','NhaCungCapController@postThem');

        Route::get('sua/{mancc}','NhaCungCapController@getSua');
        Route::post('sua/{mancc}','NhaCungCapController@postSua');

        Route::get('xoa/{mancc}','NhaCungCapController@postXoa');
    });

    //Tin tức
    Route::group(['prefix'=>'tintuc'],function(){

        Route::get('danhsach','TinTucController@getDanhSach');

        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');

        Route::get('sua/{id}','TinTucController@getSua');
        Route::post('sua/{id}','TinTucController@postSua');

        Route::get('xoa/{id}','TinTucController@postXoa');

        Route::post('danhsach','TinTucController@Activation');

    });

    //Loại tin tức
    Route::group(['prefix'=>'loaitintuc'],function(){

        Route::get('danhsach','LoaiTinTucController@getDanhSach');

        Route::get('them','LoaiTinTucController@getThem');
        Route::post('them','LoaiTinTucController@postThem');

        Route::get('sua/{id}','LoaiTinTucController@getSua');
        Route::post('sua/{id}','LoaiTinTucController@postSua');

        Route::get('xoa/{id}','LoaiTinTucController@postXoa');

    });

    //Slide
    Route::group(['prefix'=>'slide'],function(){

        Route::get('danhsach','SlideController@getDanhSach');

        Route::get('them','SlideController@getThem');
        Route::post('them','SlideController@postThem');

        Route::get('sua/{id}','SlideController@getSua');
        Route::post('sua/{id}','SlideController@postSua');

        Route::get('xoa/{id}','SlideController@postXoa');
    });

    //Sản phẩm
    Route::group(['prefix'=>'sanpham'],function(){

        Route::get('danhsach','SanPhamController@getDanhSach');

        Route::get('them','SanPhamController@getThem');
        Route::post('them','SanPhamController@postThem');

        Route::get('sua/{masp}','SanPhamController@getSua');
        Route::post('sua/{masp}','SanPhamController@postSua');

        Route::get('xoa/{masp}','SanPhamController@postXoa');
    });
});

Route::get('trangchu','PageControllers@trangchu');
Route::get('slide','PageControllers@slider');
Route::get('tintuc','PageControllers@tintuc');


Route::get('index',function(){
	return view('layouts.pages.index');
});
// User
Route::get('dangnhap','UsersController@index');

//Login Social
Route::get('auth/{social}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{social}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('product_tpl',function(){
    return view('layouts.pages.product_tpl');
});

Route::get('product_detail_tpl',function(){
    return view('layouts.pages.product_detail_tpl');
});

Route::get('cart_tpl',function(){
    return view('layouts.pages.cart_tpl');
});

Route::get('admin/tintuc/them',function(){
    return view('admin.tintuc.them');
});
