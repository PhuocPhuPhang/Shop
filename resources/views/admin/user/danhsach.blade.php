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
            @if( $route->uri == 'admin/user/nhanvien')
            <li><a href="{{ url('') }}"><i class="fa fa-plus"></i></a></li>
            @endif
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
             @foreach($user as $ng)
             @if($ng->quyen != 0)
                <th style="text-align:center">Thao tác</th>
             @endif
           </tr>
         </thead>
         <tbody>

           <tr>
             <td>{{ $ng->ThongTinUser->id }}</td>
             <td>{{ $ng->ThongTinUser->ten }}</td>
             <td>{{ $ng->ThongTinUser->email }}</td>
             <td>{{ $ng->ThongTinUser->so_dien_thoai }}</td>
             <td>{{ $ng->ThongTinUser->dia_chi }}</td>
             @if($ng->quyen != 0)
             <td style="text-align:center">
                <a href="../user/sua/{{$ng->ThongTinUser->id}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Chỉnh sửa
                </a>
                <a href="../user/xoa/{{$ng->ThongTinUser->id}}" class="btn btn-danger btn-xs">
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
