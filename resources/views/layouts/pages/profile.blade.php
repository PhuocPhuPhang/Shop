@if(url ('shop/cart'))
<link  href="{{asset('themes/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
@endif
@extends('layouts.master')
@section('content')
<div class="row content12 inner">
	<div class="col-md-2 border-right left-profile">
		<div class="header_profile">
			<h6>{{Auth::user()->email}}</h6>
			<a href="shop/thong-tin-tai-khoan" title="Chỉnh sửa tài khoản">Chỉnh sửa tài khoản</a>
		</div>
		<div class="menu_profile">
			<h5>Quản lý giao dịch</h5>
			<ul>
				<li><a class="actived" href="shop/don-hang" title="Đơn hàng"><i class="fas fa-file-alt"></i>Đơn hàng</a></li>
			</ul>
		</div>
		<div class="menu_profile">
			<h5>Quản lý tài khoản</h5>
			<ul>
				<li><a class="actived" href="shop/thong-tin-tai-khoan" title="Thông tin tài khoản"><i class="fas fa-edit"></i>Thông tin tài khoản</a></li>
				<li><a class="actived" href="shop/doi-mat-khau" title="Thay đổi mật khẩu"><i class="fas fa-unlock-alt"></i>Thay đổi mật khẩu</a></li>
				@if(Auth::user()->quyen == 1 || Auth::user()->quyen == 2)
				<li><a class="actived" href="{{url('admin/index')}}" title="Trang quản lý"><i class="fas fa-sign-out-alt"></i>Trang quản lý</a></li>
				@endif
				<li><a class="actived" href="{{url('shop/logout')}}" title="Đăng xuất"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-10 right-profile">
		<h4 class="border-bottom">Thông tin tài khoản</h4>
		@if( $route->uri == 'shop/thong-tin-tai-khoan' || $route->uri == 'shop/profile')
		<form class="col-md-8" id="frmInfoUser" method="post" action="{{ url('shop/cap-nhat-thong-tin') }}">
			<div class="form-group row">
				<label class="col-md-3 col-form-label">Email</label>
				<div class="col-md-9">
					<input type="email" id="email" name="email" value="{{Auth::user()->email}}" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label">Họ và tên</label>
				<div class="col-md-9">
					<input type="text" name="ten" value="{{Auth::user()->ten}}" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label">Số điện thoại</label>
				<div class="col-md-9">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">(+84)</span>
						</div>
						<input type="text" name="so_dien_thoai" value="{{Auth::user()->so_dien_thoai}}" class="form-control">
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="">Giới tính</label>
				<div class="col-md-9">
					<div class="row mg0">
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="customRadio1" name="gioi_tinh" value="Nam" {{Auth::user()->gioi_tinh == "Nam" ?"checked": ""}}>
							<label class="custom-control-label" for="customRadio1">Nam</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="customRadio2" name="gioi_tinh" value="Nữ" {{Auth::user()->gioi_tinh == "Nữ" ?"checked": ""}}>
							<label class="custom-control-label" for="customRadio2">Nữ</label>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="">Ngày sinh</label>
				<div class="col-md-9">
					<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
						<input type="text" name="ngay_sinh" value="{{Auth::user()->ngay_sinh}}" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
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
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
					<input type="submit" class="btn btn-primary" value="Cập nhật">
				</div>
			</div>
		</form>
		@endif
		@if( $route->uri == 'shop/doi-mat-khau')
		<form class="col-md-8" id="frmChangePassword" method="post" action="{{ url('shop/cap-nhat-mat-khau') }}">
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="">Tên đăng nhập</label>
				<div class="col-md-9">
					<input type="text" id="username" name="username" value="{{Auth::user()->email}}" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="">Mật khẩu cũ</label>
				<div class="col-md-9">
					<input type="password" id="oldpassword" name="password_old" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="">Mật khẩu mới</label>
				<div class="col-md-9">
					<input type="password" id="newpassword" name="password" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="">Nhập lại mật khẩu mới</label>
				<div class="col-md-9">
					<input type="password" id="re_newpassword" name="password_confirmation" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="offset-md-3 col-md-9">
					<div id="recaptcha3"></div>
				</div>
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			<div class="row">
				<div class="offset-md-3 col-md-9">
					<button class="btn btn-primary">Cập nhật</button>
				</div>
			</div>
		</form>
		@endif
		@if($route->uri == 'shop/don-hang')
		<div class="custom-table">
			<div class="custom-table__header">
				<div class="custom-table__col">STT</div>
				<div class="custom-table__col">Mã đơn hàng</div>
				<div class="custom-table__col">Sản phẩm</div>
				<div class="custom-table__col">Ngày đặt</div>
				<div class="custom-table__col">Tổng tiền</div>
				<div class="custom-table__col">Tình trạng</div>
			</div>
			<div class="custom-table__body">
				<div class="custom-table__row">
					@foreach($a as $dh)
					<div class="custom-table__col center">1</div>
					<div class="custom-table__col center">{{$dh->ma_hoa_don}}</div>
					<div class="custom-table__col">
						@foreach($b as $dhct)
						@if($dhct->ma_hoa_don == $dh->ma_hoa_don)
						<div class="order-detail-items">
							@foreach($c as $gia)
							@if($gia->ma_san_pham == $dhct->ma_san_pham)
							<strong class="order-detail-items__name">{{$gia->ten_san_pham}}</strong>
							<div class="order-detail-items__row">Thành tiền: {{number_format($gia->gia_ban)}}<sup>đ</sup> x  {{$dhct->so_luong}} = {{number_format($gia->gia_ban * $dhct->so_luong)}} <sup>đ</sup></div>
							@endif
							@endforeach
						</div>
						@endif
						@endforeach
					</div>
					<div class="custom-table__col center">{{$dh->created_at}}</div>

					<div class="custom-table__col center">100000 <sup>đ</sup></div>
					@if($dh->duyet == 0)
					<div class="custom-table__col center">Chờ duyệt</div>
					@endif
					@if($dh->duyet == 1)
					<div class="custom-table__col center">Đã duyệt</div>
					@endif
					@if($dh->duyet == 0)
					<a href="shop/huyDonHang/{{$dh->ma_hoa_don}}" class="custom-table__col center">Hủy đơn hàng</a>
					@endif
					@if($dh->duyet == 1)
					<div style="color: green;" class="custom-table__col center">Hàng đang chuyển đi</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
		@if(session('huydonhang'))
		<script>
			alert('Hủy đơn hàng thành công!')
		</script>
		@endif
		@endif
		
	</div>
</div>
@endsection
