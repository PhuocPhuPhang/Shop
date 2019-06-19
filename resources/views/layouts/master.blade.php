<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<base href="{{asset('')}}">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
	<link href="themes/style.css" rel="stylesheet" type="text/css"/>
	<link href="{{asset('themes/js/OwlCarousel/owl.carousel.min.css')}}" rel="stylesheet">
	<link href="{{asset('themes/js/OwlCarousel/owl.theme.default.min.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/fotorama.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/media.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/mmenu.all.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/hamburgers.min.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('themes/js/magiczoomplus/magiczoomplus.css')}}">
	<link  href="{{asset('themes/css/default.min.css')}}" rel="stylesheet">
	<link  href="{{asset('themes/css/all.min.css')}}" rel="stylesheet">
	<title></title>
</head>
<body>
	@include('layouts.header')
	@yield('content')
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
<script type="text/javascript">
	$(function() {
		var editorText = $('#tintuc').text();
		$('#tintuc').html(editorText);
	})
</script>
<!-- <script type="text/javascript">
	$(document).ready(function() {
		$('body').on('click','.checkmobile', function() {
			var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
			var mobile = $('#mobile').val();
			if(mobile !==''){
				if (vnf_regex.test(mobile) == false) 
				{
					alert('Số điện thoại của bạn không đúng định dạng!');
				}else{
					alert('Số điện thoại của bạn hợp lệ!');
				}
			}else{
				alert('Bạn chưa điền số điện thoại!');
			}
		});
	});
</script> -->
<!-- <script>
function myFunction() {

var password = document.getElementById("pass").value;
var password_confirmation = document.getElementById("re_pass").value;
	if(password != password_confirmation)
    {
    	alert('Mật khẩu chưa trùng khớp');
    }
}
</script> -->
<!-- <script LANGUAGE="JavaScript">
	function checkPw(form) {
		pass = form.password.value;
		repeat_pass = form.re_password.value;

		if (pass != repeat_pass) {
			alert ("\nPlease re-enter your password.")
			return false;
		}
		else{
			alert ("\nTạo tài khoản thành công.")
		} return true;
	}
</script> -->
</html>
