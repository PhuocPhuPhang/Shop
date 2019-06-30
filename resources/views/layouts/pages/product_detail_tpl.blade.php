@extends('layouts.master')
@section('content')
	<div class="container">
	<div class="pd-detail">
		<div class="flex-between">
			<div class="frame_images">
				<div class="product_zoom" >
					<a href="upload/sanpham/{{$product_detail->hinh_anh}}" id="Zoom-1" class="MagicZoom" title=""><img src="upload/sanpham/{{$product_detail->hinh_anh}}" alt="" width="250" /></a>
				</div>
				<div class="owl-product-photos owl-carousel owl-theme">
					<a class="w-img product_zoom_item"  href="">
						<img src="{{asset('themes/images/sp.jpg')}}"/>
					</a>
					<a class="w-img product_zoom_item"  href="">
						<img src="{{asset('themes/images/sp.jpg')}}"/>
					</a>
					<a class="w-img product_zoom_item"  href="">
						<img src="{{asset('themes/images/sp.jpg')}}"/>
					</a>
					<a class="w-img product_zoom_item"  href="">
						<img src="{{asset('themes/images/sp.jpg')}}"/>
					</a>
					<a class="w-img product_zoom_item"  href="">
						<img src="{{asset('themes/images/sp.jpg')}}"/>
					</a>
				</div>
			</div>
			<ul class="khung_thongtin">
				<li><h1>{{$product_detail->ten_san_pham}}</h1></li>
				<li><label>Mã sản phẩm:</label> 123</li>
				<li>{{$product_detail->mo_ta}}</li>
				<li class="gia_detail">
					<label>Giá:</label> 
					<span>{{number_format($product_detail->gia_ban)}}Đ</span> 
				</li>
				<li class="gia_cu">
					<div class="l_old_price"><label>Giá thị trường:</label>  <span>28,0000,000 VNĐ</span></div>
					<div class="r_old_price"><label>Tiết kiệm:</label> <span>10%</span></div>
					<div class="clearfix"></div>
				</li>
				<div class="action_buy">
							<!-- <div class="flex-between-center">
								<label>Số lượng:</label>
								<div class="cart-items__quantity">
									<span class="amount amount-minus" data-action="minus"></span>
									<input type="text" name="number" id="amount" value="1">
									<span class="amount amount-plus" data-action="plus"></span>
								</div>
							</div> -->
							<div class="add_to_cart btn_ac1 btn_muangay" onclick="">
								<p class="name"><a href="shop/add_to_cart/{{$product_detail->ma_san_pham}}">Mua ngay</a></p>
							</div>
						</div>
						<div class="soc_share">
							<div id="btn_like" style="float: left;margin-right: 8px;margin-top: 5px;">
								<div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
							</div>
							<div style="float:left; margin-right: 5px; margin-top: 5px;" class="zalo-share-button" data-href="" data-oaid="1965225949460761031" data-layout="1" data-color="blue" data-customize=false></div>
							<div id="share_social"></div>
						</div>

						<!-- <div class="view_pro">Hiện người đang xem sản phẩm này.</div> -->
					</ul>
					<div class="tintuclienquan">         
						<ul class="policy">
							<li>
								<img src="{{asset('themes/images/tronghop.png')}}">
								<span>Trong hộp có: </span>
							</li>
							<li>
								<img src="{{asset('themes/images/baohanh.png')}}">
								<span>Bảo hành chính hãng 12 tháng: </span>
							</li>
							<li>
								<img src="{{asset('themes/images/doitra.png')}}">
								<span>1 đổi 1 trong 1 tháng đầu nếu có lỗi. <a href="">Xem chi tiết.</a> </span>
							</li>
						</ul>
					</div>
				</div>
				<div id="container_product" class="flex-between">
					<div id="chitietsanpham">
						<div id="tintuc">{{$product_detail->noi_dung}}</div>
					</div>
					<div id="tskt">
						<label>Thông số kỹ thuật</label>
						<ul class="tskt_main">
							<li>
								<span>Màn hình:</span>
								<div>
									<a href="">LED-backlit IPS LCD</a>,5.5"
								</div>
							</li>
							<li>
								<span>Hệ điều hành:</span>
								<div>
									<a href="">LED-backlit IPS LCD</a>,5.5"
								</div>
							</li>
							<li>
								<span>Camera trước:</span>
								<div>
									<a href="">LED-backlit IPS LCD</a>,5.5"
								</div>
							</li>
							<li>
								<span>Camera sau:</span>
								<div>
									<a href="">LED-backlit IPS LCD</a>,5.5"
								</div>
							</li>
							<li>
								<span>CPU:</span>
								<div>
									<a href="">LED-backlit IPS LCD</a>,5.5"
								</div>
							</li>
							<li>
								<span>Bộ nhớ trong:</span>
								<div>
									<a href="">LED-backlit IPS LCD</a>,5.5"
								</div>
							</li>
							<li>
								<span>Sim:</span>
								<div>
									<a href="">LED-backlit IPS LCD</a>,5.5"
								</div>
							</li>
							<li>
								<span>Dung lượng pin:</span>
								<div>
									<a href="">LED-backlit IPS LCD</a>,5.5"
								</div>
							</li>
						</ul>
						<div class="news_product_wrap">
							<div class="title"><h3>Tin tức mới</h3></div>
							<ul id="scroller2">
								@foreach($tintuc_tukhoa as $tt)
								<li>
									<div class="main_news flex-between">
										<div class="img_news">
											<a class="w-img effect-zoom" href="shop/tin-tuc/{{$tt->ten_khong_dau}}" title="">
												<img src="upload/tintuc/{{$tt->hinh_anh}}" alt="">
											</a>
										</div>
										<div class="news_list_info" style="margin-left: 10px;">
											<div class="news_list_name"><a href="shop/tin-tuc/{{$tt->ten_khong_dau}}">{{$tt->title}}</a></div>
											<div style="margin-top: 10px;" class="news_list_date">{{$tt->updated_at}}</div>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="wrap_name_detail">
					<label class="title-sp">Sản phẩm tương tự</label>
				</div>
				<div class="list_product  container">
					<div class="sp_detail-owl owl-carousel owl-theme">
						@foreach($product_related as $pr)
						<div class="sanpham sanpham2">
							<div class="img">
								<a href="shop/san-pham/{{$pr->ma_san_pham}}" title="{{$pr->ten_san_pham}}">
									<img class="img-responsive lazy" src="upload/sanpham/{{$pr->hinh_anh}}" alt="">
								</a>
								<div class="sale_off">-10%</div>
							</div>
							<div class="pro_info">
								<div class=""></div>
								<div class="name"><h3><a href="shop/san-pham/{{$pr->ma_san_pham}}" title="{{$pr->ten_san_pham}}">{{$pr->ten_san_pham}}</a></h3></div>
								<div class="wrap_price flex-between-center">
									<div class="price">Giá: <span>{{number_format($pr->gia_ban)}}Đ</span></div>
									<div class="price_old">10,000,000 Đ</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="binhluan">
				<label>Bình luận sản phẩm</label>
			</div>
			<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
			<div class="fb-comments" data-href="http://127.0.0.1:8000/shop/san-pham/SP02" data-width="100%" data-numposts="5"></div>		
		</div>
@endsection