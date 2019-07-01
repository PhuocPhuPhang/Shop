<nav id="mmenu" class="invi_load">
	<ul>
		<li><a href="shop" title="">Trang chủ</a></li>
		<li><a href="gioi-thieu.html" title="Giới thiệu">Giới thiệu</a></li>
		<li><a href="shop/san-pham" title="">Sản phẩm</a>
			<ul>
				@foreach($nhacungcap as $ncc)
				<li><a href="">{{$ncc->ten_nha_cung_cap}}</a></li>
				@endforeach
			</ul>
		</li>
		<li><a href="shop/tin-tuc" title="">Tin tức</a></li>
		<li><a href="video.html" title="Video">Video</a></li>
		<li><a href="tuyen-dung.html" title="Tuyển dụng">Tuyển dụng</a></li>
		<li><a href="lien-he" title="">Liên hệ</a></li>
	</ul>
</nav>
<section id="top_head">
	<div class="container flex-between-center top_header-repon">
		<div class="left_top">
			<marquee>Chào mừng bạn đến với website của chúng tôi</marquee>
		</div>
		<div class="right_top flex-between-center">
			<div id="login_wrap">
				<div class="login_content">
					<div class="btn_close"><img src="{{asset('themes/images/icon/button_close.png')}}"></div>
					<div class="login_main flex-between">

						<div class="frm_left sign_up_block">
							<label class="login_title">Đăng Ký</label>
							<span class="login_about">Đăng ký để theo dõi đơn hàng, lưu danh sách sản phẩm yêu thích, nhận nhiều ưu đãi hấp dẫn.</span>
							<img src="{{asset('themes/images/img_login.png')}}">
						</div>
						<div class="frm_left login_block">
							<label class="login_title">Đăng nhập</label>
							<span class="login_about">Đăng nhập để theo dõi đơn hàng, lưu danh sách sản phẩm yêu thích, nhận nhiều ưu đãi hấp dẫn.</span>
							<img src="{{asset('themes/images/img_login.png')}}">
						</div>
						<div class="frm_right">
							<div class="login_select_wrap">
								<div class="login_select_main flex-between">
									<label class="title_login_main">Đăng nhập</label>
									<label class="title_sign_up_main">Tạo tài khoản</label>
								</div>
							</div>
							<form id="frmSignUp" action="{{ URL('/shop/register') }}" method="POST" role="form" class="sign_up_block">
								<div class="login-row">
									<label>Họ tên</label>
									<input type="text" name="ten" placeholder="Họ tên">
								</div>
								<div class="login-row">
									<label>Số diện thoại</label>
									<input type="text" name="so_dien_thoai" placeholder="Số điện thoại" >
								</div>
								<div class="login-row">
									<label>Email</label>
									<input type="email" name="email" placeholder="Email của bạn">
								</div>
								<div class="login-row">
									<label>Mật khẩu</label>
									<input type="password" id="pass" name="password" placeholder="Nhập mật khẩu">
								</div>
								<div class="login-row">
									<label>Nhập lại mật khẩu</label>
									<input type="password" id="re_pass" name="password_confirmation" placeholder="Nhập lại mật khẩu" onkeypress="myFunction()">
								</div>
								<div class="login-row">
									<label>Giới tính</label>
									<input type="radio" name="gioi_tinh" value="Nam"><label class="text_radio">Nam</label>
									<input type="radio" name="gioi_tinh" value="Nữ"><label class="text_radio">Nữ</label>
								</div>
								<div class="login-row">
									<label>Ngày sinh</label>
									<input type="date" name="ngay_sinh" value="<?php echo date('Y-m-d')?>">
								</div>
								<div class="login-row">
									<input type="checkbox" name="nhan_tin">
									<span class="check_thongbao">Nhận các thông báo và tin khuyến mãi từ chúng tôi.</span>
								</div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								<div class="login-row">
									<button name="btnDK" id="btnY">Tạo tài khoản</button>
								</div>
							</form>
							@if(count($errors) > 0)
							<script >
								alert('Thất bại');
							</script>
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)
								{{ $err }} <br>
								@endforeach
							</div>
							@endif
							@if(session('errorLogin'))
							<script>
								alert('Sai email hoặc mật khẩu. Vui lòng kiểm tra lại thông tin nhập.')
							</script>
							@endif
							@if(session('thongbao'))
							<script>
								alert('Thành Công')
							</script>
							@endif
							@if(session('login'))
							<script>
								alert('Đăng Nhập Thành Công')
							</script>
							@endif
							<form id="frmLogin" action="{{ url('/shop/login') }}" method="POST" class="login_block">
								<div class="login-row">
									<label>Email</label>
									<input type="text" name="email" placeholder="Email của bạn" required>
								</div>
								<div class="login-row">
									<label>Mật khẩu</label>
									<input type="password" name="password" placeholder="Nhập mật khẩu" required>
								</div>
								<div class="login-row">
									<span class="quenMK">Quên mật khẩu? Nhấn vào <a href="">đây</a></span>
								</div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								<div class="login-row"><input type="submit" name="" value="Login"></div>
								<!-- <div class="login-row"><a class="login_FB" href="{{ url('/auth/facebook')}}">Đăng nhập bằng FaceBook</a></div>
									<div class="login-row"><a class="login_GG" href="{{ url('/auth/google')}}">Đăng nhập bằng Google</a></div> -->
								</form>
							</div>
						</div>
					</div>
				</div>
				@if(!isset(Auth::user()->email))
				<div class="right_top_login flex-between-center">
					<label class="login">Đăng nhập</label>
					<div class="line_login"></div>
					<label class="sign_up">Tạo tài khoản</label>
				</div>
				@else
				<div class="right_top_logout flex-between-center">
					<a href="shop/profile" class="logout">{{Auth::user()->email}}</a>
					<div class="line_login"></div>
					<a href="{{url('shop/logout')}}" class="logout">Đăng xuất</a>
				</div>
				@endif
				<div class="right_top_mxh flex-between-center">
					@foreach($social as $xh)
					<a href="{{$xh->link}}" target="_blank"><img src="../upload/social/{{$xh->hinh_anh}}" alt="{{$xh->ten}}"></a>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<section id="header">
		<div class="container flex-between-center header-repon">
			<div class="banner col-head">
				<a href=""><img class="img-responsive" src="images/logo.png" alt=""></a>
			</div>
			<div class="search_haed ">
				<form id="" action="{{ URL('/timkiem') }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
					<div class="timkiem flex-between-center">
						<select id="sel_list">
							<option>Tất cả</option>
							@foreach($nhacungcap as $ncc)
							<option name="nhacungcap_select" value="{{$ncc->ma_nha_cung_cap}}">{{$ncc->ten_nha_cung_cap}}</option>
							@endforeach
						</select>
						<input class="tu_khoa" name="tukhoa" id="name_tk" type="text" placeholder="Tìm sản phẩm của bạn..." />

						<button>TÌM KIẾM</button>

						<div class="auto_search"></div>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
			<div class="r_head flex-between-center">
				<div class="email_pc">
					<p class="r1">EMAIL</p>
					<p class="r2">{{$website->email}}</p>
				</div>
				<div class="hl_pc">
					<p class="r1">HOTLINE</p>
					<p class="r2">{{$website->hotline}}</p>
				</div>
				<a href="shop/cart_tpl" class="link_cart" title="Giỏ hàng">
					<div class="cart_pc flex-between-center">
						<span class="qty_cart">{{Cart::getTotalQuantity()}}</span>
						<div class="txt">
							<p class="r1">Giỏ hàng</p>
							<p class="r2">Xem ngay</p>

							<!-- <div class="giohang_index_wrap">

								{{--@foreach($product_cart as $product)
								<div class="giohang_main">
									<img src="upload/sanpham/{{$product['item']['hinh_anh']}}">
									<div class="giohang_info_index">
										<label>{{$product['item']['ten_san_pham']}}</label>
										<div class="giohang_calc">{{$product['qty']}} * {{$product['item']['gia_ban']}}</div>
									</div>
								</div>
								@endforeach--}}

								<div class="giohang_main">
									<img src="{{asset('themes/images/sp.jpg')}}">
									<div class="giohang_info_index">
										<label>Tên sản phẩm</label>
										<div class="giohang_calc">Số lượng * giá</div>
									</div>
								</div>
								<div class="totalPrice_index">Tổng tiền: </div>
								<div class="thanhtoan_index_wrap"><a href="" class="thanhtoan_index">Đặt hàng</a></div>
							</div> -->

						</div>
					</div>
				</a>
			</div>
		</div>
	</section>
	<section id="menu">
		<div class="container flex-between-center menu-repone">
			<button class="btn-mmenu hamburger hamburger--3dx" type="button">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
			<div id="menu_mobi">
				<div class="cart_mb"><a href="gio-hang.html" class="link_cart" title="Giỏ hàng"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Giỏ hàng (<span class="qty_cart"></span>)</a></div>
			</div>

			<ul class="menu-grid">
				<li><a href="shop" title="">Trang chủ</a></li>
				<li><a href="shop/gioi-thieu" title="Giới thiệu">Giới thiệu</a></li>
				<li><a href="shop/san-pham" title="Sản phẩm">Sản phẩm</a>
					<ul>
						@foreach($nhacungcap as $ncc)
						<li><a href="shop/san-pham-nha-cung-cap/{{$ncc->ma_nha_cung_cap}}">{{$ncc->ten_nha_cung_cap}}</a></li>
						@endforeach
					</ul>
				</li>
				<li><a href="shop/tin-tuc" title="">Tin tức</a></li>
				<li><a href="video.html" title="Video">Video</a></li>
				<li><a href="tuyen-dung.html" title="Tuyển dụng">Tuyển dụng</a></li>
				<li><a href="shop/lien-he" title="">Liên hệ</a></li>
			</ul>
		</div>
	</section>
