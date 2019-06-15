@extends('admin.layouts.master')
@section('content')
<?php var_dump($name)?>
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

                    <label>Mô tả</label>
                    <textarea id="mota"  class="form-control" name="mota"></textarea><br />

                    <label>Nổi bật &nbsp;&nbsp;</label>
                    <input type="checkbox" class="flat" name="noibat" value="1" ><br/><br/>

                    <label>Keywords</label>
                    <textarea id="keywords"  class="form-control" name="keywords"></textarea><br />

                    <label>Nội dung</label>
                    <textarea id="noidung" class="form-gruop ckeditor" name="noidung" ></textarea><br/>

                    <label>Hình đại diện</label>
                    <input type="file" id="hinhanh" name="hinhanh[]" multiple="multiple" onChange="showImages.call(this)"/><br/>
                    <br/><img id="image" src="" style="display:none;" alt="hinh" height="200px" width="300px">
                </div>
            </div>
        </div>

        @foreach($loaicauhinh as $loai)
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="x_panel">
                <div class="x_title">
                <h2>{{$loai->ten}}</h2>
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

                <div class="x_content">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    @foreach($cauhinh as $ch)
                        @if($ch->id_loai == $loai->id)
                        <label>{{$ch->cau_hinh}}</label>
                        <input type="text"  class="form-control" name="{{$ch->ten_khong_dau}}" /><br />
                        @endif
                    @endforeach
                    <div id="{{str_slug($loai->ten)}}"></div>
                </div>
            </div>
        </div>
        @endforeach

        </div>

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
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                <!-- </div> -->
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
             <select name="loaicauhinh" id="loaicauhinh" onChange="getLoai()">
                 @foreach($loaicauhinh as $loai)
                 <option value="{{str_slug($loai->ten)}}">{{$loai->ten}}</option>
                 @endforeach
             </select>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Tên cấu hình</label>
            <div class="col-md-8">
             <input type="text" name="cauhinh" id="cauhinh" class="form-control" required/>
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
</div>
@endsection

@section('script')
    <script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $('#them_cauhinh').click(function(){
            $('#formModal').modal('show');
        });

        $('#action').click(function(){
            if($('#action').val() == 'Add')
            {
                var loaich = $('#loaicauhinh').val();
                var cauhinh = $('#cauhinh').val();
                var ten = string_to_slug(cauhinh);
                var html = `<div id="${ten}" class="cauhinh"> <label name="">${cauhinh}</label><br/>
                            <div> <input  name="${ten}" style="width:95%"></input>
                            <input type="button" class="${ten}"  value="x" />`;

                switch (loaich) {
                    @foreach($loaicauhinh as $loai)
                    case "{{str_slug($loai->ten)}}":
                        $('#{{str_slug($loai->ten)}}').append(html);
                        break;
                    @endforeach

                    default:
                        break;
                }
            }
            else alert('Lỗi');

            $(`.${ten}`).click(function(){
               $(`#${ten}`).remove();
            });
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
    </script>
@endsection