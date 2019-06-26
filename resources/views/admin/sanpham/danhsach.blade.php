@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>Danh sách sản phẩm</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="{{ url('admin/sanpham/them') }}"><i class="fa fa-plus"></i></a></li>
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
             <th>Mã sản phẩm</th>
             <th>Tên sản phẩm</th>
             <th>Nhà cung cấp</th>
             <th>Số lượng</th>
             <th>Màu sắc</th>
             <th>Thao tác</th>
           </tr>
         </thead>
         <tbody>
            @foreach($sanpham as $sp)
           <tr>
             <td>{{$sp->ma_san_pham}}</td>
             <td>{{$sp->ten_san_pham}}</td>
             <td>{{$sp->NhaCungCap->ten_nha_cung_cap}}</td>
             <td>{{$sp->so_luong}}</td>
             <td>
                    <input readonly type="text" style="border:none;height:20px;width:60px;background:{{$sp->mau_sac}}"/>
             </td>
             <td>
                <a href="../sanpham/sua/{{$sp->ma_san_pham}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="" class="btn btn-danger btn-xs">
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
