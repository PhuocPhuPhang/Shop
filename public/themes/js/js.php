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
