<?php if($template == 'product_detail') { ?>
	<script src="js/magiczoomplus/magiczoomplus.min.js"></script>
	<script src="js/lockfixed.min.js"></script>
	<script>
		$(document).ready(function(){
			$.lockfixed(".projects-nav",{offset: {top: 40, bottom: 750}});
		})
	</script>
<?php } ?>
<?php if($template == 'contact') { ?>
	<script src="js/validate.min.js"></script>
	<script>
		grecaptcha.ready(function () {
			grecaptcha.execute('<?=$site_key?>', { action: 'contact' }).then(function (token) {
				var recaptchaResponse = document.getElementById('recaptchaResponse');
				recaptchaResponse.value = token;
			});
		});
	</script>
<?php } ?>
<?php if($template == 'album_detail') { ?>
	<script src="js/masory/modernizr.custom.js"></script>
	<script src="js/masory/masonry.pkgd.min.js"></script>
	<script src="js/masory/imagesloaded.js"></script>
	<script src="js/masory/classie.js"></script>
	<script src="js/masory/AnimOnScroll.js"></script>
	<script src='js/photobox/photobox.min.js'></script>
<?php } ?>
<div id="fb-root"></div>
<script>
	var fired = false;
	window.addEventListener("scroll", function(){
		if ((document.documentElement.scrollTop != 0 && fired === false) || (document.body.scrollTop != 0 && fired === false)) {
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			$(".map").html('<?=$row_setting['bando']?>');
			fired = true;
		}
	}, true);
