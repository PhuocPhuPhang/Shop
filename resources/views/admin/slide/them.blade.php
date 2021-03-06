@extends('admin.layouts.master')
@section('content')
<div class="">
<div class="clearfix"></div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Thêm slide</h2>
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

            <form id="demo-form" action="shop/admin/slide/them" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <label>Tên</label>
                <input type="text" id="ten" class="form-control" name="ten" /> <br />

                <label>Link</label>
                <input type="text" id="link" class="form-control" name="link" /> <br />

                <label>Hình Ảnh</label>
                <input type="file" id="hinhanh" name="hinhanh" onChange="showImages.call(this)" /><br/>
                <img id="image" src="" style="display:none;" alt="hinh" height="200px" width="300px">
                <br>

                <label>Thứ tự</label>
                @if($thutu != "")
                <input type="number" id="thutu" name="thutu" min="0" value="{{$thutu + 1}}" class="form-control" style="width:7%"/>
                @else
                <input type="number" id="thutu" name="thutu" min="0" value="1" class="form-control" style="width:7%"/>
                @endif

                <div class="ln_solid"></div>
                <div class="form-group" style="margin-left:20%">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="shop/admin/slide/danhsach">
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
@section('script')
<script>
    $("div.alert").delay(3000).slideUp();
</script>
@endsection
