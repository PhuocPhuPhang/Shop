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
            <h3>{{$tintuc->ten}}</h3>
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

            <form id="demo-form" action="../sua/{{$tintuc->id}}" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <label>Tên</label>
                <input type="text" id="ten" class="form-control" name="ten" value="{{$tintuc->ten}}" /> <br />

                <label>Thể loại</label>
                <Select class="form-control" name="loaitin" id="loaitin">
                <option value="{{$tintuc->id_loai}}">{{$tintuc->LoaiTinTuc->ten}}</option>
                    @foreach($loaitin as $lt)
                        @if($tintuc->id_loai != $lt->id)
                            <option value="{{$lt->id}}">{{$lt->ten}}</option>
                        @endif
                    @endforeach
                </Select><br/>

                <label>Title</label>
                <input type="text" id="title" class="form-control" name="title" value="{{$tintuc->title}}" /><br />

                <label>Mô tả</label>
                <textarea id="mota"  class="form-control" name="mota">{{$tintuc->mo_ta}}</textarea><br />

                <label>Nội dung</label>
                <textarea id="noidung" class="form-gruop ckeditor" name="noidung" > {{$tintuc->noi_dung}}</textarea>

                <label>Keywords</label>
                <textarea id="keywords"  class="form-control" name="keywords" value="{{$tintuc->keywords}}"></textarea><br />

                <label>Nổi bật &nbsp;&nbsp;</label>
                    <input type="checkbox" @if($tintuc->noi_bat)
                        {{"checked"}}
                    @endif
                    class="flat"><br/>

                <label>Hình Ảnh</label>
                <p>
                <img src="../../../upload/tintuc/{{$tintuc->hinh_anh}}" alt="hình ảnh" width="400px"><br/>
                </p>
                <input type="file" id="hinhanh" name="hinhanh" />
                <div class="ln_solid"></div>
                <div class="form-group" style="margin-left:20%">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="{{ url('admin/tintuc/danhsach') }}">
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
