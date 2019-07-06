@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
    @if( $route->uri == 'shop/admin/user/nhanvien')
       <h2>DANH SÁCH NHÂN VIÊN</h2>
    @else
        <h2>DANH SÁCH KHÁCH HÀNG</h2>
    @endif
        <ul class="nav navbar-right panel_toolbox">
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
             <th style="text-align:center">STT</th>
             <th style="text-align:center">Tên</th>
             <th style="text-align:center">Email</th>
             <th style="text-align:center">Số điện thoại</th>
             <th style="text-align:center">Địa chỉ</th>
            <th style="text-align:center">Thao tác</th>
           </tr>
         </thead>
         <tbody>
             <?php $i = 1 ?>
            @foreach($user as $ng)
           <tr>
             <td style="text-align:center">{{$i++}}</td>
             <td>{{ $ng->ten }}</td>
             <td>{{ $ng->email }}</td>
             <td>{{ $ng->so_dien_thoai }}</td>
             <td>{{ $ng->dia_chi }}</td>
             <td style="text-align:center">
             @if( $route->uri != 'shop/admin/user/nhanvien')
             <button type="button" id="{{$ng->id}}" value="{{$ng->id}}" class="btn btn-info btn-xs phanquyen">
                    <i class="fa fa-pencil"></i> Phân quyền
            </button>
             @endif
             @if($ng->quyen != 0)
                <a href="shop/admin/user/xoa/{{$ng->id}}" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash-o"></i> Xóa
                </a>
             </td>
             @endif
             @endforeach
           </tr>
        </tbody>
        </table>
        </div>
    <!-- @if( $route->uri != 'admin/user/nhanvien')
    <a href="download" class="btn btn-success">Xuất File Excel </a>
    @endif -->
    </div>
    </div>
</div>
@endsection


@section('modal')
@if( $route->uri != 'admin/user/nhanvien')
<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cấp quyền quản trị</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" >Quyền quản trị</label>
            <div class="col-md-8">
             <select name="quyen" id="quyen" class="form-control">
                 @foreach($quyen as $phan_quyen)
                 <option value="{{$phan_quyen->id}}">{{$phan_quyen->quyen}}</option>
                 @endforeach
             </select>
            </div>
           </div>
           <br />
           <div class="form-group" align="center" id="button">
            <input type="button" name="action" id="action" class="btn btn-success" value="Cập nhật" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>
@endif
@endsection

@section('script')
    <script type="text/javascript" language="javascript">
        $(document).ready(function(){
            $('.phanquyen').click(function(){
                $('#formModal').modal('show');
            });

            $('#action').click(function(){
                var quyen = $("#quyen").val();
                var id = $(".phanquyen").val();
                $.ajax({
                    type:'POST',
                    url: 'shop/admin/ajax/user/update',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data:{"id":id , "quyen":quyen},
                    success: function(data){
                        if(data.data.success)
                        {
                            alert('Thành công');
                            location.reload();
                        }
                        else
                        {
                            alert('Lỗi');
                        }
                    }
                })
            });
        });
    </script>
@endsection
