<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<link href="{{asset('themes/style.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('themes/js/OwlCarousel/owl.carousel.min.css')}}" rel="stylesheet">
	<link href="{{asset('themes/js/OwlCarousel/owl.theme.default.min.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/fotorama.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/media.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/mmenu.all.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/hamburgers.min.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
	<title></title>
</head>
<body>
	<nav id="mmenu" class="invi_load">
		<ul>
			<li><a href="index.html" title="">Trang chủ</a></li>
			<li><a href="gioi-thieu.html" title="Giới thiệu">Giới thiệu</a></li>
			<li><a href="san-pham.html" title="">Sản phẩm</a></li>
			<li><a href="ban-tra-gop.html" title="Bán trả góp">Bán trả góp</a></li>
			<li><a href="tin-tuc.html" title="">Tin tức</a></li>
			<li><a href="video.html" title="Video">Video</a></li>
			<li><a href="hinh-anh.html" title="Hình ảnh">Hình ảnh</a></li>
			<li><a href="tuyen-dung.html" title="Tuyển dụng">Tuyển dụng</a></li>
			<li><a href="" title="JKMOBILE'S CHANNEL">JKMOBILE'S CHANNEL</a></li>
			<li><a href="lien-he.html" title="">Liên hệ</a></li>

		</ul>
	</nav>
	<div id="login_wrap">
		<div class="login_content">
			<div class="login_main flex-between">
				<div class="frm_left">
					<label class="login_title">Đăng nhập</label>
					<span class="login_about">Đăng nhập để theo dõi đơn hàng, lưu danh sách sản phẩm yêu thích, nhận nhiều ưu đãi hấp dẫn.</span>
					<img src="images/img_login.png">
				</div>
				<div class="frm_right">
					<div class="login_select_wrap">
						<div class="login_select_main flex-between">
							<label>Đăng nhập</label>
							<label>Tạo tài khoản</label>
						</div>
					</div>
					<form id="frmLogin" action="index.html" method="post">
						<div class="login-row"><label>Họ tên</label> <input type="text" name="hoten" placeholder="Họ tên" required></div>
						<div class="login-row"><label>Số diện thoại</label> <input type="text" name="hoten" placeholder="Số điện thoại" required></div>
						<div class="login-row"><label>Email</label> <input type="email" name="hoten" placeholder="Email của bạn" required></div>
						<div class="login-row"><label>Mật khẩu</label> <input type="password" name="hoten" placeholder="Nhập mật khẩu" required></div>
						<div class="login-row"><label>Nhập lại mật khẩu</label> <input type="password" name="hoten" placeholder="Nhập lại mật khẩu" required></div>
						<div class="login-row"><label>Giới tính</label> <input type="text" name="hoten"></div>
						<div class="login-row"><label>Ngày sinh</label> <input type="text" name="hoten"></div>
						<div class="login-row"><input type="checkbox" name="hoten"><span class="check_thongbao">Nhận các thông báo và tin khuyến mãi từ chúng tôi.</span> </div>
						<div class="login-row"><input type="submit" name="" value="Tạo tài khoản"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div>
		<section id="top_head">
			<div class="container flex-between-center top_header-repon">
				<div class="left_top">
					<marquee>Chào mừng bạn đến với website của chúng tôi</marquee>
				</div>
				<div class="right_top flex-between-center">
					<a href="#" target="_blank"><img src="images/you.png" alt="social"></a>
					<a href="#" target="_blank"><img src="images/tw.png" alt="social"></a>
					<a href="#" target="_blank"><img src="images/in.png" alt="social"></a>
					<a href="#" target="_blank"><img src="images/gg.png" alt="social"></a>
					<a href="#" target="_blank"><img src="images/fb.png" alt="social"></a>
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
					<li><a href="san-pham.html" title="">Sản phẩm</a></li>
					<li><a href="ban-tra-gop.html" title="Bán trả góp">Bán trả góp</a></li>
					<li><a href="tin-tuc.html" title="">Tin tức</a></li>
					<li><a href="video.html" title="Video">Video</a></li>
					<li><a href="hinh-anh.html" title="Hình ảnh">Hình ảnh</a></li>
					<li><a href="tuyen-dung.html" title="Tuyển dụng">Tuyển dụng</a></li>
					<li><a href="" title="JKMOBILE'S CHANNEL">JKMOBILE'S CHANNEL</a></li>
					<li><a href="lien-he.html" title="">Liên hệ</a></li>
				</ul>
			</div>
		</section>

		@yield('NoiDung')

		<section class="footer">
			<div class="center-layout footer-content flex-between-center footer_repon">
				<div class="footer-col">
					<div class="footer-title">Đồ án tốt nghiệp</div>
					<div class="footer-row">
						<span>Trường cao đẳng kỹ thuật Cao Thắng</span>
					</div>
					<div class="footer-row">
						<span>Tel: liên hệ</span>
					</div>
					<div class="footer-row">
						<span>E-mail: liên hệ</span>
					</div>
					<div class="footer-row">
						<span>Webiste: liên hệ</span>
					</div>
				</div>
				<div class="footer-col">
					<div class="footer-title">Chính sách công ty</div>
					<a class="footer-row" href="" title="Chính sách mua hàng">Chính sách mua hàng</a>
					<a class="footer-row" href="" title="Chính sách bảo hành">Chính sách bảo hành</a>
					<a class="footer-row" href="" title="Chính sách sửa chữa">Chính sách sửa chữa</a>
				</div>
				<div class="footer-col">
					<div class="footer-fanpage">Facebook chat</div>
				</div>
			</div>
			<section class="tags container">
				<a href="">Samsung s10</a>
				<a href="">Samsung galaxy</a>
				<a href="">iphone 6 plus</a>
			</section>
			<section class="copyright">
				<div class="center-layout copy_repon flex-between-center copyright-content">
					<div class="copyright-left">Copyright &#169<i class="far fa-copyright"></i> 2019 <span>Đồ án tốt nghiệp</span> . All rights reserved. Web design: NiNa Co., Ltd</div>
					<div class="copyright-right">
						<span>Đang Online: 1</span>
						<span>Tổng truy cập: 100</span>
					</div>
				</div>
			</section>
		</section>
	</div>
