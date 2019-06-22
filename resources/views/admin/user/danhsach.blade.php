@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
    @if( $route->uri == 'admin/user/nhanvien')
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
             <th>STT</th>
             <th>Tên</th>
             <th>Email</th>
             <th>Số điện thoại</th>
             <th>Địa chỉ</th>
             @if( $route->uri == 'admin/user/nhanvien')
                <th style="text-align:center">Thao tác</th>
             @endif
           </tr>
         </thead>
         <tbody>
            @foreach($user as $ng)
           <tr>
             <td>{{ $ng->id }}</td>
             <td>{{ $ng->ten }}</td>
             <td>{{ $ng->email }}</td>
             <td>{{ $ng->so_dien_thoai }}</td>
             <td>{{ $ng->dia_chi }}</td>
             @if($ng->quyen != 0)
             <td style="text-align:center">
                <!-- <a href="" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Chỉnh sửa
                </a> -->
                <a href="../user/xoa/{{$ng->id}}" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash-o"></i> Xóa
                </a>
             </td>
             @endif
             @endforeach
           </tr>
        </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
@endsection
