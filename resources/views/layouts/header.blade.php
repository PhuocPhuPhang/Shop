<nav id="mmenu" class="invi_load">
	<ul>
		<li><a href="index.html" title="">Trang chủ</a></li>
		<li><a href="gioi-thieu.html" title="Giới thiệu">Giới thiệu</a></li>
		<li><a href="san-pham.html" title="">Sản phẩm</a>
			<ul>
				@foreach($nhacungcap as $ncc)
				    <li><a href="">{{$ncc->ten_nha_cung_cap}}</a></li>
				@endforeach
			</ul>
		</li>
		<li><a href="tin-tuc.html" title="">Tin tức</a></li>
		<li><a href="video.html" title="Video">Video</a></li>
		<li><a href="tuyen-dung.html" title="Tuyển dụng">Tuyển dụng</a></li>
		<li><a href="lien-he.html" title="">Liên hệ</a></li>
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
							<form id="frmSignUp" action="index.html" method="post" class="sign_up_block">
								<div class="login-row"><label>Họ tên</label> <input type="text" name="hoten" placeholder="Họ tên" required></div>
								<div class="login-row"><label>Số diện thoại</label> <input type="text" name="hoten" placeholder="Số điện thoại" required></div>
								<div class="login-row"><label>Email</label> <input type="email" name="hoten" placeholder="Email của bạn" required></div>
								<div class="login-row"><label>Mật khẩu</label> <input type="password" name="hoten" placeholder="Nhập mật khẩu" required></div>
								<div class="login-row"><label>Nhập lại mật khẩu</label> <input type="password" name="hoten" placeholder="Nhập lại mật khẩu" required></div>
								<div class="login-row"><label>Giới tính</label>
									<input type="radio" name="gioitinh" value="Nam"><label class="text_radio">Nam</label>
									<input type="radio" name="gioitinh" value="Nữ"><label class="text_radio">Nữ</label>
								</div>
								<div class="login-row"><label>Ngày sinh</label>
									<!-- <div class="input-group date " id="datetimepicker4" data-target-input="nearest">
										<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4"/>
										<div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
									</div> -->
									<input type="date" name="ngaysinh">
								</div>
								<div class="login-row"><input type="checkbox" name="hoten"><span class="check_thongbao">Nhận các thông báo và tin khuyến mãi từ chúng tôi.</span> </div>
								<div class="login-row"><input type="submit" name="" value="Tạo tài khoản"></div>
							</form>
							<form id="frmLogin" action="index.html" method="post" class="login_block">
								<div class="login-row"><label>Email</label> <input type="email" name="hoten" placeholder="Email của bạn" required></div>
								<div class="login-row"><label>Mật khẩu</label> <input type="password" name="hoten" placeholder="Nhập mật khẩu" required></div>
								<div class="login-row"><span class="quenMK">Quên mật khẩu? Nhấn vào <a href="">đây</a></span> </div>
								<div class="login-row"><input type="submit" name="" value="Login"></div>
								<div class="login-row"><a class="login_FB" href="{{ url('/auth/facebook')}}">Đăng nhập bằng FaceBook</a></div>
								<div class="login-row"><a class="login_GG" href="{{ url('/auth/google')}}">Đăng nhập bằng Google</a></div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="right_top_login flex-between-center">
				<label class="login">Đăng nhập</label>
				<div class="line_login"></div>
				<label class="sign_up">Tạo tài khoản</label>
			</div>
			<div class="right_top_mxh flex-between-center">
				<a href="#" target="_blank"><img src="{{asset('themes/images/you.png')}}" alt="social"></a>
				<a href="#" target="_blank"><img src="{{asset('themes/images/tw.png')}}" alt="social"></a>
				<a href="#" target="_blank"><img src="{{asset('themes/images/in.png')}}" alt="social"></a>
				<a href="#" target="_blank"><img src="{{asset('themes/images/gg.png')}}" alt="social"></a>
				<a href="#" target="_blank"><img src="{{asset('themes/images/fb.png')}}" alt="social"></a>
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
			<div class="timkiem flex-between-center">
				<select id="sel_list">
					<option value="">Tất cả</option>
					<option value="">Apple</option>
					<option value="">Samsung</option>
					<option value="">Oppo</option>
					<option value="">Hawue</option>
				</select>
				<input class="tu_khoa" name="timkiem" id="name_tk" type="text" placeholder="Tìm sản phẩm của bạn..." onkeypress="return doEnter(event)">

				<input type="button" onclick="return do_search();" value="TÌM KIẾM">
				<div class="auto_search"></div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="r_head flex-between-center">
			<div class="email_pc">
				<p class="r1">EMAIL</p>
				<p class="r2">caothang@gmail.com</p>
			</div>
			<div class="hl_pc">
				<p class="r1">HOTLINE</p>
				<p class="r2">0329973272</p>
			</div>
			<a href="gio-hang.html" class="link_cart" title="Giỏ hàng">
				<div class="cart_pc flex-between-center">
					<span class="qty_cart">0</span>
					<div class="txt">
						<p class="r1">Giỏ hàng</p>
						<p class="r2">Xem ngay</p>
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
			<li><a href="index.html" title="">Trang chủ</a></li>
			<li><a href="gioi-thieu.html" title="Giới thiệu">Giới thiệu</a></li>
			<li><a href="product_tpl" title="">Sản phẩm</a>
				<ul>
					@foreach($nhacungcap as $ncc)
					<li><a href="">{{$ncc->ten_nha_cung_cap}}</a></li>
					@endforeach
				</ul>
			</li>
			<li><a href="tin-tuc.html" title="">Tin tức</a></li>
			<li><a href="video.html" title="Video">Video</a></li>
			<li><a href="tuyen-dung.html" title="Tuyển dụng">Tuyển dụng</a></li>
			<li><a href="lien-he.html" title="">Liên hệ</a></li>
		</ul>
	</div>
</section>
