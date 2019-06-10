@extends('layouts.master')
@section('content')
<div class="profile_wrap container">
	<div class="profile_left"></div>
	<div class="profile_right">
		<div class="profile_right_title">
			<label>Hồ sơ của tôi</label>
			<span>Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
		</div>
		<form id="frmProFile" action="" method="post">
			<div class="pf_col">
				<label>Email</label>
				<input type="email" name="email" value="database">
			</div>
			<div class="pf_col">
				<label>Điện thoại</label>
				<input type="text" name="dienthoai" value="database">
			</div>
			<div class="pf_col">
				<label>Họ tên</label>
				<input type="text" name="hoten" value="database">
			</div>
			<div class="pf_col">
				<label>Giới tính</label>
				<input type="radio" name="gioitinh"><b class="text_GT">Nam</b>
				<input type="radio" name="gioitinh"><b class="text_GT">Nữ</b>
			</div>
			<div class="pf_col">
				<label>Giới tính</label>
				<input type="date" name="ngaysinh">
			</div>
			<input type="submit" name="luu" value="Lưu">
		</form>
	</div>
</div>
@endsection