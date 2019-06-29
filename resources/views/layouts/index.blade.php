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
		<label class="title-sp-nb"><img src="{{asset('themes/images/gsct.png')}}"></label>
		<div class="list_product">
			<div class="sp-owl owl-carousel owl-theme">
				@foreach($product_shop as $sp)
				<div class="sanpham sanpham2">
					<div class="img">
						<a href="shop/san-pham/{{$sp->ma_san_pham}}" title="{{$sp->ten_san_pham}}">
							<img class="" src="upload/sanpham/{{$sp->hinh_anh}}" alt="{{$sp->ten_san_pham}}">
						</a>
						<div class="sale_off">-10%</div>
					</div>
					<div class="pro_info">
						<a class="name" href="san-pham/{{$sp->ma_san_pham}}" title="{{$sp->ten_san_pham}}">{{$sp->ten_san_pham}}</a>
						<div class="wrap_price">
							<div class="price">Giá: <span>{{number_format($sp->gia_ban)}} Đ</span></div>
							<div class="price_old">10,000,000 Đ</div>
						</div>
						<a class="add_cart_index" href="shop/add_to_cart/{{$sp->ma_san_pham}}">Mua ngay</a>
						<div class="pro_info-info">
							<span>Tặng kèm ....</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
<section id="home">
	<div class="home_grid">
		<div class="col-home col-home-1 ">
			<a href="" class="flex-between-center">
				<img class="lazy" src="{{asset('themes/images/home1.jpg')}}" alt="" />
				<div class="info">
					<div class="name">Home 1</div>
					<div class="des">Lời đầu tiên chúng tôi xin gửi đến Quý khách hàng những lời chúc tốt đẹp nhất! Với phương châm chất lượng đặt lên hàng đầu chúng tôi sẽ là sự lưạ chọn tốt cho quý khách hàng. Đến với chúng tôi quý khách sẽ thấy được sự Thuận tiện, Nhanh chóng, thái độ phục vụ Nhiệt tình, </div>
					<div class="detail">XEM CHI TIẾT</div>
				</div>
			</a>
		</div>
		<div class="col-home col-home-2">
			<a href="" class="flex-between-center">
				<img class="lazy" src="{{asset('themes/images/home2.jpg')}}" alt="" />
				<div class="info">
					<div class="name">Home 2</div>
					<div class="des">Lời đầu tiên chúng tôi xin gửi đến Quý khách hàng những lời chúc tốt đẹp nhất! Với phương châm chất lượng đặt lên hàng đầu chúng tôi sẽ là sự lưạ chọn tốt cho quý khách hàng. Đến với chúng tôi quý khách sẽ thấy được sự Thuận tiện, Nhanh chóng, thái độ phục vụ Nhiệt tình, </div>
					<div class="detail">XEM CHI TIẾT</div>
				</div>
			</a>
		</div>
		<div class="col-home col-home-3">
			<a href="" class="flex-between-center">
				<img class="lazy" src="{{asset('themes/images/home3.jpg')}}" alt="" />
				<div class="info">
					<div class="name">Home 3</div>
					<div class="des">Lời đầu tiên chúng tôi xin gửi đến Quý khách hàng những lời chúc tốt đẹp nhất! Với phương châm chất lượng đặt lên hàng đầu chúng tôi sẽ là sự lưạ chọn tốt cho quý khách hàng. Đến với chúng tôi quý khách sẽ thấy được sự Thuận tiện, Nhanh chóng, thái độ phục vụ Nhiệt tình, </div>
					<div class="detail">XEM CHI TIẾT</div>
				</div>
			</a>
		</div>
		<div class="col-home col-home-4">
			<a href="" class="flex-between-center">
				<img class="lazy" src="{{asset('themes/images/home4.jpg')}}" alt="" />
				<div class="info">
					<div class="name">Home 4</div>
					<div class="des">Lời đầu tiên chúng tôi xin gửi đến Quý khách hàng những lời chúc tốt đẹp nhất! Với phương châm chất lượng đặt lên hàng đầu chúng tôi sẽ là sự lưạ chọn tốt cho quý khách hàng. Đến với chúng tôi quý khách sẽ thấy được sự Thuận tiện, Nhanh chóng, thái độ phục vụ Nhiệt tình, </div>
					<div class="detail">XEM CHI TIẾT</div>
				</div>
			</a>
		</div>
	</div>
