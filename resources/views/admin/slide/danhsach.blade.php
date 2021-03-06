@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>Danh sách slide</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="shop/admin/slide/them"><i class="fa fa-plus"></i></a></li>
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
             <th style="text-align:center">Tên</th>
             <th style="text-align:center">Hình ảnh</th>
             <th style="text-align:center">Hiển thị</th>
             <th style="text-align:center">Thao tác</th>
           </tr>
         </thead>
         <tbody>
             @foreach($slide as $sl)
           <tr>
             <td style="vertical-align: middle;text-align:center">
                <input type="text" id="{{$sl->id}}" value="{{$sl->thu_tu}}" style="width:50px;height:30px;text-align:center">
            </td>
             <td style="vertical-align: middle;text-align:center">{{ $sl->ten }}</td>
             <td style="text-align:center">
                 <img src="../../upload/slide/{{$sl->hinh_anh}}" alt="Hình ảnh" width="250px" height="150px">
            </td>
            <td style="text-align:center;vertical-align: middle;">
                 <input id="{{$sl->id}}" type="checkbox" class="flat" @if($sl->hien_thi)
                        {{"checked"}}
                    @endif><br/>
             </td>
             <td style="text-align:center;vertical-align:middle;">
                <a href="shop/admin/slide/sua/{{$sl->id}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Chỉnh sửa
                </a>
                <a href="shop/admin/slide/xoa/{{$sl->id}}" class="btn btn-danger btn-xs">
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
                event.preventDefault();
                var id = $(this).closest('.flat').attr('id');
                $.ajax({
                    type:'POST',
                    url: 'shop/admin/ajax/media/update/hienthi',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data:{"id":id,"type":"slide"},
                    success: function(data){
                        if(data.data.success)
                        {
                            alert('Cập nhật thành công');
                        }
                        else
                        {
                            alert('Lỗi');
                        }
                    }
                })
                });

            $("input[type=text]").on("change",function(){
                var id = $(this).attr('id');
                var thutu = $(this).val();
                $.ajax({
                    type:'POST',
                    url: 'shop/admin/ajax/slide/update/thutu',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data:{"id":id,"thutu":thutu},
                    success: function(data){
                        if(data.data.success)
                        {
                            alert('Cập nhật thành công');
                            location.reload();
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
