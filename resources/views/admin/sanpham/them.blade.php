@extends('admin.layouts.master')
@section('content')
<div class="">
<div class="clearfix"></div>
<div class="row">
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
    <form id="demo-form" action="{{ url('/admin/sanpham/them') }}" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm sản phẩm</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <label>Mã sản phẩm</label>
                    <input type="text" id="ma" class="form-control" name="ma" /><br />

                    <label>Tên sản phẩm</label>
                    <input type="text" id="ten" class="form-control" name="ten" /> <br />

                    <label>Màu sắc</label>
                        <div class="input-group demo2">
                        <input type="text" id="mausac" value="#e01ab5" class="form-control" name="mausac"/>
                        <span class="input-group-addon"><i></i></span>
                        </div>
                    <br/>

                    <label>Nhà cung cấp</label>
                    <Select class="form-control" name="nhacungcap" id="nhacungcap">
                        @foreach($nhacungcap as $ncc)
                            <option value="{{$ncc->ma_nha_cung_cap}}">{{$ncc->ten_nha_cung_cap}}</option>
                        @endforeach
                    </Select><br/>

                    <label>Số lượng</label>
                    <input type="text" id="soluong" class="form-control" name="soluong" /><br />

                    <label>Gía bán</label>
                    <input type="text" id="gia" class="form-control" name="gia" /><br />

                    <label>Mô tả</label>
                    <textarea id="mota"  class="form-control" name="mota"></textarea><br />

                    <label>Nổi bật &nbsp;&nbsp;</label>
                    <input type="checkbox" class="flat" name="noibat" value="1" ><br/><br/>

                    <label>Keywords</label>
                    <textarea id="keywords"  class="form-control" name="keywords"></textarea><br />
                </div>
            </div>
        </div>
        @foreach($loaicauhinh as $loai)
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$loai->ten}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach($cauhinh as $ch)
                        @if($loai->id == $ch->id_loai)
                            <label>{{$ch->cau_hinh}}</label>
                            <input type="text" id="{{$ch->ten_khong_dau}}" class="form-control" name="{{$ch->ten_khong_dau}}" /><br />
                        @endif
                        @endforeach
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    <label>Nội dung</label>
                    <textarea id="noidung" class="form-gruop ckeditor" name="noidung" ></textarea><br/>

                    <label>Hình Ảnh Khác</label>
                    <input type="file" id="hinhanh" name="hinhanh[]" multiple="multiple" /><br/>

                <div class="ln_solid"></div>
                    <div class="form-group" style="margin-left:20%">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ url('admin/sanpham/danhsach') }}">
                                <button class="btn btn-primary" type="button">Cancel</button>
                            </a>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
