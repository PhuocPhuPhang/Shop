@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="row">
 <div class="col-md-12 col-sm-12 col-xs-12">
   <div class="x_panel">
     <div class="x_title">
       <h2>Danh sách nhà cung cấp</h2>
       <div class="clearfix"></div>
     </div>
     <div class="x_content">
       <table id="datatable-buttons" class="table table-striped table-bordered">
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
           <tr>
             <td>Tiger Nixon</td>
             <td>System Architect</td>
             <td>Edinburgh</td>
             <td>61</td>
             <td>
                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
             </td>
           </tr>
           <tr>
             <td>Tiger Nixon</td>
             <td>System Architect</td>
             <td>Edinburgh</td>
             <td>60</td>
             <td>
                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
             </td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>
@endsection
