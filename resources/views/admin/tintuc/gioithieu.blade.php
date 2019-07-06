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
            <h2>Giới thiệu chung</h2>
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

            <form id="demo-form" action="shop/admin/tintuc/gioithieu" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <label>Tiêu đề</label>
                <input type="text" id="title" class="form-control" name="title" @if ($gt != null) value="{{$gt->title}}" @endif /><br />

                @if ($gt != null)
                <label>Mô tả</label>
                <textarea id="mota"  class="form-control" name="mota" style="height:100px">{{$gt->mo_ta}}</textarea><br />
                @else
                <label>Mô tả</label>
                <textarea id="mota"  class="form-control" name="mota" style="height:100px"></textarea><br />
                @endif

                <label>Nội dung</label>
                <textarea id="noidung" class="form-gruop ckeditor" name="noidung"  >
                @if ($gt != null){{$gt->noi_dung}}@endif
                </textarea><br>

                @if($gt->hinh_anh != null)
                <label>Hình ảnh hiện tại</label>
                    <p>
                        <img src="../../../upload/tintuc/{{$gt->hinh_anh}}" alt="Hình ảnh" width="400px" height="250px">
                    </p>
                @endif
                <label>Hình ảnh</label>
                <input type="file" id="hinhanh" name="hinhanh" onChange="showImages.call(this)" /><br/>
                <img id="image" src="" style="display:none;" alt="hinh" height="250px" width="400px">




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
@section('script')
<script>
    $("div.alert").delay(3000).slideUp();
</script>
@endsection
