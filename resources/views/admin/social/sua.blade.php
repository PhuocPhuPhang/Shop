@extends('admin.layouts.master')
@section('content')
<div class="">
<div class="clearfix"></div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h3>{{$social->ten}}</h3>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">

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

            <form id="demo-form" action="../sua/{{$social->id}}" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <label>Tên</label>
                <input type="text" id="ten" class="form-control" name="ten" value="{{$social->ten}}" /> <br />

                <label>Link</label>
                <input type="text" id="link" class="form-control" name="link" value="{{$social->link}}" /> <br />

                <label>Hình Ảnh</label>
                <p>
                    <img src="../../../upload/social/{{$social->hinh_anh}}" alt="Hình ảnh" width="30px">
                </p>
                <input type="file" id="hinhanh" name="hinhanh" /><br/>

                <label>Thứ tự</label>
                <input type="number" id="thutu" name="thutu" min="0" value="{{$social->thu_tu}}" class="form-control" style="width:7%"/>

                <div class="ln_solid"></div>
                <div class="form-group" style="margin-left:20%">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="{{ url('admin/social/danhsach') }}">
                            <button class="btn btn-primary" type="button">Hủy</button>
                        </a>
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
