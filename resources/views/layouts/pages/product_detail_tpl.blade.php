@extends('layouts.master')
@section('content')
<div class="container">
			<div class="pd-detail">
				<div class="flex-between">
					<div class="frame_images">
						<div class="product_zoom" >
							<a href="{{asset('themes/images/sp.jpg')}}" id="Zoom-1" class="MagicZoom" title=""><img src="{{asset('themes/images/sp.jpg')}}" alt="" width="250" /></a>
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
						<li><h1>Page chi tiết sản phẩm</h1></li>
						<li><label>Mã sản phẩm:</label> 123</li>
						<li>iPhone XS Max 256GB Quốc Tế là phiên bản quốc tế mới 100% Fullbox đầy đủ phụ kiện. Máy được xách tay nguyên chiếc từ các nước Mỹ, Hàn, Nhật. Cam kết nguyên zin, 100% chính hãng từ Apple</li>
						<li class="gia_detail">
							<label>Giá:</label> 
							<span>Liên hệ</span> 
						</li>
						<li class="gia_cu">
							<div class="l_old_price"><label>Giá thị trường:</label>  <span>28,0000,000 VNĐ</span></div>
							<div class="r_old_price"><label>Tiết kiệm:</label> <span>10%</span></div>
							<div class="clearfix"></div>
						</li>
						<div class="action_buy">
							<div class="flex-between-center">
								<label>Số lượng:</label>
								<div class="cart-items__quantity">
									<span class="amount amount-minus" data-action="minus" data-id=""></span>
									<input type="text" name="number" id="amount" value="1">
									<span class="amount amount-plus" data-action="plus" data-id=""></span>
								</div>
							</div>
							<div class="add_to_cart btn_ac1 btn_muangay" onclick="">
								<p class="name"><a href="cart_tpl">Mua ngay</a></p>
							</div>
						</div>
						<div class="soc_share">
							<div id="btn_like" style="float: left;margin-right: 8px;margin-top: 5px;">
								<div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
							</div>
							<div style="float:left; margin-right: 5px; margin-top: 5px;" class="zalo-share-button" data-href="" data-oaid="1965225949460761031" data-layout="1" data-color="blue" data-customize=false></div>
							<div id="share_social"></div>
						</div>

						<div class="view_pro">Hiện người đang xem sản phẩm này.</div>
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
					<div id="chitietsanpham"></div>
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
					</div>
				</div>
				<div class="wrap_name_detail">
					<label class="title-sp">Sản phẩm tương tự</label>
				</div>
				<div class="list_product  container">
					<div class="sp_detail-owl owl-carousel owl-theme">
						<div class="sanpham sanpham2">
							<div class="img">
								<a href="" title="">
									<img class="img-responsive lazy" src="{{asset('themes/images/sp.jpg')}}" alt="">
								</a>
								<div class="sale_off">-10%</div>
							</div>
							<div class="pro_info">
								<div class=""></div>
								<div class="name"><h3><a href="">Tên Sản Phẩm</a></h3></div>
								<div class="wrap_price flex-between-center">
									<div class="price">Giá: <span>7,000,000 Đ</span></div>
									<div class="price_old">10,000,000 Đ</div>
								</div>
							</div>
						</div>
						<div class="sanpham sanpham2">
							<div class="img">
								<a href="" title="">
									<img class="img-responsive lazy" src="{{asset('themes/images/sp.jpg')}}" alt="">
								</a>
								<div class="sale_off">-10%</div>
							</div>
							<div class="pro_info">
								<div class=""></div>
								<div class="name"><h3><a href="">Tên Sản Phẩm</a></h3></div>
								<div class="wrap_price flex-between-center">
									<div class="price">Giá: <span>7,000,000 Đ</span></div>
									<div class="price_old">10,000,000 Đ</div>
								</div>
							</div>
						</div>
						<div class="sanpham sanpham2">
							<div class="img">
								<a href="" title="">
									<img class="img-responsive lazy" src="{{asset('themes/images/sp.jpg')}}" alt="">
								</a>
								<div class="sale_off">-10%</div>
							</div>
							<div class="pro_info">
								<div class=""></div>
								<div class="name"><h3><a href="">Tên Sản Phẩm</a></h3></div>
								<div class="wrap_price flex-between-center">
									<div class="price">Giá: <span>7,000,000 Đ</span></div>
									<div class="price_old">10,000,000 Đ</div>
								</div>
							</div>
						</div>
						<div class="sanpham sanpham2">
							<div class="img">
								<a href="" title="">
									<img class="img-responsive lazy" src="{{asset('themes/images/sp.jpg')}}" alt="">
								</a>
								<div class="sale_off">-10%</div>
							</div>
							<div class="pro_info">
								<div class=""></div>
								<div class="name"><h3><a href="">Tên Sản Phẩm</a></h3></div>
								<div class="wrap_price flex-between-center">
									<div class="price">Giá: <span>7,000,000 Đ</span></div>
									<div class="price_old">10,000,000 Đ</div>
								</div>
							</div>
						</div>
						<div class="sanpham sanpham2">
							<div class="img">
								<a href="" title="">
									<img class="img-responsive lazy" src="{{asset('themes/images/sp.jpg')}}" alt="">
								</a>
								<div class="sale_off">-10%</div>
							</div>
							<div class="pro_info">
								<div class=""></div>
								<div class="name"><h3><a href="">Tên Sản Phẩm</a></h3></div>
								<div class="wrap_price flex-between-center">
									<div class="price">Giá: <span>7,000,000 Đ</span></div>
									<div class="price_old">10,000,000 Đ</div>
								</div>
							</div>
						</div>
						<div class="sanpham sanpham2">
							<div class="img">
								<a href="" title="">
									<img class="img-responsive lazy" src="{{asset('themes/images/sp.jpg')}}" alt="">
								</a>
								<div class="sale_off">-10%</div>
							</div>
							<div class="pro_info">
								<div class=""></div>
								<div class="name"><h3><a href="">Tên Sản Phẩm</a></h3></div>
								<div class="wrap_price flex-between-center">
									<div class="price">Giá: <span>7,000,000 Đ</span></div>
									<div class="price_old">10,000,000 Đ</div>
								</div>
							</div>
						</div>
						<div class="sanpham sanpham2">
							<div class="img">
								<a href="" title="">
									<img class="img-responsive lazy" src="{{asset('themes/images/sp.jpg')}}" alt="">
								</a>
								<div class="sale_off">-10%</div>
							</div>
							<div class="pro_info">
								<div class=""></div>
								<div class="name"><h3><a href="">Tên Sản Phẩm</a></h3></div>
								<div class="wrap_price flex-between-center">
									<div class="price">Giá: <span>7,000,000 Đ</span></div>
									<div class="price_old">10,000,000 Đ</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
@endsection