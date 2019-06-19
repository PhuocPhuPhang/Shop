@extends('layouts.master')
@section('content')
<div class="profile_wrap container flex-between">
	<div class="profile_left">
		<ul class="profile_list">
			<li class="profile_item_HS"><a href="">Tài khoản của tôi</a></li>
			<li class="profile_item_change"><a href="">Đổi mật khẩu</a></li>
			<li><a href="">Đơn mua</a></li>
		</ul>
	</div>
	<div class="profile_right">
		<div class="hoso_main" style="display: none;">
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
				<input type="button" name="luu" value="Lưu">
			</form>
		</div>
		<div>
			<div class="profile_right_title">
				<label>Đổi mật khẩu</label>
				<span>Để bảo mật tài khoản vui lòng không chia sẻ mật khẩu cho người khác.</span>
			</div>
			<form id="frmChagePassword" action="{{ url('/profile/changepassword') }}" method="post">
				<div class="pf_col">
					<label>Mật khẩu hiện tại</label>
					<input type="password" name="password_old">
				</div>
				<div class="pf_col">
					<label>Mật khẩu mới</label>
					<input type="password" name="password">
				</div>
				<div class="pf_col">
					<label>Nhập lại mật khẩu</label>
					<input type="password" name="password_confirmation">
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				<input type="submit" name="xacnhan" value="Xác nhận">
			</form>
			@if(count($errors) > 0)
			<script >
				alert('Thất bại');
			</script>
			<div class="alert alert-danger">
				@foreach($errors->all() as $err)
				{{ $err }} <br>
				@endforeach
			</div>
			@endif
			@if(session('thongbao'))
			<script>
				alert('Thành Công')
			</script>
			@endif 
		</div>
	</div>
</div>
@endsection