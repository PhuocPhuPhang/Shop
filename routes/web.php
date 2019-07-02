<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\CauHinhSanPhamController;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
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

        //Giới thiệu
        Route::get('gioithieu','TinTucController@getGioiThieu');
        Route::post('gioithieu','TinTucController@postGioiThieu');

        //Chính sách
        Route::get('chinhsach','TinTucController@getChinhSach');

        Route::get('chinhsach/them','TinTucController@getThemChinhSach');
        Route::post('chinhsach/them','TinTucController@postThemChinhSach');

        Route::get('chinhsach/sua/{id}','TinTucController@getSuaChinhSach');
        Route::post('chinhsach/sua/{id}','TinTucController@postSuaChinhSach');

        Route::get('chinhsach/xoa/{id}','TinTucController@postXoaChinhSach');

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

    Route::group(['prefix'=>'social'],function(){

        Route::get('danhsach','SocialController@getDanhSach');

        Route::get('them','SocialController@getThem');
        Route::post('them','SocialController@postThem');

        Route::get('sua/{id}','SocialController@getSua');
        Route::post('sua/{id}','SocialController@postSua');

        Route::get('xoa/{id}','SocialController@postXoa');
    });

    //Sản phẩm
    Route::group(['prefix'=>'sanpham'],function(){

        Route::get('danhsach','SanPhamController@getDanhSach');

        Route::get('them','SanPhamController@getThem');
        Route::post('them','SanPhamController@postThem');

        Route::post('KiemTraMaSanPham','SanPhamController@postKiemTraMaSanPham');
        Route::post('UploadImages','SanPhamController@postUploadImages');

        Route::get('sua/{masp}','SanPhamController@getSua');
        Route::post('sua/{masp}','SanPhamController@postSua');

        Route::get('xoa/{masp}','SanPhamController@postXoa');

        //Cấu hình
        Route::group(['prefix'=>'cauhinh'],function(){
            Route::get('danhsach','CauHinhSanPhamController@getDanhSach');

            Route::get('them','CauHinhSanPhamController@getThem');
            Route::post('them','CauHinhSanPhamController@postThem');

            Route::get('sua/{id}','CauHinhSanPhamController@getSua');
            Route::post('sua/{id}','CauHinhSanPhamController@postSua');

            Route::get('xoa/{id}','CauHinhSanPhamController@postXoa');

            Route::resource('demo', 'CauHinhSanPhamController@demo');
        });
    });
    //Khuyến mãi
    Route::group(['prefix'=>'khuyenmai'],function(){

        Route::get('danhsach','KhuyenMaiController@getDanhSach');

        Route::get('them','KhuyenMaiController@getThem');
        Route::post('them','KhuyenMaiController@postThem');

        Route::get('sua/{makm}','KhuyenMaiController@getSua');
        Route::post('sua/{makm}','KhuyenMaiController@postSua');

        Route::get('xoa/{makm}','KhuyenMaiController@postXoa');
    });
    // Người dùng
    Route::group(['prefix'=>'user'],function(){

        Route::get('khachhang','UsersController@getDanhSachKH');
        Route::get('nhanvien','UsersController@getDanhSachNV');

        Route::get('sua/{id}','UsersController@getSua');
        Route::post('sua/{id}','UsersController@postSua');

        Route::get('xoa/{id}','UsersController@postXoa');

        Route::get('/download',function(){
            return Excel::download(new UsersExport,'DanhSach.xlsx');
        });
    });

    //Ajax
    Route::group(['prefix'=>'ajax'],function(){
        Route::post('nhacungcap/hienthi','AjaxController@postNhaCungCap');

        Route::get('cauhinh/{idloaiCH}','AjaxController@getCauHinh');
        Route::post('cauhinh/them','AjaxController@postCauHinh');

        Route::get('loaicauhinh/{idloaiCH}','AjaxController@getLoaiCauHinh');

        Route::post('tintuc/noibat','AjaxController@postTinTucNoiBat');

        Route::post('user/update','AjaxController@postPhanQuyen');

    });
    //Website
    Route::group(['prefix'=>'website'],function(){
        Route::get('thongtin','WebsiteController@getCauHinhWebSite');
        Route::post('thongtin','WebsiteController@postCauHinhWebSite');
    });

    //Hóa đơn
    Route::group(['prefix'=>'hoadon'],function(){
        Route::get('danhsach','HoaDonController@getDanhSach');

        Route::get('duyet/{mahd}','HoaDonController@getDuyet');
        Route::post('duyet/{mahd}','HoaDonController@postDuyet');
    });


});

// User
Route::get('dangnhap','UsersController@index');

//Login Social
// Route::get('auth/{social}', 'Auth\LoginController@redirectToProvider');
// Route::get('auth/{social}/callback', 'Auth\LoginController@handleProviderCallback');


//Trang_chu
Route::get('shop','PageControllers@index');

Route::group(['prefix'=>'shop'],function(){
//Login_logout_SignUp
    Route::post('register','PageControllers@postThemUser');
    Route::post('login','PageControllers@Login');
    Route::get('logout','PageControllers@Logout');

    //Tin Tức
    Route::get('gioi-thieu','PageControllers@about_tpl');

    //Tin Tức
    Route::get('tin-tuc','PageControllers@news_tpl');
    Route::get('tin-tuc/{ten_khong_dau}','PageControllers@news_detail_tpl');

    //Sản phẩm
    Route::get('san-pham','PageControllers@product_tpl');
    Route::get('san-pham-nha-cung-cap/{nha_cung_cap}','PageControllers@product_nha_cung_cap_tpl');
    Route::get('san-pham/{ma_san_pham}','PageControllers@product_detail_tpl');

    //profile
    Route::get('profile','PageControllers@profile');
    Route::get('thong-tin-tai-khoan','PageControllers@profile');
    Route::post('cap-nhat-thong-tin','PageControllers@changeProfile');
    Route::get('doi-mat-khau','PageControllers@profile');
    Route::post('doi-mat-khau','PageControllers@postChangePassword');

    //Giỏ hàng
    Route::get('cart_tpl','PageControllers@cart_tpl');
    Route::get('add_to_cart/{id}','PageControllers@AddtoCart');
    Route::get('add_to_cart/{id}','PageControllers@AddtoCart');
    Route::get('cart/remove/{id}','PageControllers@RemoveCart');
    Route::post('cart/plus','PageControllers@PlusCart');
    Route::post('cart/minus','PageControllers@MinusCart');
    Route::post('createCart','PageControllers@createCart');


    Route::get('lien-he','PageControllers@contact_tpl');

    Route::get('SapXepGia/{sapxep}','PageControllers@SapXepGia');

    //Tìm Kiếm
        Route::post('timkiem','PageControllers@timkiem');

});


//Create_order



Route::post('SearchPrice','PageControllers@SearchPrice');












