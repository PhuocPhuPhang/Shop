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
        <div class="col-md-12 col-sm-12 col-xs-12">
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

                    <label>Chương trình khuyến mãi</label>
                    <select name="khuyenmai" id="khuyenmai" class="form-control">
                        @foreach($khuyenmai as $km)
                            <option value="{{$km->ma_khuyen_mai}}">{{$km->ten_khuyen_mai}}</option>
                        @endforeach
                    </select><br/>

                    <label>Mô tả</label>
                    <textarea id="mota"  class="form-control" name="mota"></textarea><br />

                    <label>Nổi bật &nbsp;&nbsp;</label>
                    <input type="checkbox" class="flat" name="noibat" value="1" ><br/><br/>

                    <label>Keywords</label>
                    <textarea id="keywords"  class="form-control" name="keywords"></textarea><br />

                    <label>Nội dung</label>
                    <textarea id="noidung" class="form-gruop ckeditor" name="noidung" ></textarea><br/>

                    <label>Hình ảnh</label>
                    <input type="file" id="hinhanh" name="hinhanh[]" multiple="multiple" onChange="showImages.call(this)"/><br/>
                    <br/><img id="image" src="" style="display:none;" alt="hinh" height="200px" width="300px">
                </div>
            </div>
        </div>
        </div>

        <div class="row">
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
                <h5>{{$loai->ten}}</h5>
                <div id="{{str_slug($loai->ten)}}" class="x_content">
                    @foreach($cauhinh as $ch)
                        @if($ch->id_loai == $loai->id)
                        <label>{{$ch->cau_hinh}}</label>
                        <input type="text"  class="form-control" name="{{$ch->ten_khong_dau}}" /><br />
                        @endif
                    @endforeach
                </div>
            @endforeach

        </div>
        </div>
        </div>


        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- <div class="x_panel"> -->
                <div class="x_content">
                <!-- <div class="ln_solid"></div> -->
                    <div class="form-group" style="margin-left:20%">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ url('admin/sanpham/danhsach') }}">
                                <button class="btn btn-primary" type="button">Cancel</button>
                            </a>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success" onclick="javascript:alert($('#demo-form').serialize())">Save</button>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
        </div>
    </form>
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
            <label class="control-label col-md-4" >Loại cấu hình</label>
            <div class="col-md-8">
             <select name="loaicauhinh" id="loaicauhinh" class="form-control">
                 @foreach($loaicauhinh as $loai)
                 <option value="{{$loai->id}}">{{$loai->ten}}</option>
                 @endforeach
             </select>
            </div>
           </div>

           <div class="form-group" id="listch">
            <label class="control-label col-md-4" >Cấu hình mặc định</label>
            <div class="col-md-8">
             <select name="list_cauhinh" id="list_cauhinh"  class="form-control">
             </select>
            </div>
           </div>

           <div class="form-group">
                        <label class="control-label col-md-4" >Tên cấu hình mới</label>
                        <div class="col-md-8">
                            <input type="text" name="cauhinh" id="cauhinh" class="form-control" required/>
                        </div>
                    </div>

<div id="cauhinh"></div>

           <br />
           <div class="form-group" align="center" id="button">
            <input type="button" name="action" id="action" class="btn btn-success" value="Add" />
            <input type="reset" name="action" id="action_reset" class="btn btn-warning" value="Reset" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $('#them_cauhinh').click(function(){
            $('#formModal').modal('show');
        });

        $("#loaicauhinh").change(function(){
            var idloaiCH = $(this).val();
            $.get("../ajax/cauhinh/" + idloaiCH,function(data){
                $("#list_cauhinh").html(data);
            });
        });

        $('#action').click(function(){

            if($('#action').val() == 'Add')
            {
                var loaich = $('#loaicauhinh').val();
                var cauhinh = $('#list_cauhinh').val();
                var cauhinh_new = $('#cauhinh').val();

                if(cauhinh != null && cauhinh != 0 )
                {
                    var tenkhongdau = string_to_slug(change_alias(cauhinh));
                    switch (loaich) {
                    @foreach($loaicauhinh as $loai)
                    case "{{$loai->id}}":{
                         var html = `<label>${cauhinh}</label>
                                    <input type="text"  class="form-control" name="${tenkhongdau}" /><br />`;
                        $('#{{str_slug($loai->ten)}}').append(html);
                    }break;
                    @endforeach
                    default:
                        break;
                    }
                }
                if(cauhinh_new != null)
                {
                    var tenkhongdau_new = string_to_slug(change_alias(cauhinh_new));
                    switch (loaich) {
                    @foreach($loaicauhinh as $loai)
                    case "{{$loai->id}}":{
                         var html = `<label>${cauhinh_new}</label>
                                    <input type="text"  class="form-control" name="${tenkhongdau_new}" /><br />`;
                        $('#{{str_slug($loai->ten)}}').append(html);
                    }break;
                    @endforeach
                    default:
                        break;
                    }

                }
            }
            else alert('Lỗi');
            // $(`.${ten}`).click(function(){
            //    $(`#${ten}`).remove();
            // });


        });
        function string_to_slug (str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to   = "aaaaeeeeiiiioooouuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        return str;
        }
    });
    function showImages(){
            if(this.files && this.files[0]){
                var obj = new FileReader();
                obj.onload = function(data){
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
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
        str = str.replace(/đ/g,"d");
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
        str = str.replace(/ + /g," ");
        str = str.trim();
        return str;
        }
    </script>
@endsection
