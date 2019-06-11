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
                <label>Tên</label>
                <input type="text" id="ten" class="form-control" name="ten" /> <br />

                <label>Title</label>
                <input type="text" id="title" class="form-control" name="title" /><br />

                <label>Thể loại</label>
                <Select class="form-control" name="loaitin" id="loaitin">
                    @foreach($loaitin as $lt)
                        <option value="$lt->id}}">{{$lt->ten}}</option>
                    @endforeach
                </Select><br/>

                <label>Mô tả</label>
                <textarea id="mota"  class="form-control" name="mota"></textarea><br />

                <label>Nội dung</label>
                <textarea id="noidung" class="form-gruop ckeditor" name="noidung" ></textarea>

                <label>Keywords</label>
                <textarea id="keywords"  class="form-control" name="keywords"></textarea><br />

                <label>Nổi bật &nbsp;&nbsp;</label>
                <input type="checkbox" class="flat" name="noibat" value="1" ><br/>

                <label>Hình Ảnh</label>
                <input type="file" id="hinhanh" name="hinhanh" />

                <div class="ln_solid"></div>
                <div class="form-group" style="margin-left:20%">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="{{ url('admin/tintuc/danhsach') }}">
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
