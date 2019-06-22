@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>CÁC CHÍNH SÁCH</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="{{ url('admin/tintuc/chinhsach/them') }}"><i class="fa fa-plus"></i></a></li>
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
             <th>Title</th>
             <th>Mô tả</th>
             <th style="text-align:center">Thao tác</th>
           </tr>
         </thead>
         <tbody>
         @foreach($chinhsach as $cs)
           <tr>
             <td>{{$cs->id}}</td>
             <td>{{$cs->title}}</td>
             <td>{{$cs->mo_ta}}</td>
             <td style="width:200px">
                <a href="../tintuc/chinhsach/sua/{{$cs->id}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Chỉnh sửa
                </a>
                <a href="../tintuc/chinhsach/xoa/{{$cs->id}}" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash-o"></i> Xóa
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