</body>
<script type="text/javascript" src="{{asset('themes/js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/js/menu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/js/mmenu.all.js')}}"></script>
<script src="{{asset('themes/js/fotorama.js')}}"></script>
<script src="{{asset('themes/js/OwlCarousel/owl.carousel.min.js')}}"></script>
<script>
	$(document).ready(function(){

		$('.slider-owl').owlCarousel({
			animateOut: 'fadeOut',
			autoplayTimeout: 7000,
			animateIn: 'fadeIn',
			dots: true,
			dotsContainer: '.slider-custom-dots',
			rewind: true,
			autoplay: true,
			items:1
		});

		$(".sp-owl").owlCarousel({
			dots: false,
			autoplay: true,
			rewind: true,
			autoplaySpeed: 1500,
			margin: 20,
			responsive:{
				300:{ items: 1 },
				500:{ items: 2 },
				1200:{ items: 3 },
				1300:{ items: 4 }
			}
		});

		$(".kh-owl").owlCarousel({
			dots: false,
			autoplay: true,
			rewind: true,
			autoplaySpeed: 1500,
			margin: 85,
			items: 3
		});

		$(".doitac-owl").owlCarousel({
			dots: false,
			autoplay: true,
			rewind: true,
			autoplaySpeed: 1500,
			margin: 20,
			responsive:{
				300:{ items: 2 },
				500:{ items: 3 },
				700:{ items: 4 },
				1200:{ items: 5 },
				1300:{ items: 6 }
			}
		});
		$('input[name="phuongthuc"]').click(function(){
			$('.payment-method__body').removeClass('active');
			$(this).parent().parent().find('.payment-method__body').addClass('active');
		})

	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(function() {
			$('nav#mmenu').mmenu();
			$(".invi_load").removeClass('invi_load');
		});
	});
	var $menu = $("#mmenu").mmenu();
	var $icon = $(".btn-mmenu");
	var API = $menu.data("mmenu");
	$icon.on( "click", function() {
		API.open();
	});
	API.bind( "open:finish", function() {
		setTimeout(function() {
			$icon.addClass( "is-active" );
		}, 100);
	});
	API.bind( "close:finish", function() {
		setTimeout(function() {
			$icon.removeClass( "is-active" );
		}, 100);
	});
</script>
</html>