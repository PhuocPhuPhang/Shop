@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
       <h2>DANH SÁCH NHÀ CUNG CẤP</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="admin/nhacungcap/them"><i class="fa fa-plus"></i></a></li>
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
             <th style="text-align:center">STT</th>
             <th style="text-align:center">Mã nhà cung cấp</th>
             <th style="text-align:center">Tên nhà cung cấp</th>
             <th style="text-align:center">Số điện thoại</th>
             <th style="text-align:center">Địa chỉ</th>
             <th style="text-align:center">Hiển thị</th>
             <th  style="text-align:center">Thao tác</th>
           </tr>
         </thead>
         <tbody>
             <?php $i = 1 ?>
             @foreach($nhacungcap as $ncc)
           <tr>
             <td style="text-align:center">{{$i++}}</td>
             <td>{{ $ncc->ma_nha_cung_cap }}</td>
             <td>{{ $ncc->ten_nha_cung_cap }}</td>
             <td>{{ $ncc->so_dien_thoai }}</td>
             <td>{{ $ncc->dia_chi }}</td>
             <td style="text-align:center">
                 <input id="{{$ncc->ma_nha_cung_cap}}" type="checkbox" class="flat" @if($ncc->hien_thi)
                        {{"checked"}}
                    @endif><br/>
             </td>
             <td style="text-align:center">
                <a href="admin/nhacungcap/sua/{{$ncc->ma_nha_cung_cap}}" class="btn btn-info btn-xs">
                    <i class="fa fa-pencil"></i> Chỉnh sửa
                </a>
                <a href="admin/nhacungcap/xoa/{{$ncc->ma_nha_cung_cap}}" class="btn btn-danger btn-xs">
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
                var mancc = $(this).closest('.flat').attr('id');
                $.ajax({
                    type:'POST',
                    url: 'admin/ajax/nhacungcap/hienthi',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data:{"mancc":mancc},
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
    </script>
@endsection


