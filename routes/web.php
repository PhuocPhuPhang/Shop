<?php

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

 Route::get('nhacungcap',function(){
    return view('admin.nha_cung_cap.danh_sach');
 });
