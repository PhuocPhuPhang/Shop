@if(url ('shop/cart'))
<link  href="{{asset('themes/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
@endif
@extends('layouts.master')
@section('content')
<div class="row content12 inner">
	<div class="col-md-2 border-right left-profile">
		<div class="header_profile">
			<h6>{{Auth::user()->email}}</h6>
			<a href="thong-tin-tai-khoan.html" title="Chỉnh sửa tài khoản">Chỉnh sửa tài khoản</a>
		</div>
		<div class="menu_profile">
			<h5>Quản lý giao dịch</h5>
			<ul>
				<li><a class="actived" href="don-hang.html" title="Đơn hàng"><i class="fas fa-file-alt"></i>Đơn hàng</a></li>
			</ul>
		</div>
		<div class="menu_profile">
			<h5>Quản lý tài khoản</h5>
			<ul>
				<li><a class="actived" href="thong-tin-tai-khoan.html" title="Thông tin tài khoản"><i class="fas fa-edit"></i>Thông tin tài khoản</a></li>
				<li><a class="actived" href="doi-mat-khau.html" title="Thay đổi mật khẩu"><i class="fas fa-unlock-alt"></i>Thay đổi mật khẩu</a></li>
				<li><a class="actived" href="dang-xuat.html" title="Đăng xuất"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-10 right-profile">
		<h4 class="border-bottom">Thông tin tài khoản</h4>
		{{--@if({{url('thongtintaikhoan')}} == 'thong-tin-tai-khoan')--}}
			<form class="col-md-8" id="frmInfoUser" method="post" action="thong-tin-tai-khoan.html">
				<div class="form-group row">
					<label class="col-md-3 col-form-label" for="">Email</label>
					<div class="col-md-9">
						<input type="email" id="email" name="email" value="{{Auth::user()->email}}" class="form-control" disabled>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-form-label" for="">Họ và tên</label>
					<div class="col-md-9">
						<input type="text" name="fullname" value="{{Auth::user()->ten}}" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-form-label" for="">Số điện thoại</label>
					<div class="col-md-9">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">(+84)</span>
							</div>
							<input type="text" name="phone" value="{{Auth::user()->so_dien_thoai}}" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-form-label" for="">Giới tính</label>
					<div class="col-md-9">
						<div class="row mg0">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio1" name="gender" value="1">
								<label class="custom-control-label" for="customRadio1">Nam</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="gender" value="0">
								<label class="custom-control-label" for="customRadio2">Nữ</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-form-label" for="">Ngày sinh</label>
					<div class="col-md-9">
						<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
							<input type="text" name="birthday" value="" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
							<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-form-label" for="">Địa chỉ</label>
					<div class="col-md-9">
						<input type="text" name="address" value="{{Auth::user()->dia_chi}}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="offset-md-3 col-md-9">
						<button type="submit" class="btn btn-primary">Cập nhật</button>
						<button type="submit" class="btn btn-secondary">Nhập lại</button>
					</div>
				</div>
			</form>
		{{--@endif--}}
		
	</div>
</div>
@endsection
<!-- <?php if($_GET['com'] == 'doi-mat-khau') { ?>
			<form class="col-md-8" id="frmChangePassword" method="post" action="doi-mat-khau.html">
				<div class="form-group row">
					<label class="col-md-3 col-form-label" for="">Tên đăng nhập</label>
					<div class="col-md-9">
						<input type="text" id="username" name="username" value="<?=$info_user['username']?>" class="form-control" disabled>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-form-label" for="">Mật khẩu cũ</label>
					<div class="col-md-9">
						<input type="password" id="oldpassword" name="oldpassword" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-form-label" for="">Mật khẩu mới</label>
					<div class="col-md-9">
						<input type="password" id="newpassword" name="newpassword" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-form-label" for="">Nhập lại mật khẩu mới</label>
					<div class="col-md-9">
						<input type="password" id="re_newpassword" name="re_newpassword" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<div class="offset-md-3 col-md-9">
						<div id="recaptcha3"></div>
					</div>
				</div>
				<div class="row">
					<div class="offset-md-3 col-md-9">
						<button type="submit" class="btn btn-primary">Cập nhật</button>
						<button type="submit" class="btn btn-secondary">Nhập lại</button>
					</div>
				</div>
			</form>
		<?php } ?> -->