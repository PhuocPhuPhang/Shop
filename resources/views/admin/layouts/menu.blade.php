<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Shop</span></a>
    </div>
    <div class="clearfix"></div>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
        <span>Welcome,</span>
        <h2>John Doe</h2>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{url('admin/nhacungcap/danhsach')}}"><i class="fa fa-home"></i> Nhà Cung Cấp</a></li>

            <li><a><i class="fa fa-home"></i>Bài Viết<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('admin/loaitintuc/danhsach')}}"> Loại Tin Tức</a></li>
                    <li><a href="{{url('admin/tintuc/danhsach')}}">Tin Tức</a></li>
                </ul>
            </li>

            <li><a><i class="fa fa-home"></i>Media<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('admin/slide/danhsach')}}">Slide</a></li>
                </ul>
            </li>

            <li><a><i class="fa fa-home"></i>Sản Phẩm<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('admin/sanpham/cauhinh/danhsach')}}">Danh sách cấu hình</a></li>
                    <li><a href="{{url('admin/sanpham/danhsach')}}">Danh sách sản phẩm</a></li>
                </ul>
            </li>
            <li><a href="{{url('admin/khuyenmai/danhsach')}}"><i class="fa fa-home"></i>Khuyến mãi</a></li>

        </ul>
        </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
    </div>
</div>
