@extends('admin.layouts.master')
@section('content')
<div class="">
<div class="clearfix"></div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Thêm nhà cung cấp</h2>
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

            <form  action="{{ url('/admin/nhacungcap/them') }}" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã nhà cung cấp</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  name="ma"  class="form-control col-md-7 col-xs-12">
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tên nhà cung cấp</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  name="ten"  class="form-control col-md-7 col-xs-12">
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  class="form-control col-md-7 col-xs-12" name="sdt">
                </div>
                </div>
                <div class="form-group">
                <label  class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea  class="form-control col-md-7 col-xs-12" name="diachi"></textarea>
                </div>
                </div><br/>
                <div class="form-group">
                <label  class="control-label col-md-3 col-sm-3 col-xs-12">Logo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="hinhanh" name="hinhanh" /><br/>
                </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group" style="margin-left:20%">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="../nhacungcap/danhsach"><button class="btn btn-primary" type="button">Cancel</button></a>
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
