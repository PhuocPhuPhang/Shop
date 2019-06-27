@extends('layouts.master')
@section('content')
<div class="container">
	<div class="ncc_wrap">
		<div class="ncc_grid">
			@foreach($nhacungcap as $ncc )
			<a class="ncc_item" href=""><img src="../upload/nhacungcap/{{$ncc->logo}}"></a>
			@endforeach
		</div>
	</div>
	<div class="select_price_wrap">
		<div class="flex-between-center">
			<ul class="select_price">
				<li><label>Chọn mức giá:</label></li>
				<li id="gia">
					<a class="price_item" data-id="1">Dưới 2 triệu</a>
					<a class="price_item" data-id="2" >Từ 2 - 4 triệu</a>
					<a class="price_item" data-id="3" >Từ 4 - 7 triệu</a>
					<a class="price_item" data-id="4" >Từ 7 - 13 triệu</a>
					<a class="price_item" data-id="5" >Trên 13 triệu</a>
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
				<div class="name"><h1>Sản phẩm</h1></div>
			</div>
			<div class="main_list_product">
				{{--@if({{$product_select}} == '')--}}
				@foreach($product as $sp)
				<div class="sanpham">
					<div class="img">
						<a href="shop/san-pham/{{$sp->ma_san_pham}}" title="{{$sp->ten_san_pham}}">
							<img src="upload/sanpham/{{$sp->hinh_anh}}" alt="{{$sp->ten_san_pham}}">
						</a>
						<div class="sale_off">Giảm giá -10%</div>
					</div>
					<div class="pro_info">
						<a class="name" href="shop/san-pham/{{$sp->ma_san_pham}}">{{$sp->ten_san_pham}}</a>
						<div class="wrap_price flex-between">
							<div class="price">Giá: <span>{{number_format($sp->gia_ban)}} Đ</span></div>
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


				@endforeach
				{{ $product->links() }}
			

	</div>
</div>
</div>
</div>


@endsection
@section('script')
<script>
	$(document).ready(function() {
		let array = [];
		$('#gia').on('click','a', function (e) {
			e.preventDefault();
			let gia = {
				gia: $(this).data('id')
			}
			console.log(gia);
			array.push(gia);
			$.ajax({
				type:'post',
				url: 'SearchPrice',
				headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}',contentType: "application/json", },
				data:{gia:array},

			});
			array = [];
			console.log(array);
		});

	});
</script>
@endsection

