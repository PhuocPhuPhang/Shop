@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách đơn hàng chờ xử lí</h2>
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
                            <th style="text-align:center">Thao tác</th>
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
                            <td style="text-align:center">
                                <button type="button" id="{{$hd->ma_hoa_don}}" class="btn btn-info btn-xs duyet">
                                    <i class="fa fa-edit"></i> Xem chi tiết
                                </button>
                                <a href="shop/admin/hoadon/huy/{{$hd->ma_hoa_don}}" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash-o"></i> Hủy
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
                <h4 class="modal-title">Chi tiết hóa đơn</h4>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $('.duyet').click(function() {
            var mahd = $(this).attr('id');
            $.ajax({
                type: 'GET',
                url: 'shop/admin/hoadon/duyet/' + mahd,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    "mahd": mahd
                },
                success: function(data) {
                    var hoadon = data['hoadon'];
                    var cthd = data['cthd'];
                    var tongtien = data['tongtien'];
                    var html = `<form method="post" id="sample_form" class="form-horizontal">
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
                    for (var k in cthd) {
                        html += `<tr>
                                                    <td style="text-align:center">${i++}</td>
                                                    <td>${cthd[k]['ten_san_pham']}</td>
                                                    <td style="text-align:center">${cthd[k]['so_luong']}</td>
                                                    <td>${number_format(cthd[k]['gia_ban'])}</td>
                                                    <td>${number_format(cthd[k]['so_luong'] * cthd[k]['gia_ban'])}</td>
                                                </tr>`;
                    }
                    html += `</tbody>
                                            </table>
                                            <label class="col-form-label">Hình thức thanh toán:&nbsp</label><br>
                                            <label class="col-form-label">Tổng thành tiền:&nbsp${number_format(tongtien)}</label><br>
                                            <div class="form-group" align="center" id="button">
                                                <input type="button" name="action" id="action" class="btn btn-success" value="Duyệt đơn hàng" onClick="postDuyet()" />
                                            </div>
                                            </form>`;
                    $(".modal-body").append(html);
                }
            })
            $('#formModal').modal('show');
        });

        $(".modal").on("hidden.bs.modal", function() {
            $(".modal-body").html("");
        });
    });

    function postDuyet() {
        var mahd = $('.duyet').attr('id');
        $.ajax({
            type: 'POST',
            url: 'shop/admin/hoadon/duyet/' + mahd,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                "mahd": mahd
            },
            success: function(data) {
                if (data.data.success) {
                    alert('Duyệt đơn thành công');
                    location.reload();
                } else {
                    alert('Lỗi');
                }
            }

        })
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
</script>
@endsection