</section>
<section id="main_home">
	<div class="wrap_pro_home">
		<div class="container">
			<label class="title-sp">Apple</label>
			<div class="cat_nb ">
				<a href="">iPhone 7</a>
				<a href="">iPhone 8</a>
				<a href="">iPhone X</a>
			</div>
			<div class="main_pro_home">
				<div class="small_product">
					@foreach($product_shop as $sp)
					<div class="sanpham">
						<div class="img">
							<a href="shop/san-pham/{{$sp->ma_san_pham}}" title="{{$sp->ten_san_pham}}"><img class="img-responsive lazy" src="upload/sanpham/{{$sp->hinh_anh}}" alt="{{$sp->ten_san_pham}}"></a>
							<div class="sale_off">-10%</div>
						</div>
						<div class="pro_info">
							<div class=""></div>
							<div class="name"><h3><a href="san-pham/{{$sp->ma_san_pham}}">{{$sp->ten_san_pham}}</a></h3></div>
							<div class="wrap_price">
								<div class="price">Giá: <span>{{number_format($sp->gia_ban)}} Đ</span></div>
								<div class="price_old">{{$sp->gia_ban}} Đ</div>
								<div class="clearfix"></div>
							</div>
							<a class="add_cart_index" href="shop/add_to_cart/{{$sp->ma_san_pham}}">Mua ngay</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<section id="news-wrapper">
	<div class="container news-repone flex-between">
		<div class="news_wrap">
			<div class="title"><h3>Tin tức - sự kiện</h3></div>
			<div class="text_other_1"></div>
			<div class="content news flex-between">
				<div class="big-news">
					<div class="news-thumbnail">
						<a href="" title=""><img src="{{asset('themes/images/news_2.jpg')}}" class="img-responsive lazy" alt="" /></a>
					</div>
					<div class="">
						<a class="news_list_name" href="" title="">Cách chọn mua máy chiếu cho trung tâm giáo dục</a>
						<div class="news_list_mota">
							Hướng dẫn mua máy chiếu, màn chiếu cho lớp học, trung tâm giáo dục phù hợp
							<div class="clear"></div>
						</div>
					</div>
					<div class="view-more">
						<a href="" title="">Xem thêm</a>
					</div>
					<div class="clear"></div>
				</div><!-- end big-news-->
				<div class="list-news-small">
					<div class="owl-news">
						@foreach($tintuc as $tt)
						<div class="small-item flex-between-center">
							<div class="img_news">
								<a href="shop/tin-tuc/{{$tt->ten_khong_dau}}" title=""><img src="upload/tintuc/{{$tt->hinh_anh}}" alt="" class="img-responsive lazy"/></a>
							</div>
							<div class="news_list_info">
								<a class="news_list_name" href="shop/tin-tuc/{{$tt->ten_khong_dau}}" title="">{{$tt->title}}</a>
								<div class="news_list_mota">{{ str_limit($tt->mo_ta, $limit = 80, $end = '...') }}</div>
							</div>
						</div>
						@endforeach

					</div>
				</div><!-- end content-news-->
			</div>
		</div>
		<!-- <div class="news_wrap">
			<label class="title_news_album">Tin tức mới</label>
			<ul id="scroller">
				@foreach($tintuc as $tt)
					<li>
						<div class="main_news flex-between">
							<div class="pic_TT">
								<a class="w-img effect-zoom" href="" title="">
									<img src="upload/tintuc/{{$tt->hinh_anh}}" alt="">
								</a>
							</div>
							<div class="news_list_info">
								<div class="news_list_name"><a href="">{{$tt->ten}}</a></div>
								<div class="news_list_mota">{{$tt->mota}}</div>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div> -->
		<div class="video_wrap">

			<div class="title"><h3>Video Clips</h3></div>
			<div class="text_other_1"></div>
			<div class="content">
				<div class="fotorama" data-nav="thumbs" data-allowfullscreen="true" data-width="100%" data-thumbheight="100" data-thumbwidth="120">
					<a href="http://youtube.com/watch?v=3fi7uwBU-CE">
						<img class="lazy" src="https://img.youtube.com/vi/3fi7uwBU-CE/0.jpg" alt="">
					</a>
					<a href="http://youtube.com/watch?v=3fi7uwBU-CE">
						<img class="lazy" src="https://img.youtube.com/vi/3fi7uwBU-CE/0.jpg" alt="">
					</a>
					<a href="http://youtube.com/watch?v=3fi7uwBU-CE">
						<img class="lazy" src="https://img.youtube.com/vi/3fi7uwBU-CE/0.jpg" alt="">
					</a>
					<a href="http://youtube.com/watch?v=3fi7uwBU-CE">
						<img class="lazy" src="https://img.youtube.com/vi/3fi7uwBU-CE/0.jpg" alt="">
					</a>
				</div>
			</div><!-- end content -->
		</div>
	</div>
