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
    <form id="themsp" method="post" enctype="multipart/form-data">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm sản phẩm</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <label >Mã sản phẩm</label>
                    <input type="text" id="ma" class="form-control" name="ma" value="{{$sanpham->ma_san_pham}}" /><br />

                    <label>Tên sản phẩm</label>
                    <input type="text" id="ten" class="form-control" name="ten" value="{{$sanpham->ten_san_pham}}" /> <br />

                    <label>Màu sắc</label>
                        <div class="input-group demo2">
                        <input type="text" id="mausac" value="{{$sanpham->mau_sac}}" class="form-control" name="mausac"/>
                        <span class="input-group-addon"><i></i></span>
                        </div>
                    <br/>

                    <label >Nhà cung cấp</label>
                    <Select class="form-control" name="nhacungcap" id="nhacungcap">
                    <option value="{{$sanpham->nha_cung_cap}}">{{$sanpham->NhaCungCap->ten_nha_cung_cap}}</option>
                        @foreach($nhacungcap as $ncc)
                        @if($ncc->ma_nha_cung_cap != $sanpham->nha_cung_cap)
                            <option value="{{$ncc->ma_nha_cung_cap}}">{{$ncc->ten_nha_cung_cap}}</option>
                        @endif
                        @endforeach
                    </Select><br/>

                    <label>Số lượng</label>
                    <input type="text" id="soluong" class="form-control" name="soluong" /><br />

                    <label>Gía bán</label>
                    <input type="text" id="gia" class="form-control" name="gia" /><br />

                    <label>Chương trình khuyến mãi</label>
                    <select name="khuyenmai" id="khuyenmai" class="form-control">
                    <option value="{{$sanpham->khuyen_mai}}">{{$sanpham->KhuyenMai->ten_khuyen_mai}}</option>
                        @foreach($khuyenmai as $km)
                        @if($km->ma_khuyen_mai != $sanpham->khuyen_mai)
                            <option value="{{$km->ma_khuyen_mai}}">{{$km->ten_khuyen_mai}}</option>
                        @endif
                        @endforeach
                    </select><br/>

                    <label>Mô tả</label>
                    <textarea id="mota"  class="form-control" name="mota"></textarea><br />

                    <label>Nổi bật &nbsp;&nbsp;</label>
                    <input type="checkbox" class="flat" id="noibat" name="noibat" value="1" ><br/><br/>

                    <label>Keywords</label>
                    <textarea id="keywords"  class="form-control" name="keywords"></textarea><br />

                    <label>Hình ảnh</label>
                    <input type="file" id="hinhanh" name="hinhanh[]" multiple="multiple" onChange="showImages.call(this)"/><br/>
                    <br/><img id="image" src="" style="display:none;" alt="hinh" height="200px" width="300px">
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cấu hình chi tiết</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li>
                            <button type="button" name="them_cauhinh" id="them_cauhinh" style="background:#fff;border:none;margin-top:5px">
                                <i class="fa fa-plus"></i>
                            </button>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
            </div>


        </div>
        </div>
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title" style="border-bottom:none">
                <label>Nội dung</label>
                <textarea id="noidung" class="form-gruop ckeditor" name="noidung" ></textarea><br/>
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
        </div>
        </div>
        </div>
    </form>
</div>
</div>
@endsection

