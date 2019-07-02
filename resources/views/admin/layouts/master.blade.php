<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="images/favicon.ico" type="image/ico" />

<title>Gentelella Alela! | </title>
<base href="{{asset('')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

<!-- Bootstrap -->
<link href="admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="admin/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- bootstrap-progressbar -->
<link href="admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- JQVMap -->
<link href="admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
<!-- bootstrap-daterangepicker -->
<link href="admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="admin/build/css/custom.min.css" rel="stylesheet">
<!-- Datatables -->
<link href="admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
 <!-- Switchery -->
 <link href="admin/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!--Color Picker-->
 <link href="admin/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<!--DropZone -->
<link href="admin/dropzone.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('admin.layouts.menu')
        @include('admin.layouts.header')
    <!-- page content -->
    <div class="right_col" role="main" >
        @yield('content')
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
        <!-- <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div> -->
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="admin/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="admin/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="admin/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="admin/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="admin/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="admin/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="admin/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="admin/vendors/Flot/jquery.flot.js"></script>
<script src="admin/vendors/Flot/jquery.flot.pie.js"></script>
<script src="admin/vendors/Flot/jquery.flot.time.js"></script>
<script src="admin/vendors/Flot/jquery.flot.stack.js"></script>
<script src="admin/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="admin/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="admin/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="admin/vendors/moment/min/moment.min.js"></script>
<script src="admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="admin/build/js/custom.min.js"></script>
<!-- Datatables -->
<script src="admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="admin/vendors/jszip/dist/jszip.min.js"></script>
<script src="admin/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="admin/vendors/pdfmake/build/vfs_fonts.js"></script>
<!-- Switchery -->
<script src="admin/vendors/switchery/dist/switchery.min.js"></script>
<!-- Ckeditor -->
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<!--DropZone -->
<script src="admin/dropzone.js"></script>
<script type="text/javascript">

   CKEDITOR.replace( 'noidung', {
        language:'vi',
        filebrowserBrowseUrl: '../../../ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '../../../ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: '../../../ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    } );

    function showImages(){
            if(this.files && this.files[0]){
                var obj = new FileReader();
                obj.onload = function(data){
                    var image = document.getElementById("image");
                    image.src = data.target.result;
                    image.style.display = "block";
                }
                obj.readAsDataURL(this.files[0]);
            }
        }
</script>
<!--Color Picker-->
<script src="admin/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
@yield('script')
</body>
</html>
@yield('modal')
