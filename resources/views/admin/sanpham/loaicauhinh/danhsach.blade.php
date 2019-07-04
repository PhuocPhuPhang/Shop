@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>Danh sách loại cấu hình</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <button type="button" name="them_loaicauhinh" id="them_loaicauhinh" style="background:#fff;border:none;margin-top:5px">
                    <i class="fa fa-plus"></i>
                </button>
            </li>
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
            @foreach($loaicauhinh as $lch)
           <tr>
             <td style="text-align:center">{{$i++}}</td>
             <td>{{$lch->ten}}</td>
             <td style="text-align:center">
                <a href="admin/sanpham/loaicauhinh/sua/{{$lch->id}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Chỉnh sửa
                </a>
                <a href="admin/sanpham/loaicauhinh/xoa/{{$lch->id}}" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash-o"></i> Xóa
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
@section('modal')
<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm loại cấu hình sản phẩm</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal">
          @csrf
           <div class="form-group">
                <label class="control-label col-md-4" >Tên loại cấu hình mới</label>
                    <div class="col-md-8">
                        <input type="text" name="loaicauhinh" id="loaicauhinh" class="form-control" required/>
                    </div>
                 </div>
           <br />
           <div class="form-group" align="center" id="button">
            <input type="button" name="action" id="action" class="btn btn-success" value="Lưu" />
            <!-- <input type="reset" name="action" id="action_reset" class="btn btn-warning" value="Reset" /> -->
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
        $('#them_loaicauhinh').click(function(){
            $('#formModal').modal('show');
        });


    });
</script>
@endsection