</script>
<script src="js/OwlCarousel/owl.carousel.min.js"></script>
<script src="js/simplyscroll.min.js"></script>
<script src="js/fancybox.min.js"></script>
<script src="js/slick.min.js"></script>
<script>
	$(document).ready(function(){
		$("#scroller").simplyScroll({orientation:'vertical',customClass:'vert',auto:true});
		$('img').each(function(index, element) {
			if(!$(this).attr('alt') || $(this).attr('alt')=='') {
				$(this).attr('alt','<?=$row_setting['title']?>');
			}
		});
		$(window).scroll(function(){
			if($(this).scrollTop()!=0){
				$("#noop-top").addClass('actived');
			}else{
				$("#noop-top").removeClass('actived');
			}
		});
		$("#noop-top").click(function(){
			$("body,html").animate({scrollTop:0},1000);
			return false;
		})
		$(window).scroll(function(){
			var cach_top = $(window).scrollTop();
			var h_header = $('.header').height();
			var h_menu = $('.menu').height();
			var total_height = h_header + h_menu + 40;
			if(cach_top > total_height){
				$('.menu').addClass('menu-fixed');
			} else {
				$('.menu').removeClass('menu-fixed');
			}
		});
		$('.product-nav li').click(function(){
			$('.product-nav li').removeClass('active');
			$(this).addClass('active');
		})
		$('.custom-owl-prev').click(function(){
			var owl = $(this).attr('data-owl');
			$('.'+owl).trigger('prev.owl.carousel');
		})
		$('.custom-owl-prev').click(function(){
			var owl = $(this).attr('data-owl');
			$('.'+owl).trigger('prev.owl.carousel');
		})
		$('.custom-owl-next').click(function(){
			var owl = $(this).attr('data-owl');
			$('.'+owl).trigger('next.owl.carousel');
		})
		$('.owl-dot').click(function () {
			var owl = $(this).attr('data-owl');
			$('.'+owl).trigger('to.owl.carousel', [$(this).index(), 300]);
		});
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
		$(".video-owl").owlCarousel({
			dots: false,
			autoplay: true,
			rewind: true,
			autoplaySpeed: 1500,
			items: 1
		});
		$(".thanhtuu-owl").owlCarousel({
			dots: false,
			autoplay: true,
			rewind: true,
			autoplaySpeed: 1500,
			responsive:{
					320:{ items: 2 },
					500:{ items: 3 },
					1024:{ items: 5 }
				}

		});
		$(".tieuchi-owl").owlCarousel({
			dots: false,
			autoplay: false,
			rewind: true,
			autoplaySpeed: 1500,
			responsive:{
					320:{ items: 1 },
					500:{ items: 3 },
					1024:{ items: 5 }
				}

		});
		$(".products-owl").owlCarousel({
			dots: false,
			autoplay: true,
			rewind: true,
			autoplaySpeed: 1500,
			margin: 35,
			items: 4

		});
		$(".congtrinh-owl").owlCarousel({
			dots: false,
			autoplay: true,
			rewind: true,
			autoplaySpeed: 1500,
			margin: 45,
			responsive:{
					320:{ items: 1 },
					600:{ items: 2 },
					900:{ items: 3 }
				}

		});
		$(".news-owl").owlCarousel({
			dots: false,
			autoplay: true,
			rewind: true,
			autoplaySpeed: 1500,
			responsive:{
					320:{ items: 1 },
					900:{ items: 2 },
				}
		});
		<?php if($template == 'product_detail') { ?>
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
			$(".owl-related-products").owlCarousel({
				dots: false,
				autoplay: true,
				autoplaySpeed: 1500,
				margin: 20,
				responsive:{
					320:{ items: 2,margin: 5, },
					1025:{ items: 4 }
				}
			});
		<?php } ?>
		$('#frmSearch').submit(function(){
			var keywords = $("input[name='keywords']").val();
			if(!keywords){
				swal('Bạn chưa nhập từ khóa');
				$("input[name='keywords']").focus();
			} else { 
				window.location.href="tim-kiem&keywords="+keywords;
			}
			return false;
		});

		<?php if($template == 'album_detail') { ?>
			!(function(){
				$('#grid').photobox('a', { thumbs:true, loop:false });
			})();
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.3,
				maxDuration : 0.7,
				viewportFactor : 0.2,
			});
		<?php } ?>
		<?php if($template == 'contact') { ?>
			$('#frmContact').validate({
				rules: {
					ten: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					dienthoai: {
						required: true,
						number: true,
						digits: true,
						maxlength: 15
					},
					noidung: {
						required: true
					}
				},
				messages: {
					ten: {
						required: "<?=_vuilongnhapten?>"
					},
					email: {
						required: "<?=_vuilongnhapemail?>",
						email: "<?=_emailsaidinhdang?>"
					},
					dienthoai: {
						required: "<?=_vuilongnhapsdt?>",
						number: "<?=_sdtphailakieuso?>",
						digits: "<?=_khongduocnhapsoam?>",
						maxlength: "<?=_chiduocnhap15kitu?>"
					},
					noidung: {
						required: "<?=_vuilongnhapnoidung?>"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		<?php } ?>
	});
function loadProduct(page,idl){
	$.ajax ({
		type: "POST",
		url: "ajax/loadProduct.php",
		data: {page:page,idl:idl},
		success: function(msg){
			$('#product-content-'+idl).html(msg);
			$('#product-content-'+idl+' .pagination_ajax li.active').click(function(){
				var pagecr = $(this).attr("p");
				$("#ajax_load").ready(function(){
					$("html, body").animate({
						scrollTop: $('#ajax_load').offset().top 
					}, -10);
				});
				loadProduct(pagecr,idl);
			});
		}
	});
}
function loadProductCat(idl,idc){
	$.ajax ({
		type: "POST",
		url: "ajax/loadProductCat.php",
		data: {idl:idl,idc:idc},
		success: function(msg){
			$('#product-content-'+idl).html(msg);
			$(".products-owl").owlCarousel({
				dots: false,
				autoplay: true,
				rewind: true,
				autoplaySpeed: 1500,
				margin: 35,
				items: 4
			});
		}
	});
}
function loadNews(page){
	$.ajax ({
		type: "POST",
		url: "ajax/loadNews.php",
		data: {page:page},
		success: function(msg){
			$('#news-content-').html(msg);
			$('#news-content-'+' .pagination_ajax li.active').click(function(){
				var pagecr = $(this).attr("p");
				loadNews(pagecr);
			});
		}
	});
}
function scrollToElement(el){
	$('html, body').animate({
		scrollTop: $(el).offset().top - 74
	}, 500);
}

function loadProductDetail(id){
	$('#foo').load("ajax/loadProductDetail.php",{'id':id}, function(){
		var foo = $('#foo').html(); 
		$.fancybox.open(foo);
	});
}
</script>
<script src="js/lockfixed.min.js"></script>
<script>
	$(document).ready(function(){
		var menu = $('.menu').innerHeight();
		var dichvu = $('.dichvu').innerHeight();
		var dknt = $('.DKNT').innerHeight();
		var news = $('.bottom').innerHeight();
		var footer = $('.footer').innerHeight();
		var copyright = $('.copyright').innerHeight();
		var t_height = dichvu + dknt + news + footer + copyright + 740;
		$.lockfixed(".menu2",{offset: {top: menu + 10, bottom: t_height}});
	})
</script>

<script src="js/mmenu.all.js"></script>
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
<script src="js/fotorama.js"></script> <!-- 16 KB -->