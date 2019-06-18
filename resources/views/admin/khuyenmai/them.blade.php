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

            <form id="demo-form" action="{{ url('/admin/khuyenmai/them') }}" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <label>Tên khuyến mãi</label>
                <textarea id="ten" name="ten" style="padding:0;width:100%;vertical-align:middle" ></textarea><br/>

                <label>Hình thức khuyến mãi</label><br/>
                <!-- <input type="checkbox" name="hinhthuc[]" id="hinhthuc1" value="Giảm giá" class="flat" /> Giảm giá<br/>
                <input type="text" id="ten" name="noidung_ht" class="form-control" ><br/> -->
                <div id="ht" class="flat"></div>
                <button type="button" name="them_hinhthuc" id="them_hinhthuc" style="border:none;background:#fff">Thêm...</button><br/>

                <label>Ngày bắt đầu</label>
                <input type="date" id="batdau" class="form-control" style="width:20%" name="batdau" /> <br />

                <label>Ngày kết thúc</label>
                <input type="date" id="ketthuc"class="form-control" style="width:20%" name="ketthuc"  /> <br />

                <label>Hình ảnh</label>
                <input type="file" id="hinhanh" name="hinhanh" /> <br />

                <div class="ln_solid"></div>
                <div class="form-group" style="margin-left:20%">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="{{ url('admin/khuyenmai/danhsach') }}">
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

@section('modal')
<div id="formModal" class="modal fade" role="dialog">
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
             <input type="text" name="hinhthuc_new" id="hinhthuc_new" class="form-control" required/>
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
        $('#them_hinhthuc').click(function(){
            $('#formModal').modal('show');
        });

        $('#action').click(function(){
            if($('#action').val() == 'Add')
            {
                var tenht = $('#hinhthuc_new').val();
                var ten = string_to_slug(tenht);

                var html =`<input type="checkbox" name="hinhthuc[]" id="${ten}" value="${tenht}" class="flat"/>${tenht}<br/>
                            <input type="text"  name="${tenht}" class="form-control" ><br/>`;
                $('#ht').append(html);
                $('#hinhthuc_new').val("");
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
