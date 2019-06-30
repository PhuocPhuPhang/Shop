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
            <h2>Thêm tin tức</h2>
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

            <form id="demo-form" action="{{ url('/admin/tintuc/them') }}" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <label>Tiêu đề</label>
                <input type="text" id="title" class="form-control" name="title" /><br />

                <label>Mô tả</label>
                <textarea id="mota"  class="form-control" name="mota"></textarea><br />

                <label>Nội dung</label>
                <textarea id="noidung" class="form-gruop ckeditor" name="noidung" ></textarea>

                <label>Keywords</label>
                <textarea id="keywords"  class="form-control" name="keywords"></textarea><br />

                <label>Nổi bật &nbsp;&nbsp;</label>
                <input type="checkbox" class="flat" name="noibat" value="1" ><br/>

                <label>Hình Ảnh</label>
                <input type="file" id="hinhanh" name="hinhanh" onChange="showImages.call(this)" /><br/>
                <img id="image" src="" style="display:none;" alt="hinh" height="200px" width="300px">

                <div class="ln_solid"></div>
                <div class="form-group" style="margin-left:20%">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="admin/tintuc/danhsach">
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

