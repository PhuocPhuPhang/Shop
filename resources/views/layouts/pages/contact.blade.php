@if(url ('shop/lien-he'))
<link  href="{{asset('themes/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link  href="{{asset('themes/css/default.min.css')}}" rel="stylesheet">
@endif
@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row box mx-0" style="margin-top: 30px;">
		<div class="col-md-5">
			<h3 class="title-contact">Thông tin liên hệ</h3>
			<div>Nội dung ......</div>
		</div>
		<div class="col-md-7">
			<h3 class="title-contact">Liên hệ với chúng tôi</h3>
			<form id="frmContact" method="post" action="lien-he">
				<div class="row">
					<div class="col-md-6">
						<input type="text" name="hoten" placeholder="Họ và tên">
					</div>
					<div class="col-md-6">
						<input type="text" name="so_dien_thoai" placeholder="Số điện thoại">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<input type="email" name="email" placeholder="Email">
					</div>
					<div class="col-md-6">
						<input type="text" name="dia_chi" placeholder="Địa chỉ">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<textarea name="noi_dung" placeholder="Nội dung"></textarea>
					</div>
				</div>
				<div class="text-center" style="margin-top: 10px;">
					<button type="submit">Gửi</button>
					<button type="reset">Hủy</button>
				</div>
				<!-- <input type="hidden" id="recaptchaResponse" name="recaptcha_response"> -->
			</form>
		</div>
	</div>
</div>
@endsection