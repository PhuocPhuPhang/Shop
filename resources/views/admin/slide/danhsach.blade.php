@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>Danh sách slide</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="../slide/them"><i class="fa fa-plus"></i></a></li>
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
             <th>STT</th>
             <th>Tên</th>
             <th>Nội dung</th>
             <th>Hình ảnh</th>
             <th>Thao tác</th>
           </tr>
         </thead>
         <tbody>
             @foreach($slide as $sl)
           <tr>
             <td>{{ $sl->thu_tu }}</td>
             <td>{{ $sl->ten }}</td>
             <td>{{ $sl->noi_dung }}</td>
             <td>
                 <img src="../../upload/slide/{{$sl->hinh_anh}}" alt="Hình ảnh" width="300px">
            </td>
             <td>
                <a href="../slide/sua/{{$sl->id}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="../slide/xoa/{{$sl->id}}" class="btn btn-danger btn-xs">
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
