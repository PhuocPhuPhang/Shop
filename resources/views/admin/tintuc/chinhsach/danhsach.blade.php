@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>Danh sách các chính sách</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="shop/admin/tintuc/chinhsach/them"><i class="fa fa-plus"></i></a></li>
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
             <th style="text-align:center;width:10%">STT</th>
             <th style="text-align:center">Tiêu đề</th>
             <th style="text-align:center">Hiển thị</th>
             <th style="text-align:center">Thao tác</th>
           </tr>
         </thead>
         <tbody>
        <?php $i = 1 ?>
         @foreach($chinhsach as $cs)
           <tr>
             <td style="text-align:center">{{$i++}}</td>
             <td>{{$cs->title}}</td>
             <td style="text-align:center">
                 <input id="{{$cs->id}}" type="checkbox" class="flat" @if($cs->hien_thi)
                        {{"checked"}}
                    @endif><br/>
             </td>
             <td style="width:200px;text-align:center">
                <a href="shop/admin/tintuc/chinhsach/sua/{{$cs->id}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Chỉnh sửa
                </a>
                <a href="shop/admin/tintuc/chinhsach/xoa/{{$cs->id}}" class="btn btn-danger btn-xs">
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
                $.ajax({
                    type:'POST',
                    url: 'shop/admin/ajax/tintuc/chinhsach/update',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data:{"id":id},
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
