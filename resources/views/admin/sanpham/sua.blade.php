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
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm sản phẩm</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã sản phẩm</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="ma" id="ma" value="{{$sanpham->ma_san_pham}}" readonly class="form-control col-md-7 col-xs-12 inputForm">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên sản phẩm</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="ten" id="ten" value="{{$sanpham->ten_san_pham}}" class="form-control col-md-7 col-xs-12 inputForm">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nhà cung cấp</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <Select class="form-control inputForm " name="nhacungcap" id="nhacungcap">
                                @foreach($nhacungcap as $ncc)
                                <option value="{{$ncc->ma_nha_cung_cap}}">{{$ncc->ten_nha_cung_cap}}</option>
                                @endforeach
                            </Select>
                        </div>

                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Màu sắc</label>
                        <div class="col-md-2 col-sm-6 col-xs-12 input-group demo2">
                            <input type="text" id="mausac" name="mausac" value="red" value="{{$sanpham->mau_sac}}" class="form-control col-md-6 col-xs-12 inputForm" style="margin-left:10px" />
                            <span class="input-group-addon" style="padding-left:20px"><i></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="text" name="soluong" id="soluong" value="{{$sanpham->so_luong}}" class="form-control col-md-7 col-xs-12 inputForm">
                        </div>

                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Giá bán</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="text" name="giaban" id="giaban" value="{{$sanpham->gia_ban}}" class="form-control col-md-7 col-xs-12 inputForm">
                        </div>
                    </div>

                    <label>Mô tả</label>
                    <textarea id="mota" class="form-control inputForm" name="mota">{{$sanpham->noi_dung}}</textarea><br />

                    <label>Hình hiện tại</label>
                    <p>
                        @foreach($hinhanh as $hinh)
                        @if($hinh->hinh_anh != "")
                        <img src="../../upload/sanpham/hinhanhkhac/{{$hinh->hinh_anh}}" alt="hình" width="150px" ;height="100px">
                        <button type="button" class="dz-error-mark image" id="{{$hinh->id}}"><i>✘</i></button>
                        @endif
                        @endforeach
                    </p>
                    <label>Hình ảnh khác</label>
                    <form action="#" class="dropzone" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form><br>
                    <label>Nội dung</label>
                    <textarea id="noidung" class="form-gruop ckeditor inputForm" name="noidung">{{$sanpham->noi_dung}}</textarea><br />
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
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
                @foreach($loaicauhinh as $loai)
                <div id="{{str_slug($loai->ten)}}" class="x_content form-group ">
                    <h4 style="font-size:18px">{{$loai->ten}}</h4>
                    @foreach($thongtin_sp as $tt)
                    @if($tt->id_loai == $loai->id)
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:right">{{$tt->cau_hinh}}</label>
                    <div class="col-md-8 col-sm-6 col-xs-12" style="margin-bottom:10px">
                        <input type="text" name="{{$tt->ten_khong_dau}}" id="{{$tt->ten_khong_dau}}" value="{{$tt->mo_ta}}" class="form-control col-md-7 col-xs-12 inputForm">
                    </div>
                    @endif
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title" style="border-bottom:none">
                    <div class="form-group" style="margin-left:20%">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="admin/sanpham/danhsach">
                                <button class="btn btn-primary" type="button">Hủy</button>
                            </a>
                            <button class="btn btn-primary" type="reset">Làm mới</button>
                            <button id="btnSubmit" type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm cấu hình sản phẩm</h4>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-4">Loại cấu hình</label>
                        <div class="col-md-8">
                            <select name="loaicauhinh" id="loaicauhinh" class="form-control">
                                @foreach($loaicauhinh as $loai)
                                <option value="{{$loai->id}}">{{$loai->ten}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="listch">
                        <label class="control-label col-md-4">Cấu hình mặc định</label>
                        <div class="col-md-8">
                            <select name="list_cauhinh" id="list_cauhinh" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Tên cấu hình mới</label>
                        <div class="col-md-8">
                            <input type="text" name="cauhinh" id="cauhinh" class="form-control" required />
                        </div>
                    </div>
                    <br />
                    <div class="form-group" align="center" id="button">
                        <input type="button" name="action" id="action" class="btn btn-success" value="Lưu" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        $('#them_cauhinh').click(function() {
            $('#formModal').modal('show');
        });

        $("#loaicauhinh").change(function() {
            var idloaiCH = $(this).val();
            $.get("admin/ajax/cauhinh/" + idloaiCH, function(data) {
                $("#list_cauhinh").html(data);
            });
        });

        $('#action').click(function() {

            var loaich = $('#loaicauhinh').val();
            var cauhinh = $('#list_cauhinh').val();
            var cauhinh_new = $('#cauhinh').val();

            if (cauhinh != "" && cauhinh != 0) {
                var tenkhongdau = string_to_slug(change_alias(cauhinh));
                switch (loaich) {
                    @foreach($loaicauhinh as $loai)
                    case "{{$loai->id}}": {
                        var html = `<label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:right">${cauhinh}</label>
                                <div class="col-md-8 col-sm-6 col-xs-12"  style="margin-bottom:10px">
                                    <input type="text" name="${tenkhongdau}" id="${tenkhongdau}" class="form-control col-md-7 col-xs-12 inputForm">
                                </div>`;
                        $('#{{str_slug($loai->ten)}}').append(html);
                    }
                    break;
                    @endforeach
                default:
                    break;
                }
                $("#list_cauhinh").html("");

            }
            if (cauhinh_new != "") {
                var tenkhongdau_new = string_to_slug(change_alias(cauhinh_new));

                $.ajax({
                    type: 'post',
                    url: '../ajax/cauhinh/them',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        "loaich": loaich,
                        "cauhinh_new": cauhinh_new
                    },
                    success: function(data) {
                        if (data.data.success) {
                            console.log('Thành công');
                        } else {
                            console.log('Lỗi');
                        }
                    }
                })

                switch (loaich) {
                    @foreach($loaicauhinh as $loai)
                    case "{{$loai->id}}": {
                        var html = `<label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:right">${cauhinh}</label>
                                <div class="col-md-8 col-sm-6 col-xs-12"  style="margin-bottom:10px">
                                    <input type="text" name="${tenkhongdau}" id="${tenkhongdau}" class="form-control col-md-7 col-xs-12 inputForm">
                                </div>`;
                        $('#{{str_slug($loai->ten)}}').append(html);
                    }
                    break;
                    @endforeach
                default:
                    break;
                }
                $("#cauhinh").html("");
            }
        });

        $(".dropzone").dropzone({
            parallelUploads: 10,
            uploadMultiple: true,
        });

        $("#btnSubmit").click(function(event) {
            var tensp = document.getElementById('ten').value;
            var masp = document.getElementById('ma').value;
            var array = [];
            if (tensp != "") {
                $('.inputForm').each(function(index, input) {
                    let name, value;
                    key = $(input).attr('name');
                    value = $(input).val();
                    let arr = {};
                    if (value != "") {
                        arr[key] = value;
                    } else {
                        arr[key] = null;
                    }
                    array.push(arr);
                });
                $.ajax({
                    type: 'post',
                    url: 'admin/sanpham/sua/' + masp,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        contentType: "application/json",
                    },
                    data: {
                        "mang": array
                    },
                    success: function(data) {
                        if (data.data.success == 1) {
                            alert('Thành công');
                            location.reload();
                        }
                    }
                });
            } else {
                alert('Vui lòng kiểm tra lại mã sản phẩm và tên sản phẩm ');
            }
        });

        $(".image").click(function(event) {
            var id = $(this).attr('id');
            $.ajax({
                type: 'post',
                url: 'admin/sanpham/hinhanh/xoa/' + id,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    contentType: "application/json",
                },
                data: {
                    "id": id
                },
                success: function(data) {
                    if (data.data.success == 1) alert(1);
                }
            });
        });

        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaeeeeiiiioooouuuunc------";
            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }
            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }
    });
</script>
@endsection
