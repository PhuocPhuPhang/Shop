@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>Danh sách khuyến mãi</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="{{ url('admin/khuyenmai/them') }}"><i class="fa fa-plus"></i></a></li>
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
             <th>Tên khuyến mãi</th>
             <th>Nội dung</th>
             <th>Ngày bắt đẩu</th>
             <th>Ngày kết thúc</th>
             <th>Thao tác</th>
           </tr>
         </thead>
         <tbody>
            @foreach($khuyenmai as $km)
           <tr>
             <td>{{$km->ten_khuyen_mai}}</td>
             <td>{{$km->noi_dung}}</td>
             <td>{{$km->ngay_bat_dau}}</td>
             <td>{{$km->ngay_ket_thuc}}</td>
             <td>
                <a href="../khuyenmai/sua/{{$km->id}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="../khuyenmai/xoa/{{$km->id}}" class="btn btn-danger btn-xs">
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

@section('script')
<script>
    $("div.alert").delay(3000).slideUp();
</script>
@endsection
