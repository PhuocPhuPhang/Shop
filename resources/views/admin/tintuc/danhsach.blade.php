@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>DANH SÁCH TIN TỨC</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="shop/admin/tintuc/them"><i class="fa fa-plus"></i></a></li>
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
             <th style="text-align:center">Tiêu đề</th>
             <th style="text-align:center">Mô tả</th>
             <th style="text-align:center">Nổi bật</th>
             <th style="text-align:center">Hiển thị</th>
             <th style="text-align:center">Thao tác</th>
           </tr>
         </thead>
         <tbody>
        <?php $i = 1 ?>
         @foreach($tintuc as $tin)
           <tr>
             <td style="text-align:center">{{$i++}}</td>
             <td>{{$tin->title}}</td>
             <td>{{$tin->mo_ta}}</td>
             <td style="text-align:center">
                 <input id="{{$tin->id}}" type="checkbox" name="noibat" class="flat" @if($tin->noi_bat)
                        {{"checked"}}
                    @endif><br/>
             </td>
             <td style="text-align:center">
                 <input id="{{$tin->id}}" type="checkbox" name="hienthi" class="flat " @if($tin->hien_thi)
                        {{"checked"}}
                    @endif><br/>
             </td>

             <td style="text-align:center">
                <a href="shop/admin/tintuc/sua/{{$tin->id}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Chỉnh sửa
                </a>
                <a href="shop/admin/tintuc/xoa/{{$tin->id}}" class="btn btn-danger btn-xs">
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
    <script type="text/javascript" language="javascript">
        $(document).ready(function(){
            $(".flat").on('ifChanged', function(event) {
                var id = $(this).closest('.flat').attr('id');
                var col = $(this).closest('.flat').attr('name');
                $.ajax({
                    type:'POST',
                    url: 'shop/admin/ajax/tintuc/update',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data:{"id":id,"col":col},
                    success: function(data){
                        if(data.data.success)
                        {
                            alert('Thành công');
                        }
                        else
                        {
                            alert('Lỗi');
                        }
                    }
                })
                });
        });
    $("div.alert").delay(3000).slideUp();
    </script>
@endsection
