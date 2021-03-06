@extends('layouts.master')
@section('content')
<div class="container">
	<div class="ncc_wrap">
		<div class="ncc_grid">
			@foreach($nhacungcap as $ncc )
			<a class="ncc_item" href="shop/san-pham-nha-cung-cap/{{$ncc->ma_nha_cung_cap}}"><img src="../upload/nhacungcap/{{$ncc->logo}}"></a>
			@endforeach
		</div>
	</div>
	<div class="select_price_wrap">
		<div class="flex-between-center">
			<!-- <ul class="select_price">
				<li><label>Chọn mức giá:</label></li>
				<li id="gia">
					<a class="price_item" data-id="1">Dưới 2 triệu</a>
					<a class="price_item" data-id="2" >Từ 2 - 4 triệu</a>
					<a class="price_item" data-id="3" >Từ 4 - 7 triệu</a>
					<a class="price_item" data-id="4" >Từ 7 - 13 triệu</a>
					<a class="price_item" data-id="5" >Trên 13 triệu</a>
				</li>
			</ul> -->
			<!-- <div class="sapxep_wrap">
				<label class="title_sapxep">Sắp xếp</label>
				<div id="SapXepGia" class="sapxep_main">
					<a href="shop/SapXepGia" data-id="1" class="sapxep_item">Giá cao đến thấp</a>
					<a data-id="2" class="sapxep_item">Giá thấp đến cao</a>
				</div>
			</div> -->
		</div>
	</div>
	<div class="flex-between container">
		<div class="pro_left" style="display: none;">
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
		<div class="main_content" style="width: 100%;">
			<div class="wrap_name">
				<div class="name"><h1>Sản phẩm</h1></div>
			</div>
			<div class="main_list_product">
				@foreach($product_tpl as $sp)
				<div class="sanpham">
					<div class="img">
						<a href="shop/san-pham/{{$sp->ma_san_pham}}" title="{{$sp->ten_san_pham}}">
							<img src="upload/sanpham/{{$sp->hinh_anh}}" alt="{{$sp->ten_san_pham}}">
						</a>
						<!-- <div class="sale_off">Giảm giá -10%</div> -->
					</div>
					<div class="pro_info">
						<a style="font-size: 15px;color: blue;font-weight: bold;" class="name" href="shop/san-pham/{{$sp->ma_san_pham}}">{{$sp->ten_san_pham}}</a>
						<div class="wrap_price">
							<div style="display: block; text-align: center;" class="price">Giá: <span>{{number_format($sp->gia_ban)}} Đ</span></div>
						</div>
						<div class="pro_info-info">
							{{--@foreach($ttsp as $thongso)
							@endforeach--}}	
							<!-- <span>Màn hình: 5.8", Super Retina</span>
							<span>HĐH: iOS 12</span>
							<span>CPU: Apple A11 Bionic 6 nhân</span>
							<span>RAM: 3 GB, ROM: 256 GB</span>
							<span>Camera: Chính 12 MP & Phụ 12 MP, Selfie: 7 MP</span>
							<span>PIN: 2716 mAh</span> -->
						</div>
					</div>
				</div>
				@endforeach
			</div>
			{{ $product_tpl->links() }}
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function() {
		$('#SapXepGia').on('click','a', function (e) {
			e.preventDefault();
			let sxGia = $(this).data('id');
			$.ajax({
				type:'post',
				url: 'shop/SapXepGia',
				headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
				data:{
					gia:sxGia,
				}
			});
		});

	});
</script>
@endsection

