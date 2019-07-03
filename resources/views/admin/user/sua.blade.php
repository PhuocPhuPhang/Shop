@extends('admin.layouts.master')
@section('content')
<div class="">
<div class="page-title">
<div class="title_left">
<h3></h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h3>Xin chào ! {{$user->ten}}</h3>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br />

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{ $err }} <br>
                    @endforeach
                </div>
            @endif

            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            @endif
            <form  action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
            <div class="col-md-4 col-sm-12 col-xs-12">
            <p>
                <img src="../../../upload/user/{{$user->avatar}}" alt="Hình ảnh" width="400px" height="300px" >
            </p>
                <input type="file" id="hinhanh" name="hinhanh" /><br/>
            </div>

            <div class="col-md-8 col-sm-12 col-xs-12">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ tên</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input  name="ten"   class="form-control col-md-7 col-xs-12" value="{{ $user->ten}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" name="email"   class="form-control col-md-7 col-xs-12" value="{{ $user->email}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date" name="ngaysinh"   class="form-control col-md-7 col-xs-12" value="{{ $user->ngay_sinh}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="sdt" class="form-control col-md-7 col-xs-12" value="{{ $user->so_dien_thoai}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="diachi" id="diachi" class="form-control col-md-7 col-xs-12" style="width:315px" rows="3">{{ $user->dia_chi}}</textarea>
                    </div>
                </div>
                <br>
                <div class="form-group" style="margin-left:12%">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset">Làm mới</button>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
                </div>
                </div>
            </div>
        </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $("div.alert").delay(3000).slideUp();
</script>
@endsection

