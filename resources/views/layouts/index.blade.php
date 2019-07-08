@extends('layouts.master')
@section('content')
<section id="slider">
	<div class="slider-owl owl-carousel owl-theme">
		@foreach($slide as $sl)
		<div class="img_slide">
			<a href="" title="">
				<img class="" src="upload/slide/{{$sl->hinh_anh}}" alt="">
			</a>
		</div>
		@endforeach
	</div>
</section>
<section id="product_home">
	<div class="container">
		<label class="title-sp">Sản phẩm hot</label>
		<div class="list_product">
			<div class="sp-owl owl-carousel owl-theme">
				@foreach($product_shop as $sp)
				<div class="sanpham sanpham2">
					<div class="img">
						<a href="shop/san-pham/{{$sp->ma_san_pham}}" title="{{$sp->ten_san_pham}}">
							<img class="" src="upload/sanpham/{{$sp->hinh_anh}}" alt="{{$sp->ten_san_pham}}">
						</a>
						<!-- <div class="sale_off">-10%</div> -->
					</div>
					<div class="pro_info">
						<a style="font-size: 15px;color: blue;font-weight: bold;" class="name" href="san-pham/{{$sp->ma_san_pham}}" title="{{$sp->ten_san_pham}}">{{$sp->ten_san_pham}}</a>
						<div class="wrap_price">
							<div class="price">Giá: <span>{{number_format($sp->gia_ban)}} Đ</span></div>
						</div>
						@if($sp->so_luong > 0)
						<a class="add_cart_index" href="shop/add_to_cart/{{$sp->ma_san_pham}}">Mua ngay</a>
						@else
						<p class="name" style="font-size: 18px;color: red;font-weight: bold;margin-top: 15px;">Sản phẩm đã hết hàng.</p>
						@endif
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
<section id="about_home">
	<div class="container">
		<div class="flex-between about_home_repon">
			<div class="info_about">
				<div class="name">{{$about->title}}</div>
				<div class="line"></div>
				<div class="des">
					{{$about->mo_ta}}
				</div>
				<div class="more"><a href="shop/gioi-thieu">XEM THÊM</a></div>
			</div>
			<div class="img_about">
				<a href="gioi-thieu.html"><img src="{{asset('themes/images/about.jpg')}}" alt=""></a>
			</div>
		</div>
	</div>
</section>
<section id="main_home">
	<div class="wrap_pro_home">
		<div class="container">
			<label class="title-sp">Điện thoại nổi bật</label>
			<div class="main_pro_home">
				<div class="small_product">
					@foreach($product_shop as $sp)
					<div class="sanpham">
						<div class="img">
							<a href="shop/san-pham/{{$sp->ma_san_pham}}" title="{{$sp->ten_san_pham}}"><img class="img-responsive lazy" src="upload/sanpham/{{$sp->hinh_anh}}" alt="{{$sp->ten_san_pham}}"></a>
							<!-- <div class="sale_off">-10%</div> -->
						</div>
						<div class="pro_info">
							<div class=""></div>
							<div class="name"><h3><a href="san-pham/{{$sp->ma_san_pham}}">{{$sp->ten_san_pham}}</a></h3></div>
							<div class="wrap_price">
								<div class="price">Giá: <span>{{number_format($sp->gia_ban)}} Đ</span></div>
								<!-- <div class="price_old">{{number_format($sp->gia_ban)}} Đ</div> -->
								<div class="clearfix"></div>
							</div>
							@if($sp->so_luong > 0)
							<a class="add_cart_index" href="shop/add_to_cart/{{$sp->ma_san_pham}}">Mua ngay</a>
							@else
							<p class="name" style="font-size: 18px;color: red;font-weight: bold;margin-top: 15px;">Sản phẩm đã hết hàng.</p>
							@endif
						</div>
					</div>
					@endforeach
				</div>
				{{ $product_shop->links() }}
			</div>
		</div>
	</div>
</section>
<section id="news-wrapper">
	<div class="container news-repone flex-between">
		<div class="news_wrap">
			<div class="title"><h3>Tin tức mới</h3></div>
			<ul id="scroller">
				@foreach($tintuc_shop as $tt)
				<li>
					<div class="main_news flex-between">
						<div class="img_news">
							<a class="w-img effect-zoom" href="shop/tin-tuc/{{$tt->ten_khong_dau}}" title="">
								<img src="upload/tintuc/{{$tt->hinh_anh}}" alt="">
							</a>
						</div>
						<div class="news_list_info">
							<div class="news_list_name"><a href="shop/tin-tuc/{{$tt->ten_khong_dau}}">{{$tt->title}}</a></div>
							<div class="news_list_mota">{{ str_limit($tt->mo_ta, $limit = 150, $end = '...') }}</div>
						</div>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
		<div class="video_wrap">
			<div class="title"><h3>Video Clips</h3></div>
			<div class="text_other_1"></div>
			<div class="content">
				<div class="fotorama" data-nav="thumbs" data-allowfullscreen="true" data-width="100%" data-thumbheight="100" data-thumbwidth="120">
					@foreach($video as $vi)
					<a href="{{$vi->link}}"></a>
					@endforeach
				</div>
			</div><!-- end content -->
		</div>
	</div>
</section>
<section id="doitac">
	<div class="container">
		<label class="title-sp">đối tác</label>
		<div class="doitac-owl owl-carousel owl-theme">
			@foreach($nhacungcap as $ncc)
			<div class="item_dt">
				<a href="shop/san-pham-nha-cung-cap/{{$ncc->ma_nha_cung_cap}}"><img src="../upload/nhacungcap/{{$ncc->logo}}"></a>
			</div>
			@endforeach
		</div>
		<div class="clear"></div>
	</div>
</section>
<!-- <section id="dknt">
	<div class="container">
		<div class="frm_dknt">
			<div class="txt1">đăng ký nhận tin</div>
			<div class="txt2">Nhập thông tin vào ô bên dưới để nhận thông báo mới nhất từ chúng tôi</div>
			<form name="nhanemail" id="nhanemail" method="post" action="index.php">
				<input class="dknt_email" name="emailkhachhang" id="emailkhachhang" type="email" placeholder="Nhập email của bạn ..." required="required" />
				<input class="dangky" type="submit" name="sub_dknt" value="ĐĂNG KÝ"/>
			</form>
		</div>
	</div>
</section> -->
@if(session('thongbaodathang'))
<script>
	alert('Quý khách đã đặt hàng thành công. Xin cảm ơn.');
</script>
@endif

@endsection
