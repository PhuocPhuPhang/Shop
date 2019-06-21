@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>DANH SÁCH TIN TỨC</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="{{ url('admin/tintuc/them') }}"><i class="fa fa-plus"></i></a></li>
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
             <th>Thể loại</th>
             <th>Mô tả</th>
             <th>Nội dung</th>
             <th>Nổi bật</th>
             <th style="text-align:center">Thao tác</th>
           </tr>
         </thead>
         <tbody>
         @foreach($tintuc as $tin)
           <tr>
             <td>{{$tin->id}}</td>
             <td>{{$tin->ten}}</td>
             <td>{{$tin->LoaiTinTuc->ten}}</td>
             <td>{{$tin->mo_ta}}</td>
             <td>{{$tin->noi_dung}}</td>
             <td style="text-align:center">
                 <input type="checkbox" class="flat" @if($tin->noi_bat)
                        {{"checked"}}
                    @endif><br/>
             </td>
             <td style="text-align:center">
                <a href="../tintuc/sua/{{$tin->id}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Chỉnh sửa
                </a>
                <a href="../tintuc/xoa/{{$tin->id}}" class="btn btn-danger btn-xs">
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

@section('script')
    <script>
        $(document).ready(function(){
            $("input::checkbox").change(function(){
               var id = $(this).val();
               $.ajax({
                   type:'POST',
                   url:'/Activation',
                   headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'},
                   data:{"id":id},
                   success: function(data){
                       if(data.data.success)
                       {
                        // Đang lỗi
                       }
                   }
               });
            });
        });
    </script>
@endsection