</section>
<section id="doitac">
	<div class="container">
		<label class="title-sp">đối tác</label>
		<div class="doitac-owl owl-carousel owl-theme">
			<div class="item_dt">
				<a href="" target="_blank"><img src="{{asset('themes/images/dt.jpg')}}" alt="" class="img_dt img-responsive" /></a>
			</div>
			<div class="item_dt">
				<a href="" target="_blank"><img src="{{asset('themes/images/dt.jpg')}}" alt="" class="img_dt img-responsive" /></a>
			</div>
			<div class="item_dt">
				<a href="" target="_blank"><img src="{{asset('themes/images/dt.jpg')}}" alt="" class="img_dt img-responsive" /></a>
			</div>
			<div class="item_dt">
				<a href="" target="_blank"><img src="{{asset('themes/images/dt.jpg')}}" alt="" class="img_dt img-responsive" /></a>
			</div>
			<div class="item_dt">
				<a href="" target="_blank"><img src="{{asset('themes/images/dt.jpg')}}" alt="" class="img_dt img-responsive" /></a>
			</div>
			<div class="item_dt">
				<a href="" target="_blank"><img src="{{asset('themes/images/dt.jpg')}}" alt="" class="img_dt img-responsive" /></a>
			</div>
			<div class="item_dt">
				<a href="" target="_blank"><img src="{{asset('themes/images/dt.jpg')}}" alt="" class="img_dt img-responsive" /></a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</section>
<section id="dknt">
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
</section>
<section id="about_home">
	<div class="container">
		<div class="flex-between about_home_repon">
			<div class="info_about">
				<div class="name">Giới thiệu</div>
				<div class="line"></div>
				<div class="des">
					Lời đầu tiên chúng tôi xin gửi đến Quý khách hàng những lời chúc tốt đẹp nhất! Với phương châm chất lượng đặt lên hàng đầu chúng tôi sẽ là sự lưạ chọn tốt cho quý khách hàng. Đến với chúng tôi quý khách sẽ thấy được sự Thuận tiện, Nhanh chóng, thái độ phục vụ Nhiệt tình, Lịch sự và trên hết là Chất lượng và Giá thành hợp lý. Ngoài ra, khi đến với chúng tôi quý khách hàng còn có thể tiết kiệm được thời gian và tránh được những rủi ro hay sự cố không đáng có.
				</div>
				<div class="more"><a href="gioi-thieu.html">XEM THÊM</a></div>
			</div>
			<div class="img_about">
				<a href="gioi-thieu.html"><img src="{{asset('themes/images/about.jpg')}}" alt=""></a>
			</div>
		</div>
	</div>
</section>
@endsection
