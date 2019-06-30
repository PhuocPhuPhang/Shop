@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>Danh sách sản phẩm</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="admin/sanpham/cauhinh/them"><i class="fa fa-plus"></i></a></li>
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown"></li>
        </ul>
       <div class="clearfix"></div>
     </div>
        <div class="x_content">
        @if(session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
        @endif

       <label>Cấu hình</label>
        <select name="loaicauhinh" id="loaicauhinh" style="width:150px">
        <option value="0">Tất cả</option>
            @foreach($loaicauhinh as $loai)
                <option value="{{$loai->id}}">{{$loai->ten}}</option>
            @endforeach
        </select>
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
           <tr>
             <th style="text-align:center">STT</th>
             <th style="text-align:center">Cấu hình</th>
             <th style="text-align:center">Thao tác</th>
           </tr>
         </thead>
         <tbody>
             <?php $i = 1?>
            @foreach($cauhinh as $ch)
           <tr>
             <td style="text-align:center">{{$i++}}</td>
             <td>{{$ch->cau_hinh}}</td>
             <td style="text-align:center">
                <a href="admin/sanpham/cauhinh/sua/{{$ch->id}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="admin/sanpham/cauhinh/xoa/{{$ch->id}}" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash-o"></i> Delete
                </a>
             </td>
           </tr>
            @endforeach
         </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $("#loaicauhinh").change(function(){
            var idloaiCH = $(this).val();
            if(idloaiCH != 0)
            {
                $.get("../../ajax/loaicauhinh/" + idloaiCH,function(data){
                $("#datatable").html(data);
                 });
            }
           else location.reload();
        });
    });
</script>
@endsection
