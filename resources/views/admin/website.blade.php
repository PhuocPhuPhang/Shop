@extends('admin.layouts.master')
@section('content')
<div class="">
<div class="clearfix"></div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Thông tin cấu hình website</h2>
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

            <form  action="{{ url('/admin/website/thongtin') }}" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Tên công ty</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input  name="ten" value="{{$thongtin->ten_cong_ty}}"  class="form-control col-md-7 col-xs-12">
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Emai</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input  name="email" value="{{$thongtin->email}}"  class="form-control col-md-7 col-xs-12">
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Số điện thoại</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input  name="sdt" value="{{$thongtin->dien_thoai}}"  class="form-control col-md-7 col-xs-12">
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Hotline</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input  name="hotline" value="{{$thongtin->hotline}}"  class="form-control col-md-7 col-xs-12">
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Địa chỉ</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input  name="diachi" value="{{$thongtin->dia_chi}}"  class="form-control col-md-7 col-xs-12">
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Map</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <textarea  name="map"  class="form-control col-md-7 col-xs-12">{{$thongtin->map}}</textarea>
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Website</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input  name="website" value="{{$thongtin->website}}"  class="form-control col-md-7 col-xs-12">
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Fanpage</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input  name="fanpage" value="{{$thongtin->fanpage}}" class="form-control col-md-7 col-xs-12">
                        </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group" style="margin-left:20%">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset">Làm mới</button>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
