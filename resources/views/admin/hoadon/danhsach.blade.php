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
             <button type="button" id="{{$hd->ma_hoa_don}}"  class="btn btn-info btn-xs duyet">
                <i class="fa fa-edit"></i> Duyệt
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
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
        <h4 class="modal-title">Chi tiết hóa đơn</h4>
    </div>
    <div class="modal-body"></div>
    </div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript" language="javascript">
        $(document).ready(function(){
            $('.duyet').click(function(){
                var mahd = $(this).attr('id');
                $.ajax({
                    type:'GET',
                    url: 'duyet/' + mahd,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data:{"mahd":mahd},
                    success: function(data){
                        var hoadon = data['hoadon'];
                        var cthd =  data['cthd'];
                        var tongtien = data['tongtien'];
                        var html =  `<form method="post" id="sample_form" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-form-label">Mã hóa đơn:&nbsp${hoadon['ma_hoa_don']}</label><br>
                                            <label class="col-form-label">Tên người nhận:&nbsp${hoadon['ten_nguoi_nhan']}</label><br>
                                            <label class="col-form-label">Số điện thoại:&nbsp${hoadon['so_dien_thoai']}</label><br>
                                            <label class="col-form-label">Địa chỉ:&nbsp${hoadon['dia_chi']}</label>
                                        </div>
                                        <h5 class="modal-title">Danh sach sản phẩm</h5>
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
                                            <tbody>`;
                                            var i = 1;
                                            for(var k in cthd){
                                        html += `<tr>
                                                    <td style="text-align:center">${i++}</td>
                                                    <td>${cthd[k]['ten_san_pham']}</td>
                                                    <td style="text-align:center">${cthd[k]['so_luong']}</td>
                                                    <td>${cthd[k]['gia_ban']}</td>
                                                    <td>${cthd[k]['so_luong'] * cthd[k]['gia_ban']}</td>
                                                </tr>`;
                                            }
                                    html += `</tbody>
                                            </table>
                                            <label class="col-form-label">Tổng thành tiền:&nbsp${tongtien}</label><br>
                                            <div class="form-group" align="center" id="button">
                                                <input type="button" name="action" id="action" class="btn btn-success" value="Duyệt" onClick="postDuyet()" />
                                            </div>
                                            </form>`;
                        $(".modal-body").append(html);
                    }
                })
                $('#formModal').modal('show');
            });

            $(".modal").on("hidden.bs.modal", function(){
                $(".modal-body").html("");
            });
    });
    function postDuyet(){
        var mahd = $('.duyet').attr('id');
        $.ajax({
                type:'POST',
                url: 'duyet/' + mahd,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data:{"mahd":mahd},
                success: function(data){
                    if(data.data.success)
                    {
                        alert('Duyệt đơn thành công');
                        location.reload();
                    }
                    else{
                        alert('Lỗi');
                    }
                }

        })
    }
</script>
@endsection

