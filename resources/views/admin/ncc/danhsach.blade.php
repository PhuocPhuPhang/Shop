@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>Danh sách nhà cung cấp</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <button type="button" id="them" name="them" style="border:none;background:#fff;margin-top:5px">
                    <i class="fa fa-plus"></i>
                </button>
            </li>
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
             <th>Mã nhà cung cấp</th>
             <th>Tên nhà cung cấp</th>
             <th>Số điện thoại</th>
             <th>Địa chỉ</th>
             <th>Thao tác</th>
           </tr>
         </thead>
         <tbody>
             @foreach($nhacungcap as $ncc)
           <tr>
             <td>{{ $ncc->ma_nha_cung_cap }}</td>
             <td>{{ $ncc->ten_nha_cung_cap }}</td>
             <td>{{ $ncc->so_dien_thoai }}</td>
             <td>{{ $ncc->dia_chi }}</td>
             <td style="text-align:center">
                <a href="../nhacungcap/sua/{{$ncc->ma_nha_cung_cap}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="../nhacungcap/xoa/{{$ncc->ma_nha_cung_cap}}" class="btn btn-danger btn-xs">
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
@section('modal')
<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm nhà cung cấp</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" >Mã nhà cung cấp </label>
            <div class="col-md-8">
             <input type="text" name="ma" id="ma" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Tên nhà cung cấp </label>
            <div class="col-md-8">
             <input type="text" name="ten" id="ten" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Số điện thoại</label>
            <div class="col-md-8">
             <input type="text" name="sdt" id="sdt" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Địa chỉ</label>
            <div class="col-md-8">
             <input type="text" name="diachi" id="diachi" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Logo</label>
            <div class="col-md-8">
             <input type="file" name="image" id="image" />
             <span id="store_image"></span>
            </div>
           </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
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
        $('#them').click(function(){
            $('#formModal').modal('show');
        });
    });
    </script>
@endsection
