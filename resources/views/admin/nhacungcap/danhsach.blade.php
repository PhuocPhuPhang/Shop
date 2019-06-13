@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>Danh sách nhà cung cấp</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="{{ url('admin/nhacungcap/them') }}"><i class="fa fa-plus"></i></a></li>
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
