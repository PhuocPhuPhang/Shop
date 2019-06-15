@extends('admin.layouts.master')
@section('content')
<div class="">
<div class="page-title">
<div class="title_left">
<h3></h3>
</div>
<div class="title_right">
<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
<div class="input-group">
<input type="text" class="form-control" placeholder="Search for...">
<span class="input-group-btn">
    <button class="btn btn-default" type="button">Go!</button>
</span>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Sửa nhà cung cấp {{ $nhacungcap->ten_nha_cung_cap }}</h2>
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

            <form  action="../sua/{{$nhacungcap->ma_nha_cung_cap}}" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã nhà cung cấp</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  name="ma" readonly  class="form-control col-md-7 col-xs-12" value="{{ $nhacungcap->ma_nha_cung_cap}}">
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tên nhà cung cấp</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  name="ten"  class="form-control col-md-7 col-xs-12" value="{{ $nhacungcap->ten_nha_cung_cap}}">
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  class="form-control col-md-7 col-xs-12" name="sdt" value="{{ $nhacungcap->so_dien_thoai}}">
                </div>
                </div>
                <div class="form-group">
                <label  class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea  class="form-control col-md-7 col-xs-12" name="diachi">{{ $nhacungcap->dia_chi}}</textarea>
                </div>
                </div>
                <div class="form-group">
                <label  class="control-label col-md-3 col-sm-3 col-xs-12">Logo </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <p>
                        <img src="../../../upload/nhacungcap/{{$nhacungcap->logo}}" alt="Hình ảnh" width="500px">
                    </p>
                    <input type="file" id="hinhanh" name="hinhanh" /><br/>
                </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="../danhsach">
                        <button class="btn btn-primary" type="button">Cancel</button>
                    </a>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection