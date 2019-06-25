@extends('layouts.master')
@section('content')

<div id="layout_cart" class="container padding-inner">
	<form id="frmPay" action="{{URL ('createCart')}}" method="post" accept-charset="utf-8">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		<div class="cart-layout cart_repon">
			<div class="cart-layout__col">
				<div class="cart-layout__title">Thông tin giỏ hàng</div>
				<input class="form-control" type="text" name="ten" placeholder="Họ tên" required>
				<input class="form-control" type="text" name="email" placeholder="Email" required>
				<input class="form-control" type="text" name="dienthoai" placeholder="Số điện thoại" required>
				<textarea class="form-control" name="diachi" placeholder="Địa chỉ" rows="5" required></textarea>
			</div>
			<div class="cart-layout__col">
				<div class="cart-layout__header">Đơn hàng ({{Cart::getTotalQuantity()}} sản phẩm)</div>
				<div class="cart-layout__body">
					@foreach($data as $dt)
					<div class="cart-items">
						<a class="cart-items__image w-img" href="">
							<img src="upload/sanpham/{{$dt->attributes->img}}" alt="sản phẩm">
						</a>
						<div class="cart-items__info">
							<a class="cart-items__name" href="">{{$dt->name}}</a>
							<div id="unit" class="cart-items__unit">Giá sản phẩm: {{number_format($dt->price)}}<sup>đ</sup></div>
							<div class="cart-items__quantity">
								<input type="hidden" value="{{$dt->id}}" id="rowID{{$dt->id}}">
								<span class="amount amount-minus" data-action="minus"></span>
								<input type="text" name="number" id="upCart{{$dt->id}}" value="{{$dt->quantity}}">
								<span class="amount amount-plus" data-action="plus"></span>
							</div>
							<span class="cart-items__price">Tổng giá:</span>
							<div id="price-" class="cart-items__price">{{number_format($dt->price * $dt->quantity)}}<sup>đ</sup></div>
						</div>
						<div class="cart-items__action">
							<a href="/cart/remove/{{$dt->id}}" class="cart-items__delete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"/></svg></a>
						</div>
					</div>
					@endforeach
					<div class="cart-layout__row cart-layout__total">
						<span>Tổng cộng</span>
						<span id="OrderTotal">{{number_format(Cart::getSubTotal())}}<sup>đ</sup></span>
					</div>
					<div class="httt_wrap">
						<div class="cart-layout__title">Thanh toán</div>
						<div>
							<div class="payment-method">
								<div class="payment-method__header">
									<input type="radio" class="input-radio active" name="phuongthuc" value="Thanh toán tại cửa hàng"/>
									<span>Thanh toán tại cửa hàng</span>
								</div>
								<div class="payment-method__body clearfix active">Nội dung thanh toán tại cửa hàng</div>
							</div>
							<div class="payment-method">
								<div class="payment-method__header">
									<input type="radio" class="input-radio" name="phuongthuc" value="Thanh toán qua ngân hàng"/>
									<span>Thanh toán qua ngân hàng</span>
								</div>
								<div class="payment-method__body clearfix">Nội dung thanh toán qua ngân hàng</div>
							</div>
						</div>
					</div>
					<div class="cart-layout__button">
						<a href="shop/san-pham" title="Tiếp tục mua hàng">Tiếp tục mua hàng</a>
						<button type="submit">Đặt hàng</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){
		@foreach($data as $dt)
		$("#upCart{{$dt->id}}").on('change keyup', function(){
			var newQty = $("#upCart{{$dt->id}}").val();
			var id =  $("#rowID{{$dt->id}}").val();
			$.ajax({
				type:'POST',
				url: 'cart/update1',
				headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
				data:{"id":id},
				success: function(data){
					location.reload();
				}
			})
		});
		@endforeach
	});
</script>
@endsection

