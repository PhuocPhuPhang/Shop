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

Route::get('dangnhap',function(){
   return view('layouts.login.login');
});

Route::get('trangchu',function(){
    return view('admin.layouts.index');
 });

 Route::get('danhsach',function(){
    return view('admin.tintuc.danhsach');
 });

 Route::get('them',function(){
    return view('admin.tintuc.them');
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

        // Route::get('danhsach','NhaCungCapController@getDanhSach');

        // Route::get('them','NhaCungCapController@getThem');

        // Route::get('sua','NhaCungCapController@getSua');
    });
});
