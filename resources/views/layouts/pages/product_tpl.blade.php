@extends('layouts.master')
@section('content')
<div class="container">
	<div class="ncc_wrap">
		<div class="ncc_grid">
			<a class="ncc_item" href=""><img src="{{asset('themes/images/Huawei42-b_30.jpg')}}"></a>
			<a class="ncc_item" href=""><img src="{{asset('themes/images/iPhone-(Apple)42-b_16.jpg')}}"></a>
			<a class="ncc_item" href=""><img src="{{asset('themes/images/Nokia42-b_21.jpg')}}"></a>
			<a class="ncc_item" href=""><img src="{{asset('themes/images/OPPO42-b_23.jpg')}}"></a>
			<a class="ncc_item" href=""><img src="{{asset('themes/images/OPPO42-b_23.jpg')}}"></a>
			<a class="ncc_item" href=""><img src="{{asset('themes/images/Xiaomi42-b_31.png')}}"></a>
			<a class="ncc_item" href=""><img src="{{asset('themes/images/samsung.jpg')}}"></a>
		</div>				
	</div>
	<div class="select_price_wrap">
		<div class="flex-between-center">
			<ul class="select_price">
				<li><label>Chọn mức giá:</label></li>
				<li>
					<a class="price_item" href="">Dưới 2 triệu</a>
					<a class="price_item" href="">Từ 2 - 4 triệu</a>
					<a class="price_item" href="">Từ 4 - 7 triệu</a>
					<a class="price_item" href="">Từ 7 - 13 triệu</a>
					<a class="price_item" href="">Trên 13 triệu</a>
				</li>
			</ul>
			<div class="sapxep_wrap">
				<label class="title_sapxep">Sắp xếp</label>
				<div class="sapxep_main">
					<label>Nổi bật nhất</label>
					<label>Giá cao đến thấp</label>
					<label>Giá thấp đến cao</label>
				</div>
			</div>
		</div>
	</div>
	<div class="flex-between container">
		<div class="pro_left">
			<div class="pro_left-item">
				<label>Phiên bản</label>
				<ul>
					<li><a href="">Tất cả</a></li>
				</ul>
			</div>
			<div class="pro_left-item">
				<label>Màn hình</label>
				<ul>
					<li><a href="">Tất cả</a></li>
				</ul>
			</div>
			<div class="pro_left-item">
				<label>Bộ nhớ trong</label>
				<ul>
					<li><a href="">Tất cả</a></li>
				</ul>
			</div>
			<div class="pro_left-item">
				<label>Sim</label>
				<ul>
					<li><a href="">Tất cả</a></li>
				</ul>
			</div>
			<div class="pro_left-item">
				<label>Hệ điều hành</label>
				<ul>
					<li><a href="">Tất cả</a></li>
				</ul>
			</div>
		</div>
		<div class="main_content">
			<div class="wrap_name">
				<div class="name"><h1>Sản phẩm nổi bật</h1></div>
			</div>
			<div class="main_list_product">
				<div class="sanpham">
					<div class="img">
						<a href="product_detail_tpl" title="">
							<img class="" src="{{asset('themes/images/sp.jpg')}}" alt="">
						</a>
						<div class="sale_off">Giảm giá -10%</div>
					</div>
					<div class="pro_info">
						<a class="name" href="product_detail_tpl">Tên Sản Phẩm</a>
						<div class="wrap_price flex-between">
							<div class="price">Giá: <span>7,000,000 Đ</span></div>
							<div class="price_old">10,000,000 Đ</div>
						</div>
						<div class="pro_info-info">
							<span>Màn hình: 5.8", Super Retina</span>
							<span>HĐH: iOS 12</span>
							<span>CPU: Apple A11 Bionic 6 nhân</span>
							<span>RAM: 3 GB, ROM: 256 GB</span>
							<span>Camera: Chính 12 MP & Phụ 12 MP, Selfie: 7 MP</span>
							<span>PIN: 2716 mAh</span>
						</div>
					</div>
				</div>
				<div class="sanpham">
					<div class="img">
						<a href="product_detail_tpl" title="">
							<img class="" src="{{asset('themes/images/sp.jpg')}}" alt="">
						</a>
						<div class="sale_off">Giảm giá -10%</div>
					</div>
					<div class="pro_info">
						<a class="name" href="product_detail_tpl">Tên Sản Phẩm</a>
						<div class="wrap_price flex-between">
							<div class="price">Giá: <span>7,000,000 Đ</span></div>
							<div class="price_old">10,000,000 Đ</div>
						</div>
						<div class="pro_info-info">
							<span>Màn hình: 5.8", Super Retina</span>
							<span>HĐH: iOS 12</span>
							<span>CPU: Apple A11 Bionic 6 nhân</span>
							<span>RAM: 3 GB, ROM: 256 GB</span>
							<span>Camera: Chính 12 MP & Phụ 12 MP, Selfie: 7 MP</span>
							<span>PIN: 2716 mAh</span>
						</div>
					</div>
				</div>
				<div class="sanpham">
					<div class="img">
						<a href="product_detail_tpl" title="">
							<img class="" src="{{asset('themes/images/sp.jpg')}}" alt="">
						</a>
						<div class="sale_off">Giảm giá -10%</div>
					</div>
					<div class="pro_info">
						<a class="name" href="product_detail_tpl">Tên Sản Phẩm</a>
						<div class="wrap_price flex-between">
							<div class="price">Giá: <span>7,000,000 Đ</span></div>
							<div class="price_old">10,000,000 Đ</div>
						</div>
						<div class="pro_info-info">
							<span>Màn hình: 5.8", Super Retina</span>
							<span>HĐH: iOS 12</span>
							<span>CPU: Apple A11 Bionic 6 nhân</span>
							<span>RAM: 3 GB, ROM: 256 GB</span>
							<span>Camera: Chính 12 MP & Phụ 12 MP, Selfie: 7 MP</span>
							<span>PIN: 2716 mAh</span>
						</div>
					</div>
				</div>
				<div class="sanpham">
					<div class="img">
						<a href="product_detail_tpl" title="">
							<img class="" src="{{asset('themes/images/sp.jpg')}}" alt="">
						</a>
						<div class="sale_off">Giảm giá -10%</div>
					</div>
					<div class="pro_info">
						<a class="name" href="product_detail_tpl">Tên Sản Phẩm</a>
						<div class="wrap_price flex-between">
							<div class="price">Giá: <span>7,000,000 Đ</span></div>
							<div class="price_old">10,000,000 Đ</div>
						</div>
						<div class="pro_info-info">
							<span>Màn hình: 5.8", Super Retina</span>
							<span>HĐH: iOS 12</span>
							<span>CPU: Apple A11 Bionic 6 nhân</span>
							<span>RAM: 3 GB, ROM: 256 GB</span>
							<span>Camera: Chính 12 MP & Phụ 12 MP, Selfie: 7 MP</span>
							<span>PIN: 2716 mAh</span>
						</div>
					</div>
				</div>
				<div class="sanpham">
					<div class="img">
						<a href="product_detail_tpl" title="">
							<img class="" src="{{asset('themes/images/sp.jpg')}}" alt="">
						</a>
						<div class="sale_off">Giảm giá -10%</div>
					</div>
					<div class="pro_info">
						<a class="name" href="product_detail_tpl">Tên Sản Phẩm</a>
						<div class="wrap_price flex-between">
							<div class="price">Giá: <span>7,000,000 Đ</span></div>
							<div class="price_old">10,000,000 Đ</div>
						</div>
						<div class="pro_info-info">
							<span>Màn hình: 5.8", Super Retina</span>
							<span>HĐH: iOS 12</span>
							<span>CPU: Apple A11 Bionic 6 nhân</span>
							<span>RAM: 3 GB, ROM: 256 GB</span>
							<span>Camera: Chính 12 MP & Phụ 12 MP, Selfie: 7 MP</span>
							<span>PIN: 2716 mAh</span>
						</div>
					</div>
				</div>
				<div class="sanpham">
					<div class="img">
						<a href="product_detail_tpl" title="">
							<img class="" src="{{asset('themes/images/sp.jpg')}}" alt="">
						</a>
						<div class="sale_off">Giảm giá -10%</div>
					</div>
					<div class="pro_info">
						<a class="name" href="product_detail_tpl">Tên Sản Phẩm</a>
						<div class="wrap_price flex-between">
							<div class="price">Giá: <span>7,000,000 Đ</span></div>
							<div class="price_old">10,000,000 Đ</div>
						</div>
						<div class="pro_info-info">
							<span>Màn hình: 5.8", Super Retina</span>
							<span>HĐH: iOS 12</span>
							<span>CPU: Apple A11 Bionic 6 nhân</span>
							<span>RAM: 3 GB, ROM: 256 GB</span>
							<span>Camera: Chính 12 MP & Phụ 12 MP, Selfie: 7 MP</span>
							<span>PIN: 2716 mAh</span>
						</div>
					</div>
				</div>
				<div class="sanpham">
					<div class="img">
						<a href="product_detail_tpl" title="">
							<img class="" src="{{asset('themes/images/sp.jpg')}}" alt="">
						</a>
						<div class="sale_off">Giảm giá -10%</div>
					</div>
					<div class="pro_info">
						<a class="name" href="product_detail_tpl">Tên Sản Phẩm</a>
						<div class="wrap_price flex-between">
							<div class="price">Giá: <span>7,000,000 Đ</span></div>
							<div class="price_old">10,000,000 Đ</div>
						</div>
						<div class="pro_info-info">
							<span>Màn hình: 5.8", Super Retina</span>
							<span>HĐH: iOS 12</span>
							<span>CPU: Apple A11 Bionic 6 nhân</span>
							<span>RAM: 3 GB, ROM: 256 GB</span>
							<span>Camera: Chính 12 MP & Phụ 12 MP, Selfie: 7 MP</span>
							<span>PIN: 2716 mAh</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection