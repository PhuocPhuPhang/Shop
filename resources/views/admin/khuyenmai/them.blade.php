@extends('admin.layouts.master')
@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm khuyến mãi</h2>
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

                    <form id="demo-form" action="admin/khuyenmai/them" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <label>Tên chương trình khuyến mãi</label>
                        <textarea id="ten" class="form-control inputForm" name="ten"></textarea><br />

                        <label>Hình thức khuyến mãi</label><br>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Giảm giá(theo số tiền)</label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" name="giamgia" id="giamgia" class="form-control col-md-7 col-xs-12 ">
                            </div>
                            <br><br><br>
                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Giảm giá theo %</label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" name="tyle" id="tyle" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Ngày bắt đầu</label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="date" name="batdau" id="batdau" class="form-control col-md-7 col-xs-12 ">
                            </div>

                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Ngày kết thúc</label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="date" name="ketthuc" id="ketthuc" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <label>Hình ảnh</label>
                        <input type="file" id="hinhanh" name="hinhanh" onChange="showImages.call(this)" /> <br />
                        <img id="image" src="" style="display:none;" alt="hinh" height="200px" width="300px">

                        <div class="ln_solid"></div>
                        <div class="form-group" style="margin-left:20%">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="admin/khuyenmai/danhsach">
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

@section('modal')
<!-- <div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm hình thức khuyến mãi</h4>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-4">Tên hình thức</label>
                        <div class="col-md-8">
                            <input type="text" name="hinhthuc_new" id="hinhthuc_new" class="form-control" required />
                        </div>
                    </div>
                    <br />
                    <div class="form-group" align="center">
                        <input type="button" name="action" id="action" class="btn btn-warning" value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
@endsection

@section('script')
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $('#them_hinhthuc').click(function() {
            $('#formModal').modal('show');
        });

        $('#action').click(function() {
            if ($('#action').val() == 'Add') {
                var tenht = $('#hinhthuc_new').val();
                if (tenht != "") {
                    var ten = string_to_slug(change_alias(tenht));

                    var html = `<input type="checkbox" name="hinhthuc[]" id="${ten}" value="${tenht}" class="flat"/>${tenht}<br/>
            <input type="text"  name="${ten}" class="form-control" ><br/>`;
                    $('#ht').append(html);
                    $('#hinhthuc_new').val("");
                } else alert('Vui lòng nhập tên hình thức khuyến mãi');
            }
            $(`.${ten}`).click(function() {
                $(`#${ten}`).remove();
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

    function showImages() {
        if (this.files && this.files[0]) {
            var obj = new FileReader();
            obj.onload = function(data) {
                var image = document.getElementById("image");
                image.src = data.target.result;
                image.style.display = "block";
            }
            obj.readAsDataURL(this.files[0]);
        }
    }

    function change_alias(alias) {
        var str = alias;
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ");
        str = str.replace(/ + /g, " ");
        str = str.trim();
        return str;
    }
</script>
@endsection
