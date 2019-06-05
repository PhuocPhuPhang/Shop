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
});

Route::get('trangchu','PageControllers@trangchu');

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
