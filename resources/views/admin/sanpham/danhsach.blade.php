@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>Danh sách sản phẩm</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="admin/sanpham/them"><i class="fa fa-plus"></i></a></li>
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
             <th style="text-align:center">Mã sản phẩm</th>
             <th style="text-align:center">Tên sản phẩm</th>
             <th style="text-align:center">Nhà cung cấp</th>
             <th style="text-align:center">Số lượng</th>
             <th style="text-align:center">Màu sắc</th>
             <th style="text-align:center">Trạng thái</th>
             <th style="text-align:center">Thao tác</th>
           </tr>
         </thead>
         <tbody>
             <?php $i = 1 ;?>
            @foreach($sanpham as $sp)
           <tr>
             <td style="text-align:center">{{$i++}}</td>
             <td style="text-align:center">{{$sp->ma_san_pham}}</td>
             <td>{{$sp->ten_san_pham}}</td>
             <td style="text-align:center">{{$sp->NhaCungCap->ten_nha_cung_cap}}</td>
             <td style="text-align:center">{{$sp->so_luong}}</td>
             <td style="text-align:center">
                    <input readonly type="text" style="border:none;height:20px;width:60px;background:{{$sp->mau_sac}}"/>
             </td>

            @if($sp->so_luong > 0 && $sp->da_xoa == 0  )
             <td style="text-align:center">Còn hàng</td>
            @elseif($sp->so_luong > 0 && $sp->da_xoa != 0 )
            <td style="text-align:center">Tạm ngưng</td>
            @else
            <td style="text-align:center">Hết hàng</td>
            @endif


             @if($sp->da_xoa == 0 )
             <td style="text-align:center">
                <a href="admin/sanpham/sua/{{$sp->ma_san_pham}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Chỉnh sửa
                </a>
                <a href="admin/sanpham/xoa/{{$sp->ma_san_pham}}" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash-o"></i> Tạm ngưng
                </a>
             </td>
             @else
             <td style="text-align:center">
                <a href="admin/sanpham/update/{{$sp->ma_san_pham}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Kích hoạt
                </a>
             </td>
            @endif
           </tr>
            @endforeach
         </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
@endsection
