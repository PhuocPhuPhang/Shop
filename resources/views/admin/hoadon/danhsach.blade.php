@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>DANH SÁCH NHÀ CUNG CẤP</h2>
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
             <th style="text-align:center">Mã hóa đơn</th>
             <th style="text-align:center">Tên người nhận</th>
             <th style="text-align:center">Số điện thoại</th>
             <th style="text-align:center">Địa chỉ</th>
             <th  style="text-align:center">Thao tác</th>
           </tr>
         </thead>
         <tbody>
             <?php $i = 1 ?>
             @foreach($hoadon as $hd)
           <tr>
             <td style="text-align:center">{{$i++}}</td>
             <td>{{ $hd->ma_hoa_don}}</td>
             <td>{{ $hd->ten_nguoi_nhan}}</td>
             <td>{{ $hd->so_dien_thoai}}</td>
             <td>{{ $hd->dia_chi }}</td>
             <td style="text-align:center">
             <button type="button" id="duyet" value="{{$hd->ma_hoa_don}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Duyệt
            </button>
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
          <h4 class="modal-title">Chi tiết hóa đơn</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal">
          @csrf
                <label style="padding-right:5px">Mã hóa đơn:</label><label id="mahd">{{$hd->ma_hoa_don}}</label><br>
                <label>Tên người nhận: {{$hd->ten_nguoi_nhan}}</label><br/>
                <label>Số điện thoại: {{$hd->so_dien_thoai}}</label><br/>
                <label>Địa chỉ: {{$hd->dia_chi}}</label>

            <h5 class="modal-title">Danh sách sản phẩm</h5>
            <table id="classTable" class="table table-bordered">
                <thead>
                <tr>
                    <th style="text-align:center">STT</th>
                    <th style="text-align:center">Tên sản phẩm</th>
                    <th style="text-align:center">Số lượng</th>
                    <th style="text-align:center">Đơn giá</th>
                    <th style="text-align:center">Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @foreach($chitiethoadon as $ct)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$ct->SanPham->ten_san_pham}}</td>
                        <td style="text-align:center">{{$ct->so_luong}}</td>
                        <td>{{$ct->SanPham->gia_ban}}</td>
                        <td>{{ $ct->so_luong * $ct->SanPham->gia_ban}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <label>Tổng thành tiền:</label><br/>
            <label>Hình thức thanh toán: </label>
           <div class="form-group" align="center" id="button">
            <input type="button" name="action" id="action" class="btn btn-success" value="Duyệt" />
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
        $('#duyet').click(function(){
                $('#formModal').modal('show');
            });

        $('#action').click(function(){
            var mahd = document.getElementById('mahd').textContent;
            $.ajax({
                type:'post',
                url: 'duyet/'+ mahd,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data:{"mahd":mahd},
            })
        });
    });
</script>
@endsection
