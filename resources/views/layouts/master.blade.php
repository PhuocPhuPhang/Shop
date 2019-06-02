<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
	<link href="{{asset('themes/style.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('themes/js/OwlCarousel/owl.carousel.min.css')}}" rel="stylesheet">
	<link href="{{asset('themes/js/OwlCarousel/owl.theme.default.min.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/fotorama.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/media.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/mmenu.all.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/hamburgers.min.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('themes/js/magiczoomplus/magiczoomplus.css')}}">
	<link  href="{{asset('themes/css/default.min.css')}}" rel="stylesheet">
	<title></title>
</head>
<body>
	@include('layouts.header')

	@yield('content')

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
					<a href="{{ url('/dangnhap') }}" class="link_cart" title="Giỏ hàng">
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
					<div class="cart_mb"><a href="#" class="link_cart" title="Giỏ hàng"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Giỏ hàng (<span class="qty_cart"></span>)</a></div>
				</div>

	@include('layouts.footer')

</body>
<script type="text/javascript" src="{{asset('themes/js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/js/menu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/js/mmenu.all.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/js/magiczoomplus/magiczoomplus.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/js/fotorama.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/js/OwlCarousel/owl.carousel.min.js')}}"></script>

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

		$(".sp_detail-owl").owlCarousel({
			dots: false,
			autoplay: true,
			rewind: true,
			autoplaySpeed: 1500,
			margin: 10,
			items: 4
		});

		$(".owl-product-photos").owlCarousel({
			autoplay: true,
			rewind: true,
			autoplaySpeed: 1500,
			margin: 10,
			responsive:{
				320:{ items: 4 },
				768:{ items: 6 },
				1025:{ items: 5 }
			}
		});
		$('input[name="phuongthuc"]').click(function(){
			$('.payment-method__body').removeClass('active');
			$(this).parent().parent().find('.payment-method__body').addClass('active');
		})
		$('.btn_close').click(function(){
			$(this).parent().parent().parent().find('#login_wrap').removeClass('active');
		})
		$('.login').click(function(){
			$(this).parent().parent().find('#login_wrap').addClass('active');
			$(this).parent().parent().find('.title_login_main').addClass('active');
			$(this).parent().parent().find('.login_block').addClass('active');
			$(this).parent().parent().find('.title_sign_up_main').removeClass('active');
			$(this).parent().parent().find('.sign_up_block').removeClass('active');
		})
		$('.sign_up').click(function(){
			$(this).parent().parent().find('#login_wrap').addClass('active');
			$(this).parent().parent().find('.title_sign_up_main').addClass('active');
			$(this).parent().parent().find('.sign_up_block').addClass('active');
			$(this).parent().parent().find('.title_login_main').removeClass('active');
			$(this).parent().parent().find('.login_block').removeClass('active');
		})
		$('.title_login_main').click(function(){
			$(this).parent().find('.title_login_main').addClass('active');
			$(this).parent().parent().parent().parent().find('.login_block').addClass('active');
			$(this).parent().find('.title_sign_up_main').removeClass('active');
			$(this).parent().parent().parent().parent().find('.sign_up_block').removeClass('active');
		})
		$('.title_sign_up_main').click(function(){
			$(this).parent().find('.title_sign_up_main').addClass('active');
			$(this).parent().parent().parent().parent().find('.sign_up_block').addClass('active');
			$(this).parent().find('.title_login_main').removeClass('active');
			$(this).parent().parent().parent().parent().find('.login_block').removeClass('active');
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
<script type="text/javascript">
	$(function () {
		$('#datetimepicker4').datetimepicker({
			format: 'L'
		});
	});
</script>
</html>
